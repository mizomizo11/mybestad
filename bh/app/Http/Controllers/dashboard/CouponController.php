<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Coupon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CouponController extends Controller
{



    public function test(Request $request)
    {

        $coupon = Coupon::where('number',$request->number)->first();
       // var_dump($request->number);
        if($coupon)
        {
            if($coupon->used=="yes"){
                return response()->json([
                    'status' => 'used' ,
                    'message' =>  __('site.coupon_was_used_before')  ,
                ]);
            }else{
                return response()->json([
                    'status' => 'true' ,
                    'value' => $coupon->value ,
                    'number' => $coupon->number ,
                    'message' => __('site.coupon_number_is_valid') ,
//                    'coupon ' => $coupon ,


                ]);
            }

        }else{
            return response()->json([
                'status' => 'false' ,
                'message' => __('site.coupon_number_is_not_valid')  ,
            ]);

        }




       // $coupons = Coupon::orderby('id','desc')->get();
       // return view("admins.coupons.index", compact('coupons'));
    }


    public function index()
    {
        $coupons = Coupon::orderby('id','desc')->get();
        return view("admins.coupons.index", compact('coupons'));
    }

    public function create()
    {


        do {
            $random_number = mt_rand(1000000, 9999999);
        } while (Coupon::where("number", "=", $random_number)->first());


        return view("admins.coupons.create",compact('random_number'));
    }

    public function store(Request $request)
    {

        Coupon:: create([
            'number' => $request->number,
            'value' => $request->value,
            'used' => "no",


        ]);
        return redirect(app()->getLocale() . '/admins/coupons/');
    }



    public function edit(Request $request)
    {
        $coupon = Coupon:: find($request->id);
        return view('admins.coupons.edit', compact('coupon'));
    }

    public function update(Request $request)
    {
        $coupon = Coupon:: find($request->id);
        $coupon->update([
            'number' => $request->number,
            'value' => $request->value,
            'used' => $request->used,
        ]);

        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale() . '/admins/coupons/');
    }

    public function destroy(Request $request)
    {
        $coupon = Coupon::find($request->id);

        $deleted= $coupon->delete();
        if($deleted){
            return response()->json([
                'status' => 'true' ,
                'msg' => 'store success' ,
            ]);
        }else{
            return response()->json([
                'status' => 'false' ,
            ]);
        }

    }


}
