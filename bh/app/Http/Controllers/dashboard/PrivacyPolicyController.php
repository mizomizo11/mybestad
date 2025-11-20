<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;


class PrivacyPolicyController extends Controller
{
    public function edit() {
        $privacy_policy=  PrivacyPolicy :: find(1);
        return view('admins.privacy_policy.edit', compact('privacy_policy'));

    }
    public function update(Request $request) {



        $privacy_policy=  PrivacyPolicy :: find($request -> id);
        $privacy_policy->update($request->all());
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);

        return redirect(app()->getLocale().'/admins/privacy-policy');
    }


}
