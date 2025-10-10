<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{
    public function fetch()
    {
        $total_price = 0;
        $total_item = 0;
        if (App::getLocale() == 'ar') {
            $direction = "rtl";
            $text_align = "right";
            $opp = "left";
        } else {
            $direction = "ltr";
            $text_align = "left";
            $opp = "right";
        }


        $output = "
                    <div class='table-responsive' id='order_table' style=\"direction:$direction ;text-align:$text_align\" >
                        <table class='table table-bordered table-striped'>
                            <tr>
                                <th >".__('site.product_name')."</th>
                                <th >".__('site.price')."</th>
                                <th >".__('site.quantity')." </th>
                                <th >".__('site.price')." </th>
                                <th >".__('site.delete')."</th>
                            </tr>
                    ";
                    if (!empty(session("shopping_cart")))
                    {
                        foreach (session("shopping_cart") as $keys => $values)
                        {
                            // <td>'.$values["store_name"].''.$values["store_id"].'</td>
                            $output .= "
                                            <tr>
                                                <td>$values[product_name]</td>
                                                <td style='text-align:right'>$values[product_price]<span style='flat:left'> ليرة سورية   </span> </td>
                                                <td>$values[product_quantity]</td>
                                                <td >" . number_format($values["product_quantity"] * $values["product_price"], 2) . "<span style='float:left'>ليرة سورية </span></td>
                                                <td><button name='delete' class='btn btn-danger btn-sm delete' id=" . $values["product_id"] . " style='font-family:font2;padding-top:0px;,padding:bottom:0px'>".__('site.delete')."</button></td>
                                            </tr>
                                        ";
                            $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                            $total_item = $total_item + 1;
                        }
                        $output .= "
                                        <tr>
                                            <td colspan='4' ><span style='float:left'>السعر الاجمالي </span> </td>
                                            <td > " . number_format($total_price, 2) . " <span style='float:left'>ليرة سورية </span></td>
                                            <td></td>
                                        </tr>
                                    ";
                    } else {
                        $output .= "
                                        <tr>
                                            <td colspan='5' align='center'>
                                                lang[cart_is_empty]
                                            </td>
                                        </tr>
                                    ";
                    }
                    $output .= '</table></div>';
                    $data = array(
                        'cart_details' => $output,
                        'total_price' => '$' . number_format($total_price, 2),
                        'total_item' => $total_item
                    );


        return $data;

//dd($data);
//echo json_encode($data);


        //$stores = StoreModel::all();
        // return view("site.cart.fetch");
    }
    public function add(Request $request)
    {

        $arr=session("shopping_cart");
        if(session("shopping_cart"))
        {
            $counter = 0;
            foreach($arr as $keys => $values)
            {

                if($arr[$keys]['product_id'] ==  $request -> product_id)
                {

                    $counter=$counter + 1;
                    $arr[$keys]['product_quantity'] = $arr[$keys]['product_quantity'] + $request -> product_quantity;

                }
            }
            session()->put('shopping_cart',$arr);
            if($counter == 0)
            {
                $item_array = array(
                    'product_id'               =>     $request -> product_id,
                    'product_name'             =>     $request -> product_name,
                    'product_price'            =>     $request -> product_price,
                    'product_quantity'         =>     $request -> product_quantity,
                    'store_id'                 =>     $request -> store_id,
                    'store_name'               =>     $request -> store_name
                );
                session("shopping_cart", []);
                session()->push('shopping_cart', $item_array );
               // session("shopping_cart")[] = $item_array;
            }
        }
        else
        {
            $item_array = array(
                'product_id'               =>     $request -> product_id,
                'product_name'             =>     $request -> product_name,
                'product_price'            =>     $request -> product_price,
                'product_quantity'         =>     $request -> product_quantity,
                'store_id'                 =>     $request -> store_id,
                'store_name'               =>     $request -> store_name
            );
            session("shopping_cart", []);
            session()->push('shopping_cart', $item_array );


        }
    }
    public function delete_item(Request $request){
       // if($_POST["action"] == 'remove')
       // {


        $arr=session("shopping_cart");

            foreach(session("shopping_cart") as $key => $value)
            {
                //dd($value["product_id"]."====".$request->product_id);

                if($value["product_id"] == $request->product_id)
                {

                    unset($arr[$key]) ;
                    session()->put('shopping_cart',$arr);
                    return response()->json([
                            'status' => 'true' ,
                            'msg' => 'store success' ,
                        ]);


//                    if($insertd_in_cart){
//                        session()->forget('shopping_cart');
//                        return response()->json([
//                            'status' => 'true' ,
//                            'msg' => 'store success' ,
//                        ]);
//                    }else{
//                        return response()->json([
//                            'status' => 'false' ,
//                        ]);
//
//                    }

                }
            }
       // }

    }

    public function empty_cart(Request $request){
        session()->forget('shopping_cart');

    }





}
