<?php

namespace App\Http\Controllers;

use App\Libraries\CommonFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use App\Massage;
use Illuminate\Support\Facades\File;

class MassageController extends Controller
{
    public function ViewMassage()
    {
        $massages = null;
        return view('admin.massage.view-massage', compact('massages'));
    }



    public function getMassageList(Request $request)
    {

        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = Massage::massageList();
            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="' . "https://aahcalumni.org/".($list->image) . '" height="60" width="110"></a>';
                })
                ->editColumn('file', function ($list) {
                    return ' <a target="_blank"><i class="fas fa-file-archive 2x" style="color: #0a0f1c"></i>"' . basename($list->file) . '"</a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="' . $list->id . '" onclick="editmassage(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="' . $list->id . '" onclick="deletemassage(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'file', 'image'])
                ->make(true);
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }



    public function SaveMassage(Request $request)
    {

        try {
            DB::beginTransaction();
            if ($request->massage_id != null) {
                $data = Massage::findOrFail($request->massage_id);
                $old = $data->image;
                $oldFile = $data->image;
            } else {
                $data = new Massage();
            }
            $data->name = $request->name;
            $data->desingnation = $request->desingnation;
            $data->description = $request->description;

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                if(isset($old)){
                    if (File::exists($old)) {
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, "image", "uploads/message/picture");
            }

            if ($request->has('file') && $request->file != '') {
                if(isset($oldFile)){
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
                $request->validate(['file' => 'required|mimes:pdf']);
                $data->file = $this->imageUpload($request, "file", "uploads/message/file");
            }


            $data->save();

            // User photo


            DB::commit();

            $massages = Massage::massageList();
            if ($request->massage_id != null) {
                Session::flash('success', 'The Massage has been updated successfully!');
            } else {
                Session::flash('success', 'The Massage has been added successfully!');
            }
            return response()->json($massages);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }

    public function EditMassage(Request $request)
    {
        $massages = Massage::findOrFail($request->id);
        return response()->json($massages);
    }
    public function DeleteMassage(Request $request)
    {

        $data = Massage::find($request->id);
        $old = $data->image;
        $oldfile = $data->file;
        if (File::exists($old)) {
            File::delete($old);
        }
        if (File::exists($oldfile)) {
            File::delete($oldfile);
        }
        $data->delete();
        $msg = "Massage member has been deleted Successfully";
        Session::flash("error", "Massages member has been Deleted Successfully");
        return response()->json($msg);
    }
}
