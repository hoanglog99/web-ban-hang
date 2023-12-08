<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Producer;
use App\Models\Type;

class ProductController extends FrontendController
{
    public function index(Request $request)
    {
        $paramAtbSearch =  $request->except('min_price', 'max_price', 'status', 'page', 'k', 'country', 'rv', 'sort');

        $paramAtbSearch =  array_values($paramAtbSearch);

        $products       = Product::where('pro_active',1);

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

        $products =  $products->where('pro_active', 1);
        $producerId = $products->where('pro_active', 1)->distinct()->pluck('pro_country');
        $products = $products ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star', 'pro_number')->paginate(12);
        $attributes =  Type::with('attributes:id,atb_name,atb_type_id')->get()->toArray();

        $viewData = [
            'attributes'    => $attributes,
            'products'      => $products,
            'query'         => $request->query(),
            'country'       => Producer::whereIn('id', $producerId)->get()->toArray(),
            'link_search'   => request()->fullUrlWithQuery(['k' => \Request::get('k')])
        ];

        return view('frontend.pages.product.index', $viewData);
    }
}
