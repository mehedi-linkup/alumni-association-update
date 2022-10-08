<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function ViewTeacher()
    {
        $teacher = null;
        return view('admin.teacher.view-teacher', compact('teacher'));
    }

    public function getTeacherList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = Teacher::teacherList();

            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="' . "https://aahcalumni.org/".($list->image) . '" height="60" width="110"></a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="' . $list->id . '" onclick="editteacher(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="' . $list->id . '" onclick="deleteteacher(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'image'])
                ->make(true);
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveTeacher(Request $request)
    {

        try {
            DB::beginTransaction();
            if ($request->teacher_id != null) {
                $data = Teacher::findOrFail($request->teacher_id);
                $old = $data->image;
            } else {
                $data = new Teacher();
            }
            $data->name = $request->name;
            $data->qualification = $request->qualification;
            $data->degingnation_title = $request->degingnation_title;
            $data->depertment = $request->depertment;
            $data->teacher_type = $request->teacher_type;

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                if(isset($old)){
                    if(File::exists($old)){
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, "image", "uploads/teacher");
            }

            $data->save();

            // User photo


            DB::commit();

            $teacher = Teacher::teacherList();
            if ($request->teacher_id != null) {
                Session::flash('success', 'The Teacher has been updated successfully!');
            } else {
                Session::flash('success', 'The Teacher has been added successfully!');
            }
            return response()->json($teacher);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }
    public function EditTeacher(Request $request)
    {
        $teacher = Teacher::findOrFail($request->id);
        return response()->json($teacher);
    }
    public function DeleteTeacher(Request $request)
    {
        $data = Teacher::find($request->id);
        $old = $data->image;
        if(File::exists($old)){
            File::delete($old);
        }
        $data->delete();
        $msg = "Teacher member has been deleted Successfully";
        Session::flash("error", "Teacher member has been Deleted Successfully");
        return response()->json($msg);
    }
}
