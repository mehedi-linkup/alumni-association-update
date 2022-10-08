<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SponsorController extends Controller
{
    public function ViewSponsor()
    {
        $sponsors = null;
        return view('admin.sponsor.view-sponsor',compact('sponsors'));
    }

    public function getSponsorList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = Sponsor::sponsorList();
            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="'.asset('/').($list->image).'" height="60" width="110"></a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" onclick="editsponsor(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deletesponsor(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','image'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveSponsor(Request $request)
    {

       try {
            DB::beginTransaction();
            if($request->sponsor_id!=null){
                $data = Sponsor::findOrFail($request->sponsor_id);
                $old = $data->image;
            }
            else{
                $data = new Sponsor();
            }
            $data->title = $request->title;

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                if(isset($old)){
                    if(File::exists($old)){
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, "image", "uploads/sponsor");
            }

            $data->save();

            // User photo


            DB::commit();

            $sponsor = Sponsor::sponsorList();
            if($request->sponsor_id!=null){
                Session::flash('success', 'The Sponsor has been updated successfully!');
            }
            else{
                Session::flash('success', 'The Sponsor has been added successfully!');
            }
            return response()->json($sponsor);

       } catch (\Exception $e) {
           DB::rollback();
           Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
           return Redirect::back()->withInput();
       }

    }
    public function EditSponsor(Request $request)
    {
        $sponsors = Sponsor::findOrFail($request->id);
        return response()->json($sponsors);
    }
    public function DeleteSponsor(Request $request)
    {
        $data = Sponsor::find($request->id);
        $old = $data->image;
        if(File::exists($old)){
            File::delete($old);
        }
        $data->delete();
        $msg = "Sposor member has been deleted Successfully";
        Session::flash("error","Sponsor member has been Deleted Successfully");
        return response()->json($msg);
    }
}
