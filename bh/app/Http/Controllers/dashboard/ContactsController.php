<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function edit() {
        $contacts=  Contact :: find(1);
        return view('admins.contacts.edit', compact('contacts'));
    }
    public function update(Request $request) {
        $contacts=  Contact :: find("1");
        $contacts->update($request->all());
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/contacts');
    }
}
