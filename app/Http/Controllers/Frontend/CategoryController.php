<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Type;

class CategoryController extends FrontendController
{
    public function index(Request $request, $slug)
    {
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {

            $category = Category::find($id);

            $listCategoryId = [];
            if ($category->c_parent_id == 0) {
                $childrenCate = Category::where('c_parent_id', $category->id)->get();
                array_push($listCategoryId, $category->id);
                foreach ($childrenCate as $key => $cate) {
                    array_push($listCategoryId, $cate->id);
                }
            } else {
                $listCategoryId = [intval($id)];
            }

            $products = Product::where('pro_active', 1)->whereIn('pro_category_id', $listCategoryId);
            $paramAtbSearch =  $request->except('min_price', 'max_price', 'status', 'page', 'k', 'country', 'rv', 'sort');
            $paramAtbSearch =  array_values($paramAtbSearch);

            if (!empty($paramAtbSearch)) {
                $products->whereHas('attributes', function($query) use($paramAtbSearch){
                    $query->whereIn('pa_attribute_id', $paramAtbSearch);
                });
            }
            if ($request->min_price && $request->max_price) {
                $min = $request->min_price;
                $max = $request->max_price;
                if ($request->min_price > $request->max_price) {
                    $min = $request->max_price;
                    $max = $request->min_price;
                }
                $products->whereBetween('pro_price', [$min, $max]);
            } else {
                if ($request->min_price) {
                    $products->where('pro_price','>=', $request->min_price);
                }
                if ($request->max_price) {
                    $products->where('pro_price','<=', $request->max_price);
                }
            }
            if ($request->status) {
                $products->where('pro_number','>', 0);
            }
            if ($request->k) $products->where('pro_name','like','%'.$request->k.'%');
            if ($request->rv) $products->where(function ($query) use ($request) {
                $query->whereRaw('? <= pro_review_star / pro_review_total', [$request->rv]);
            });
            switch ($request->sort) {
                case 'asc':
                case 'desc':
                    $products->orderBy('created_at',$request->sort);
                case 'price_asc':
                    $products->orderBy('pro_price', 'asc');
                case 'price_desc':
                    $products->orderBy('pro_price', 'desc');
            }

            $products = $products->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star','pro_number')
                ->paginate(12);

            $producerId = Product::where('pro_active', 1)->whereIn('pro_category_id', $listCategoryId)->distinct()->pluck('pro_country');

            // Lấy thuộc tính
            $attributes =  Type::with('attributes:id,atb_name,atb_type_id')->get()->toArray();

            $viewData = [
                'attributes'    => $attributes,
                'products'      => $products,
                'title_page'    => $category->c_name,
                'query'         => $request->query(),
                'link_search'   => request()->fullUrlWithQuery(['k' => \Request::get('k')])
            ];

            return view('frontend.pages.product.index', $viewData);
        }
    }
}
