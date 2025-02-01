<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view("dashboard.contact.show", compact("contact"));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect('/dashboard')->with('success', 'تم حذف الرسالة بنجاح');
    }

    public function destroyAll(){
        Contact::truncate();
        return redirect('/dashboard')->with('success','تم حذف جميع الرسائل بنجاح');
    }
}
