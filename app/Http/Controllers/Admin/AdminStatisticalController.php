<?php

namespace App\Http\Controllers\Admin;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class AdminStatisticalController extends Controller
{
    public function index(Request $request)
    {   
        $startDate = $request->input('start_date') ? $request->input('start_date', date('Y-m-01')) : date('Y-m-01'); // Ngày đầu tiên của tháng hiện tại nếu không có startDate
        $endDate = $request->input('end_date') ? $request->input('end_date', date('Y-m-01')) : date('Y-m-d'); // Ngày hiện tại nếu không có endDate

        // Nếu có endDate mà không có startDate, thì startDate lấy ngày đầu tiên của tháng endDate
        if (!$request->input('start_date') && $request->input('end_date')) {
            $endDateObj = new \DateTime($endDate);
            $startDate = $endDateObj->format('Y-m-01');
        }
        // Đảm bảo endDate không nhỏ hơn startDate
        if ($endDate < $startDate) {
            // Đổi chỗ startDate và endDate
            $tempDate = $startDate;
            $startDate = $endDate;
            $endDate = $tempDate;
        }

        $endDateObj = new \DateTime($endDate);
        $endDateObj->modify('+1 day');
        $endDateFilter = $endDateObj->format('Y-m-d');

        //Tổng hđơn hàng
        $totalTransactions = \DB::table('transactions')->select('id')->count();

        //Tổng thành viên
        $totalUsers = \DB::table('users')->select('id')->count();

        // Tông sản phẩm
        $totalProducts = \DB::table('products')->select('id')->count();


        // Tông đánh giá
        $totalRatings = \DB::table('ratings')->select('id')->count();

        // Danh sách đơn hàng
        $transactions = Transaction::orderByDesc('id')
                        ->whereBetween('created_at', [$startDate, $endDateFilter])
                        ->get();
        // Top sản phẩm xem nhiều
        $topViewProducts = Product::orderByDesc('pro_view')
            ->limit(10)
            ->get();

        // Top sản phẩm mua nhiều
        $topPayProducts = Product::orderByDesc('pro_pay')
            ->whereBetween('created_at', [$startDate, $endDateFilter])
            ->limit(10)
            ->get();

        // Thống kê trạng thái đơn hàng
        // Tiep nhan
        $transactionDefault = Transaction::where('tst_status',1)->whereBetween('created_at', [$startDate, $endDateFilter])->select('id')->count();
        // dang van chuyen
        $transactionProcess = Transaction::where('tst_status',2)->whereBetween('created_at', [$startDate, $endDateFilter])->select('id')->count();
        // Thành công
        $transactionSuccess = Transaction::where('tst_status',3)->whereBetween('created_at', [$startDate, $endDateFilter])->select('id')->count();
        //Cancel
        $transactionCancel = Transaction::where('tst_status',-1)->whereBetween('created_at', [$startDate, $endDateFilter])->select('id')->count();

        $statusTransaction = [
            [
                'Hoàn tất' , $transactionSuccess, false
            ],
            [
                'Đang vận chuyển' , $transactionProcess, false
            ],
            [
                'Tiếp nhận' , $transactionDefault, false
            ],
            [
                'Huỷ bỏ' , $transactionCancel, false
            ]
        ];

        $listDay = [];
        $currentDate = $startDate;

        // Tính toán số ngày trong khoảng thời gian
        $dateInterval = date_diff(new \DateTime($startDate), new \DateTime($endDate));
        $numDays = $dateInterval->days + 1; // Cộng thêm 1 để bao gồm cả ngày cuối cùng

        // Tính toán số mốc ngày cần tạo
        $numIntervals = min(15, $numDays); // Số mốc ngày không vượt quá 15 hoặc bằng số ngày

        // Tính toán khoảng thời gian giữa các mốc ngày
        $intervalDays = floor($numDays / $numIntervals);

        // Tạo danh sách các mốc ngày
        while ($currentDate <= $endDate) {
            $listDay[] = $currentDate;
            $currentDate = (new \DateTime($currentDate))->modify('+' . $intervalDays . ' days')->format('Y-m-d');
        }

        //Doanh thu theo tháng ứng với trạng thái đã xử lý
        $revenueTransactionMonth = Transaction::where('tst_status',3)
            ->whereBetween('created_at', [$startDate, $endDateFilter])
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        //Doanh thu theo tháng ứng với trạng thái tiếp nhận
        $revenueTransactionMonthDefault = Transaction::where('tst_status',1)
            ->whereBetween('created_at', [$startDate, $endDateFilter])
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        $arrRevenueTransactionMonth = [];
        $arrRevenueTransactionMonthDefault = [];
        foreach($listDay as $index => $day) {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
                if ($revenue['day'] <=  $day && (!isset($listDay[$index-1]) || $revenue['day'] > $listDay[$index-1])) {
                    $total += $revenue['totalMoney'];
                }
                if ($revenue['day'] > $day) {
                    break;
                }
            }

            $arrRevenueTransactionMonth[] = (int)$total;

            $total = 0;
            foreach ($revenueTransactionMonthDefault as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonthDefault[] = (int)$total;
        }



        $viewData = [
            'totalTransactions'          => $totalTransactions,
            'totalUsers'                 => $totalUsers,
            'totalProducts'              => $totalProducts,
            'totalRatings'               => $totalRatings,
            'transactions'               => $transactions,
            'topViewProducts'            => $topViewProducts,
            'topPayProducts'             => $topPayProducts,
            'statusTransaction'          => json_encode($statusTransaction),
            'listDay'                    => json_encode($listDay),
            'arrRevenueTransactionMonth' => json_encode($arrRevenueTransactionMonth),
            'arrRevenueTransactionMonthDefault' => json_encode($arrRevenueTransactionMonthDefault)
        ];

        return view('admin.statistical.index', $viewData);
    }
}
