<?php

namespace App\Http\Controllers;

use App\Etc;
use Illuminate\Http\Request;

class EtcController extends Controller
{
    public function index() {
        $etc = Etc::first();       
        return view('admin.etc.view-etc', compact('etc'));
    }
    public function update(Request $request, $id) {
        try {
            $etc = Etc::find($id);
            $etc->terms_conditions = $request->terms_conditions;
            $etc->return_policy = $request->return_policy;
            $etc->privacy_policy = $request->privacy_policy;
            $etc->update();
            return redirect()->back()->with('success', 'update success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'update failed');
        }
    }
}
