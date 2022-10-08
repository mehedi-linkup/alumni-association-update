<?php

namespace App\Http\Controllers;
use App\UpdateNew;
use App\Libraries\CommonFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class UpdateNewController extends Controller
{
   
    public function EditUpdateNews(Request $request)
    {
        $updatenews = UpdateNew::findOrFail($request->id);
        //return response()->json($updatenews);
        return view('admin.updatenews.view-update-news',compact('updatenews'));
    }

    public function SaveUpdateNews(Request $request){

        
        try {
         
            DB::beginTransaction();
           
            $data = UpdateNew::findOrFail($request->updatenews_id);
            $data->description = $request->description;
            $data->save();
            // User photo
    
    
            DB::commit();
    
            Session::flash('success', 'The Update  News has been updated successfully!');
           
            return redirect()->back();
    
           } catch (\Exception $e) {
               DB::rollback();
               Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
               return Redirect::back()->withInput();
           }
    }

}
