<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\HowWeWork;
use Illuminate\Http\Request;
class HowWeWorkController extends Controller
{
    public function edit() {
        $how_we_work=  HowWeWork :: find(1);
        return view('admins.how_we_work.edit', compact('how_we_work'));
    }
    public function update(Request $request) {
        $whous=  HowWeWork :: find($request -> id);
        $whous->update($request->all());
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/how-we-work');
    }


}
