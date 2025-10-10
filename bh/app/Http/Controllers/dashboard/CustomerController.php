<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ContactsModel;
use App\Models\CustomerModel;
use App\Models\StoreModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{


    private $categories;
    private $contacts;
    private $products;


    function __construct(){



        $this->products = DB::table('products') ->orderBy('id', 'desc')  ->get();
        $this->categories = CategoryModel::orderBy('record_order', 'asc')->get();
        $this->contacts = ContactsModel::first();



    }
    public function index()
    {
        return view("dashboard.customers.index");
    }
    public function customers_in_json()
    {
        $customers = CustomerModel::orderBy('id', 'DESC')->get();

        $response = array(
            "data" => $customers
        );
        return response()->json($response);
    }

    public function create()
    {
        $last_books = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();

        $countries = DB::table('p_countries')->orderBy('id', 'desc')->get();
        $contacts = ContactsModel::first();
        $categories = CategoryModel::orderBy('record_order', 'asc')->get();
        return view("site.customers.create",compact('categories','contacts','last_books','countries'));
    }

    public function login(Request $request)
    {

        $customer = DB::table('customers')
            ->where('email', '=', $request->email)
            ->where('pass', '=', $request->password)
            ->first();


        if($customer){


            session()->put('customer', $customer );
            session()->put('customer_id', $customer->id );
            session()->put('customer_name', $customer->name );
            session()->put('customer_email', $customer->email );
            session()->put('customer_mobile', $customer->mobile );


            session()->put('customer', $customer );
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
    public function register(Request $request) {

        if($request -> imagefile) {
            $image =  Helper::saveImage($request -> imagefile,"profile_");
        }else
            $image ="";
       $customerIinserted= CustomerModel :: create([

           'name' => $request -> name ,
           'mobile' => $request -> mobile ,
          'phone' => $request -> phone ,
          'email'  => $request -> email ,
           'pass'=> $request -> password ,
           'countries_id' => $request -> countries_id ,
            'pic' => $image ,
           'block' => "no" ,





        ]);

        $lastInsertId= DB::getPdo()->lastInsertId();
       if($customerIinserted){

           $customer = DB::table('customers')
               ->where('id', '=', $lastInsertId)
               ->first();


           if($customer->pic)
           {
               $customer->pic= Config::get('app.upload_image_folder').$customer->pic ;
           }else{
               $customer->pic= Config::get('app.no_image');
           }




           session()->put('customer', $customer );
           session()->put('customer_id', $customer->id );
           session()->put('customer_name', $customer->name );
           session()->put('customer_email', $customer->email );
           session()->put('customer_mobile', $customer->mobile );

           session()->put('customer_pic', $customer->pic );

           session()->put('customer', $customer );
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

    public function edit() {
        $last_books = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();

        $countries = DB::table('p_countries')->orderBy('id', 'desc')->get();
        $contacts = ContactsModel::first();
        $categories = CategoryModel::orderBy('record_order', 'asc')->get();
        $customer= DB::table('customers')->where('id', session("customer_id"))->first();
        //dd($customer);
        return view("site.customers.edit",compact('categories','contacts','last_books','countries','customer'));


       // $user =  CustomerModel :: find($id);
      //  $customer= DB::table('customers')->where('id', session("customer_id"))->get();
      //  return view('site.customers.edit', compact('customer'));
    }

    public function update(Request $request) {

        $customer = CustomerModel:: find(session("customer_id"));
       // $customer= DB::table('customers')->where('id', session("customer_id"))->first();

        if ($request->image_file) {
            $user_image_old = Config::get('app.upload_image_folder') . $customer->image;
            if (File::exists($user_image_old)) {
                File::delete($user_image_old);
            }

            $image_file = Helper::saveImage($request->image_file, "user_image");
            $customer->update([
                'image' => $image_file,
            ]);

        }


       $updated= $customer->update([
           'name' => $request -> name ,
           'mobile' => $request -> mobile ,
           'phone' => $request -> phone ,
           'email'  => $request -> email ,
           'pass'=> $request -> password ,
           'countries_id' => $request -> countries_id ,

           'block' => "no" ,


        ]);

if($updated)
{
    session()->put('customer_name', $request->name );
    return response()->json([
        'status' => 'true' ,
        'msg' => 'store success' ,

    ]);

}else{
    return response()->json([
        'status' => 'false' ,
        'msg' => 'store faild' ,

    ]);

}








    }

    public function destroy(Request $request) {
        $customer= CustomerModel::find($request -> id);

        $user_img = Config::get('app.upload_image_folder').$customer ->	pic;
        if(File::exists($user_img)) {
            File::delete($user_img);
        }


       $deleted= $customer->delete();
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

    function logout(Request $request)
    {

        session()->forget('customer');
        session()->forget('customer_id');

        return redirect("/".app()->getLocale())->with('success', 'Logout successfully');
    }



}
