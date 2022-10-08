<?php

namespace App\Http\Controllers;

use App\Committe;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CommitteeController extends Controller
{
    public function ViewCommittee()
    {
        $committee = null;
        return view('admin.committee.view-committee', compact('committee'));
    }

    public function getCommitteeList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = Committe::committeeList();

            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="' . "https://aahcalumni.org/".($list->image) . '" height="60" width="110"></a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="' . $list->id . '" onclick="editcommittee(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="' . $list->id . '" onclick="deletecommittee(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'image'])
                ->make(true);
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveCommittee(Request $request)
    {

        try {
            DB::beginTransaction();
            if ($request->committee_id != null) {
                $data = Committe::findOrFail($request->committee_id);
                $old = $data->image;
            } else {
                $data = new Committe();
            }
            $data->name = $request->name;
            $data->desingnation = $request->desingnation;
            $data->committee_type = $request->committee_type;
            $data->batch = $request->batch;

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                if (isset($old)) {
                    if (File::exists($old)) {
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, "image", "uploads/commeitte");
            }

            $data->save();

            // User photo


            DB::commit();

            $committee = Committe::committeeList();
            if ($request->committee_id != null) {
                Session::flash('success', 'The Committee has been updated successfully!');
            } else {
                Session::flash('success', 'The Committee has been added successfully!');
            }
            return response()->json($committee);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }
    public function EditCommittee(Request $request)
    {
        $committee = Committe::findOrFail($request->id);
        return response()->json($committee);
    }
    public function DeleteCommittee(Request $request)
    {
        $data = Committe::find($request->id);
        $old = $data->image;
        if (File::exists($old)) {
            File::delete($old);
        }
        $data->delete();
        $msg = "Committee member has been deleted Successfully";
        Session::flash("error", "Committee member has been Deleted Successfully");
        return response()->json($msg);
    }
}
