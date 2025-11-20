<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function saveImage($req, $f_name)
    {
        $file_extension = $req->getClientOriginalExtension();
        //$file_extension =  $req -> MimeType;


        $random = "$f_name" . "_" . rand(1, 99999) . "_" . time();
        $newFileName = $random . '.' . $file_extension;
        $path = Config::get('app.upload');
        $req->move("$path", $newFileName);
        return $newFileName;



//        $file_extension = $req->getClientOriginalExtension();
//        $random = $prefix . "_" . rand(1, 99999) . "_" . time();
//        $newFileName = $random . '.' . $file_extension;
//        $path = Config::get('app.themes')."";
//        $req->move("$path", $newFileName);
//        return $newFileName;
    }
//    public static function saveImage( $req,$f_name){
//        $file_extension =  $req -> getClientOriginalExtension();
//        $random="$f_name"."_".rand(1,99999)."_".time();
//        $newFileName = $random . '.' .$file_extension;
//        $path = Config::get('app.upload');
//        $req->move("$path", $newFileName);
//        return   $newFileName;
//    }

//    public static function saveImagesloader($filess, $f_name)
//    {
//        $i = 0;
//        foreach ($filess as $key => $val) {
//            $file_extension = pathinfo("$val->FileName", PATHINFO_EXTENSION);
//            $random = "$f_name" . "_" . rand(1, 99999) . "_" . time();
//            $newFileName = $random . '.' . $file_extension;
//            $path = Config::get('app.upload');
//            file_put_contents("$path/" . $newFileName, base64_decode($filess[$i]->Base64));
//            // Insert image name to DB
//            $arraydata["imagename"][$i] = $newFileName;
//            $i++;
//        }
//        return $arraydata;
//    }


//
//    public static function get_total_for_one_driver($driver_id)
//    {
//        $totall=0;
//        $shipments = DB::table('shipments')
//            ->leftJoin('shipments_state', 'shipments.barcode', '=', 'shipments_state.shipment_barcode')
//            ->where('shipments_state.state', '=', 'delivered')
//            ->where('shipments_state.user_id', '=',$driver_id)
//            ->where('shipments.bill_to', 'postpaid_sender')
//             ->where('shipments_state.current_state', '=', "yes")
//            ->select('shipments.*')
//            ->get();
//        foreach ($shipments as $shipment) {
////            $total = $total + $shipment->cod_final + $shipment->insurance + $shipment->customs_charges + $shipment->other_fees;
//            $totall = $totall + $shipment->total;
//        }
//        return   $totall;
//    }

//    public static function get_all_notices_for_one_shipment($driver_id,$barcode)
//    {
//
//        $shipment_state = DB::table('shipments_state')
//            ->where('user_id', '=', $driver_id)
//            ->where('shipments_state.shipment_barcode', '=',$barcode)
//            ->orderby("created_at","desc")
//            ->get();
//
//        return   $shipment_state;
//    }


//    public static function get_total($account_number){
//
//
//        $shipments = DB::table('shipments')
//            ->where('sender_account_number', $account_number)
//            ->where('state','<>', 'draft')
//            ->where('bill_to', 'postpaid_sender')
//            ->get();
//
//
//        $total=0;
//
//
//        foreach ($shipments as $shipment)
//        {
//           // $tradebill_total = DB::table('shipments_tradebills')->where('shipment_id', '=', $shipment->id)->sum("row_price");
//         //   $final_cod = $shipment->cod + ( $shipment->cod * $shipment->cod_ratio);
//            $total=$total + $shipment-> $shipment->final_price ;
//
////            if( $shipment->collection == 'delivery_charges_only'){
////                $total =  $shipment->final_price + $final_cod ;
////            }elseif( $shipment->collection == 'goods_value_only'){
////                $total =  $tradebill_total + $final_cod ;
////            }elseif( $shipment->collection == 'delivery_charges_and_goods_value'){
////                $total = $shipment->final_price +  $tradebill_total + $final_cod ;
////            }elseif( $shipment->collection == 'customs_clearance_fees'){
////                $total = $shipment->customs_charges + $final_cod ;
////            }
////            else{
////                $total=0;
////            }
//
//
////               $total=floatval( $total ) +   floatval( $total );
////
//        }
//
//
//      return   $total;
//
//
//    }
//




    public static function shout(string $string)
    {
        return strtoupper($string);
    }



}
