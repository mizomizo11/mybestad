<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ContactsModel;

use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\StoreModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{


    private $categories;
    private $contacts;
    private $products;

    function __construct(){


        $this->products = DB::table('products')
            ->orderBy('id', 'desc')
            ->get();
        $this->categories = CategoryModel::orderBy('record_order', 'asc')->get();
        $this->contacts = ContactsModel::first();

    }

    public function show_my_orders()
    {
        $contacts = ContactsModel::first();
        $last_books = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();
        $categories=  $this->categories ;
        $orders = DB::table('orders')
            ->leftJoin("customers","orders.customer_id",'customers.id')
            ->where('orders.customer_id', session("customer_id"))
            ->select("orders.*","customers.name AS customer_name" )
            ->get();

        return view("site.orders.show_my_orders",compact('contacts','last_books','orders','categories'));
    }
    public function show_order_details(Request $request)
    {
        $categories=  $this->categories ;
        $contacts = ContactsModel::first();
        $last_books = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();

        $orders = DB::table('orders')
            ->leftJoin("customers","orders.customer_id",'customers.id')
            ->where('orders.customer_id', session("customer_id"))
            ->where('orders.id', $request->id)
            ->select("orders.*","customers.name AS customer_name" )
            ->get();


        $cart = DB::table('cart')
            ->leftJoin("products","cart.product_id",'products.id')
            ->where('cart.order_id', $request->id)
            ->select("cart.*","products.name AS product_name" )
            ->get();

        return view("site.orders.show_order_details",compact('contacts','last_books','orders','cart','categories'));
    }
    public function index()
    {
        return view("dashboard.orders.index");
    }
    public function orders_in_json()
    {
       // $orders = OrderModel::orderBy('id', 'DESC')->get();

        $orders = DB::table('orders')
            ->leftJoin("customers","orders.customer_id",'customers.id')
            ->select("orders.*","customers.name AS customer_name" )
            ->get();


        $response = array(
            "data" => $orders
        );
        return response()->json($response);
    }
    public function create()
    {
        $categories=  $this->categories ;

        $contacts = ContactsModel::first();
        $last_books = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();
        return view("site.orders.create",compact('contacts','last_books','categories'));
    }

    public function store(Request $request) {
        $ts =  time();
        if(!empty(session("shopping_cart")))
        {
            $total_price="0";
            foreach(session("shopping_cart") as $keys => $values)
            {

                $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                $values["store_name"];
            }


          //  dd($request->address);

            //addd to orders table
            $inserted_in_orders= OrderModel :: create([
                'customer_id'=> session("customer_id") ,
                'delivery_address'=> $request->address ,
                'state'=> "pending" ,
                'total_price'=> $total_price ,
                'details'=> "details",
                'payment_method'=>  $request->payment_method ,



            ]);
            $lastInsertId= DB::getPdo()->lastInsertId();
            if($inserted_in_orders)
            {
                foreach(session("shopping_cart") as $keys => $values)
                {
                    $product_id=$values["product_id"];
                    $product_name=$values["product_name"];
                    $product_quantity=$values["product_quantity"];
                    $product_price=$values["product_price"];

                     $insertd_in_cart = DB::table('cart')->insert([
                        'order_id' => $lastInsertId,
                        'product_id' => $product_id,
                      'product_name' => $product_name,
                      'quantity' => $product_quantity,
                         'price' => $product_price,
                               //quantity' => "11",
                    ]);
                }
                if($insertd_in_cart){
                    session()->forget('shopping_cart');
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

    }



    public function destroy(Request $request) {
        $order= OrderModel::find($request -> id);


        $deleted= $order->delete();
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
