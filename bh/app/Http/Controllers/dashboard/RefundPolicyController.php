<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\RefundPolicy;

use Illuminate\Http\Request;

class RefundPolicyController extends Controller
{
    public function edit() {
        $refund_policy=  RefundPolicy :: find(1);
        return view('admins.refund_policy.edit', compact('refund_policy'));
    }
    public function update(Request $request) {
        $refund_policy=  RefundPolicy :: find($request -> id);
        $refund_policy->update($request->all());
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);

        return redirect(app()->getLocale().'/admins/refund-policy');
    }


}
