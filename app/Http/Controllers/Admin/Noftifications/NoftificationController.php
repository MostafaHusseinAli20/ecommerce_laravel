<?php

namespace App\Http\Controllers\Admin\Noftifications;

use App\Http\Controllers\Controller;
use App\Models\Noftification;

class NoftificationController extends Controller
{
    public function destroy($id){
        $notification = Noftification::withTrashed()->find($id);

    if ($notification) {
        $notification->forceDelete();
    }

    return redirect('/dashboard')->with('success', 'تم حذف الإشعار نهائيًا');;
    }

    public function softDeleteAll(){
        Noftification::query()->delete();
        return redirect('/dashboard')->with('success', 'تم نقل جميع الإشعارات إلى المهملات');
    }
}
