<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AboutUsController extends Controller
{
    public function ViewAboutUs()
    {
        $aboutus = null;
        return view('admin.abouts.view-aboutus', compact('aboutus'));
    }

    public function getAboutUsList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = AboutUs::aboutusList();

            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="' . "https://aahcalumni.org/".($list->image) . '" height="60" width="110"></a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="' . $list->id . '" onclick="editaboutus(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="' . $list->id . '" onclick="deleteaboutus(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'image'])
                ->make(true);
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveAboutUs(Request $request)
    {

        try {
            DB::beginTransaction();
            if ($request->aboutus_id != null) {
                $data = AboutUs::findOrFail($request->aboutus_id);
                $old = $data->image;
            } else {
                $data = new AboutUs();
            }
            $data->title = $request->title;
            $data->date = $request->date;
            $data->about_type = $request->about_type;
            $data->description = $request->description;

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                if(isset($old)){
                    if(File::exists($old)){
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, "image", "uploads/aboutus");
            }

            $data->save();

            // User photo


            DB::commit();

            $aboutus = AboutUs::aboutusList();
            if ($request->aboutus_id != null) {
                Session::flash('success', 'The About Us has been updated successfully!');
            } else {
                Session::flash('success', 'The About Us has been added successfully!');
            }
            return response()->json($aboutus);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }
    public function EditAboutUs(Request $request)
    {
        $aboutus = AboutUs::findOrFail($request->id);
        return response()->json($aboutus);
    }
    public function DeleteAboutUs(Request $request)
    {
        $data = AboutUs::find($request->id);
        $old = $data->image;
        if(File::exists($old)){
            File::delete($old);
        }
        $data->delete();
        $msg = "About Us has been deleted Successfully";
        Session::flash("error", "About Us has been Deleted Successfully");
        return response()->json($msg);
    }
}
