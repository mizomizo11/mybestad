<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;


class ConsultationFileController extends Controller
{
    public function save_files(Request $request) {
        //dd($request);
        $consultation= Consultation::
              where('patient_id',Auth::guard("patient")->user()->id )
            ->where('doctor_id',session("the_doctor_id"))
            ->where('status',"open")
            ->first();
        $i=0;
        $image=[];
        if($request->images_files){
            foreach($request->images_files as $key=>$value) {
                if($value) {
                    $image[$i] = Helper::saveImage($value, "animal_images_");
                    $inserted= ConsultationFile :: create([
                        'consultation_id' => $consultation->id ,
                        'file' => "$image[$i]" ,
                    ]);
                }
                $i++;
            }
        }

        return redirect(app()->getLocale().'/patients/consultations/open')->with('success', 'Logout successfully');

//        $lastInsertId= DB::getPdo()->lastInsertId();
//       if($inserted){
//          // return redirect("/".app()->getLocale())->with('success', 'Logout successfully');
//         //  return redirect(app()->getLocale().'/appointments/');
//           return response()->json([
//               'status' => 'true' ,
//               'msg' => 'store success' ,
//           ]);
//       }else{
//           return response()->json([
//               'status' => 'false' ,
//           ]);
//       }


    }
    public function save_files_from_modal(Request $request) {

        $i=0;
        $image=[];

       // var_dump($request->images_files);

        if($request->images_files){
            foreach($request->images_files as $key=>$value) {

                if($value) {
                    $image[$i] = Helper::saveImage($value, "patient_images_");
                    $inserted = ConsultationFile :: create([
                        'consultation_id' => $request->id ,
                        'file' => "$image[$i]" ,
                    ]);
                    //echo "$inserted";
                }
                $i++;
            }
        }
        return response()->json([
            'status' => 'true' ,
            'msg' => 'store success' ,
        ]);
        //return redirect(app()->getLocale().'/patients/consultations/open')->with('success', 'Logout successfully');

//        $lastInsertId= DB::getPdo()->lastInsertId();
//        if($inserted){
//            return response()->json([
//                'status' => 'true' ,
//                'msg' => 'store success' ,
//            ]);
//        }else{
//            return response()->json([
//                'status' => 'false' ,
//            ]);
//        }


    }




    public function destroy(Request $request)
    {
       // dd("111");
        $consultationfile = ConsultationFile::find($request->id);

        $old_file = Config::get('app.upload') . $consultationfile->file;
        if (File::exists($old_file)) {
            File::delete($old_file);
        }
        $deleted = $consultationfile->delete();
      //  return redirect(app()->getLocale().'/consultations/')->with('success', 'delete successfully');
        if ($deleted) {
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',

            ]);

        } else {
            return response()->json([
                'status' => 'false',
            ]);

        }

    }




}
