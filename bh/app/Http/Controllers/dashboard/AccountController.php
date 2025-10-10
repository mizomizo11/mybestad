<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AccountModel;
use App\Models\AreaModel;
use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\PricesPackageModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class AccountController extends Controller
{


//    public function choose_user_for_account(Request $request) {
//
//
//
//        $updated = DB::table('accounts')
//            ->where('id', $request->account_id)
//            ->update([
//                'user_id' => $request->user_id,
//            ]);
//
//
//        if ($updated) {
//            return response()->json([
//                'status' => "true",
//            ]);
//
//        } else {
//            return response()->json([
//                'status' => "false",
//            ]);
//
//        }
//
//    }
    public function index()
    {


        $accounts = DB::table('accounts')
            ->orderBy('id', 'desc')
            ->get();


        $accounts->map(function ($accounts) {


            $country_name= DB::table('countries')->where('id', $accounts -> country_id)->first();
            $accounts -> country_name = @$country_name -> name ;


            $city_name =  CityModel::where('id', $accounts -> city_id)->first();
            $accounts -> city_name = @$city_name -> name ;


            $prices_package_name= DB::table('prices_packages')->where('id', $accounts -> prices_package_id)->first();
            $accounts -> prices_package_name = @$prices_package_name -> name ;

            $user_name= DB::table('users')->where('id', $accounts -> user_id)->first();
            $accounts -> user_name = @$user_name -> name ;



            return $accounts;
        });

        $users = UserModel::all();

        return view("dashboard.accounts.index", compact('accounts','users'));
    }

    public function create()
    {
        // $countries= DB::select("select * from countries");
        $countries = CountryModel::all();
        $prices_packages = PricesPackageModel::all();

        return view("dashboard.accounts.create",compact('countries','prices_packages'));
    }

    public function store(Request $request) {

        if($request -> owner_image) {
           $account_owner_image =  Helper::saveImage($request -> owner_image,"account_owner_image");
        }else
            $account_owner_image ="";

        if($request -> passport_image) {
            $account_passport_image =  Helper::saveImage($request -> passport_image,"account_passport_image");
        }else
            $account_passport_image ="";

        if($request -> id1_image) {
            $account_id1_image=  Helper::saveImage($request -> id1_image,"account_id1_image");
        }else
            $account_id1_image ="";

        if($request -> id2_image) {
            $account_id2_image =  Helper::saveImage($request -> id2_image,"account_id2_image");
        }else
            $account_id2_image ="";

        if($request -> commercial_license_image) {
            $commercial_license_image =  Helper::saveImage($request -> commercial_license_image,"commercial_license_image");
        }else
            $commercial_license_image ="";

        if($request -> commercial_register_image) {
            $commercial_register_image=  Helper::saveImage($request -> commercial_register_image,"commercial_register_image");
        }else
            $commercial_register_image ="";

        if($request -> establishment_contract_image) {
            $establishment_contract_image =  Helper::saveImage($request -> establishment_contract_image,"establishment_contract_image");
        }else
            $establishment_contract_image ="";

        if($request -> commercial_extractor_image) {
            $commercial_extractor_image =  Helper::saveImage($request -> commercial_extractor_image,"commercial_extractor_image");
        }else
            $commercial_extractor_image ="";

        if($request -> signature_authorization_image) {
            $signature_authorization_image =  Helper::saveImage($request -> signature_authorization_image,"signature_authorization_image");
        }else
            $signature_authorization_image ="";

        if($request ->other_image) {
            $other_image =  Helper::saveImage($request -> other_image,"other_image");
        }else
            $other_image ="";

        $account=  AccountModel :: create([
            'user_id' => session("user_id"),
            'account_number'     => $request -> account_number ,
            'prices_package_id'     => $request -> prices_package_id ,


            'country_id'     => $request -> country_id ,
            'city_id'     => $request -> city_id ,
            'type'     => $request -> type ,
            'owner_name'     => $request -> owner_name ,
            'company_name'     => $request -> company_name ,
            'address'     => $request -> address ,
            'mobile'     => $request -> mobile ,
            'phone'     => $request -> phone ,
            'email'     => $request -> email ,
            'url'     => $request -> url ,
            'owner_image'     => $account_owner_image,
            'passport_image'     => $account_passport_image,
            'id1_image'     => $account_id1_image,
            'id2_image'     => $account_id2_image,
            'commercial_license_image'     => $commercial_license_image,
            'commercial_register_image'     => $commercial_register_image,
            'establishment_contract_image'     => $establishment_contract_image,
            'commercial_extractor_image'     => $commercial_extractor_image,
            'signature_authorization_image'     => $signature_authorization_image,
            'other_image'     => $other_image,

            'financial_manager_name'     => $request -> financial_manager_name ? : "" ,
            'financial_manager_mobile'     => $request -> financial_manager_mobile  ? : "",
            'financial_manager_phone'     => $request -> financial_manager_phone  ? : "",
            'financial_manager_email'     => $request -> financial_manager_email ? : "" ,
            'financial_manager_address'     => $request -> financial_manager_address  ? : "",
            'payment_officer_name'     => $request -> payment_officer_name  ? : "",
            'payment_officer_mobile'     => $request -> payment_officer_mobile  ? : "",
            'payment_officer_phone'     => $request -> payment_officer_phone  ? : "",
            'payment_officer_email'     => $request -> payment_officer_email  ? : "",
            'sales_officer_name'     => $request -> sales_officer_name ? : "" ,
            'sales_officer_mobile'     => $request -> sales_officer_mobile  ? : "",
            'sales_officer_email'     => $request -> sales_officer_email ? : "" ,
            'sales_officer_phone'     => $request -> sales_officer_phone ? : "" ,




        ]);


        return redirect('/dashboard/accounts/');



    }
    public function edit($id) {
        $account =  AccountModel :: find($id);
        $countries = CountryModel::all();
        $prices_packages = PricesPackageModel::all();

        $cities= DB::table('cities')->where('country_id', $account -> country_id)->get();
        $areas = DB::table('areas')->where('city_id', $account->city_id)->get();


        return view('dashboard.accounts.edit', compact('account','countries','cities','areas','prices_packages'));

    }
    public function update(Request $request) {
        $account =  AccountModel :: find($request -> id);


        if($request -> owner_image) {
            $account_owner_image_old = Config::get('app.upload_image_folder').$account ->	owner_image;
            if(File::exists($account_owner_image_old)) {
                File::delete($account_owner_image_old);
            }


            $account_owner_image =  Helper::saveImage($request -> owner_image,"account_owner_image");
            $account -> update([
                'owner_image'     => $account_owner_image,
            ]);

        }

        if($request -> passport_image) {

            $account_passport_image_old = Config::get('app.upload_image_folder').$account ->	passport_image;
            if(File::exists($account_passport_image_old)) {
                File::delete($account_passport_image_old);
            }

            $account_passport_image =  Helper::saveImage($request -> passport_image,"account_passport_image");
            $account -> update([
                'passport_image'     => $account_passport_image,
            ]);
        }

        if($request -> id1_image) {

            $account_id1_image_old = Config::get('app.upload_image_folder').$account ->	id1_image;
            if(File::exists($account_id1_image_old)) {
                File::delete($account_id1_image_old);
            }

            $account_id1_image=  Helper::saveImage($request -> id1_image,"account_id1_image");
            $account -> update([
                'id1_image'     => $account_id1_image,
            ]);
        }

        if($request -> id2_image) {

            $id2_image_old = Config::get('app.upload_image_folder').$account ->	id2_image;
            if(File::exists($id2_image_old)) {
                File::delete($id2_image_old);
            }
            $id2_image =  Helper::saveImage($request -> id2_image,"id2_image");
            $account -> update([
                'id2_image'     => $id2_image,
            ]);
        }

        if($request -> commercial_license_image) {

            $commercial_license_image_old = Config::get('app.upload_image_folder').$account ->	commercial_license_image;
            if(File::exists($commercial_license_image_old)) {
                File::delete($commercial_license_image_old);
            }

            $commercial_license_image =  Helper::saveImage($request -> commercial_license_image,"commercial_license_image");
            $account -> update([
                'commercial_license_image'     => $commercial_license_image,
            ]);
        }

        if($request -> commercial_register_image) {

            $commercial_register_image_old = Config::get('app.upload_image_folder').$account ->	commercial_register_image;
            if(File::exists($commercial_register_image_old)) {
                File::delete($commercial_register_image_old);
            }

            $commercial_register_image=  Helper::saveImage($request -> commercial_register_image,"commercial_register_image");
            $account -> update([
                'commercial_register_image'     => $commercial_register_image,
            ]);
        }

        if($request -> establishment_contract_image) {

            $establishment_contract_image_old = Config::get('app.upload_image_folder').$account ->	establishment_contract_image;
            if(File::exists($establishment_contract_image_old)) {
                File::delete($establishment_contract_image_old);
            }

            $establishment_contract_image =  Helper::saveImage($request -> establishment_contract_image,"establishment_contract_image");
            $account -> update([
                'establishment_contract_image'     => $establishment_contract_image,
            ]);
        }

        if($request -> commercial_extractor_image) {

            $commercial_extractor_image_old = Config::get('app.upload_image_folder').$account ->	commercial_extractor_image;
            if(File::exists($commercial_extractor_image_old)) {
                File::delete($commercial_extractor_image_old);
            }


            $commercial_extractor_image =  Helper::saveImage($request -> commercial_extractor_image,"commercial_extractor_image");
            $account -> update([
                'commercial_extractor_image'     => $commercial_extractor_image,
            ]);
        }

        if($request -> signature_authorization_image) {

            $signature_authorization_image_old = Config::get('app.upload_image_folder').$account ->	signature_authorization_image;
            if(File::exists($signature_authorization_image_old)) {
                File::delete($signature_authorization_image_old);
            }
            $signature_authorization_image =  Helper::saveImage($request -> signature_authorization_image,"signature_authorization_image");
            $account -> update([
                'signature_authorization_image'     => $signature_authorization_image,
            ]);
        }

        if($request ->other_image) {

            $other_image_old = Config::get('app.upload_image_folder').$account ->	other_image;
            if(File::exists($other_image_old)) {
                File::delete($other_image_old);
            }

            $other_image =  Helper::saveImage($request -> other_image,"other_image");
            $account -> update([
                'other_image'     => $other_image,
            ]);
        }


        $account -> update([
            'user_id' => session("user_id"),
            'account_number'     => $request -> account_number ,
            'prices_package_id'     => $request -> prices_package_id ,
            'country_id'     => $request -> country_id ,
            'city_id'     => $request -> city_id ,
            'area_id'     => $request -> area_id ,
            'type'     => $request -> type ,
            'owner_name'     => $request -> owner_name ,
            'company_name'     => $request -> company_name ,
            'address'     => $request -> address ,
            'mobile'     => $request -> mobile ,
            'phone'     => $request -> phone ,
            'email'     => $request -> email ,
            'url'     => $request -> url ,



            'financial_manager_name'     => $request -> financial_manager_name ? : "" ,
            'financial_manager_mobile'     => $request -> financial_manager_mobile  ? : "",
            'financial_manager_phone'     => $request -> financial_manager_phone  ? : "",
            'financial_manager_email'     => $request -> financial_manager_email ? : "" ,
            'financial_manager_address'     => $request -> financial_manager_address  ? : "",
            'payment_officer_name'     => $request -> payment_officer_name  ? : "",
            'payment_officer_mobile'     => $request -> payment_officer_mobile  ? : "",
            'payment_officer_phone'     => $request -> payment_officer_phone  ? : "",
            'payment_officer_email'     => $request -> payment_officer_email  ? : "",
            'sales_officer_name'     => $request -> sales_officer_name ? : "" ,
            'sales_officer_mobile'     => $request -> sales_officer_mobile  ? : "",
            'sales_officer_email'     => $request -> sales_officer_email ? : "" ,
            'sales_officer_phone'     => $request -> sales_officer_phone ? : "" ,




        ]);

        return redirect('/dashboard/accounts/');
//        return response()->json([
//            'status' => true ,
//
//        ]);


    }

    public function destroy(Request $request) {
        $account= AccountModel::find($request -> id);

        $owner_image = Config::get('app.upload_image_folder').$account ->	owner_image;
        if(File::exists($owner_image)) {
            File::delete($owner_image);
        }
        $passport_image = Config::get('app.upload_image_folder').$account ->	passport_image;
        if(File::exists($passport_image)) {
            File::delete($passport_image);
        }
        $id1_image = Config::get('app.upload_image_folder').$account ->	id1_image;
        if(File::exists($id1_image)) {
            File::delete($id1_image);
        }
        $id2_image = Config::get('app.upload_image_folder').$account ->	id2_image;
        if(File::exists($id2_image)) {
            File::delete($id2_image);
        }
        $commercial_license_image = Config::get('app.upload_image_folder').$account ->	commercial_license_image;
        if(File::exists($commercial_license_image)) {
            File::delete($commercial_license_image);
        }
        $commercial_register_image = Config::get('app.upload_image_folder').$account ->	commercial_register_image;
        if(File::exists($commercial_register_image)) {
            File::delete($commercial_register_image);
        }
        $establishment_contract_image = Config::get('app.upload_image_folder').$account ->	establishment_contract_image;
        if(File::exists($establishment_contract_image)) {
            File::delete($establishment_contract_image);
        }
        $commercial_extractor_image = Config::get('app.upload_image_folder').$account ->	commercial_extractor_image;
        if(File::exists($commercial_extractor_image)) {
            File::delete($commercial_extractor_image);
        }
        $signature_authorization_image= Config::get('app.upload_image_folder').$account ->	signature_authorization_image;
        if(File::exists($signature_authorization_image)) {
            File::delete($signature_authorization_image);
        }
        $other_image= Config::get('app.upload_image_folder').$account ->	other_image;
        if(File::exists($other_image)) {
            File::delete($other_image);
        }

       $account->delete();
        $account->delete();
        return redirect('/dashboard/accounts/');
//        return response()->json([
//            'status' => true ,
//            'msg' => 'delete success' ,
//            'id' => $request -> id ,
//        ]);

    }







    public function show_all()
    {
       $accounts = AccountModel::all();




        return view("dashboard.accounts.show_all", compact('accounts'));
    }


    public function get_all_in_json()
    {



        $accounts = DB::table('accounts')

            ->orderBy('id', 'desc')
            ->get();


        $accounts->map(function ($accounts) {


            $country_name= DB::table('countries')->where('id', $accounts -> country_id)->first();
            $accounts -> country_name = @$country_name -> name ;


            $city_name =  CityModel::where('id', $accounts -> city_id)->first();
            $accounts -> city_name = @$city_name -> name ;

            $user_name =  UserModel::where('id', $accounts -> user_id)->first();
            $accounts -> user_name = @$user_name -> name ;



            $prices_package_name= DB::table('prices_packages')->where('id', $accounts -> prices_package_id)->first();
            $accounts -> prices_package_name = @$prices_package_name -> name ;



            return $accounts;
        });


        $permissions_array=explode(",", session('user')->permissions);
        if(in_array("accounts_when_add_shipment_show", $permissions_array))
        {
            $response = array(
                "data" => $accounts
            );
        }else{
            $response = array(
                "data" => ""
            );
        }
         return response()->json($response);


    }



    public function get_one_in_json($id)
    {
        $account = DB::table('accounts')
            ->where('account_number', $id)
            ->first();
        if($account){
            $country_name= DB::table('countries')->where('id', $account -> country_id)->first();
            $account -> country_name = @$country_name -> name ;

            $city_name= DB::table('cities')->where('id', $account -> city_id)->first();
            $account -> city_name = @$city_name -> name ;

            $area_name= DB::table('areas')->where('id', $account -> area_id)->first();
            $account -> area_name = @$area_name -> name ;



            $prices_package_name= DB::table('prices_packages')->where('id', $account -> prices_package_id)->first();
            $account -> prices_package_name = @$prices_package_name -> name ;


            $arr = array("status" => "true","message" => "success","arr" => $account);
            return response()->json($arr);

        } else
        {
            $arr = array("status" => "false","message" => "ff",);
            return response()->json($arr);
        }

    }


}
