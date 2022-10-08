<?php

namespace App\Http\Controllers;
use App\Category;
use App\Libraries\CommonFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function ViewCategory()
    {  
        $levels = Category::where(['parent_id'=>0])->get();
        $category = null;
        return view('admin.category.view-category',compact('category','levels'));
    }

    public function getCategoryList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = Category::categoryList();

            return DataTables::of($list)
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" onclick="editcategory(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deletecategory(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveCategory(Request $request)
    {

        try {
            DB::beginTransaction();
            if($request->category_id!=null){
                $data = Category::findOrFail($request->category_id);
            }
            else{
                $data = new Category();
            }
            $data->name = $request->name;
            $data->parent_id = $request->parent_id;
            $data->url = $request->url;
            $data->description = $request->description;
            $data->save();

            // User photo


            DB::commit();

            $category = Category::categoryList();
            if($request->category_id!=null){
                Session::flash('success', 'The Category has been updated successfully!');
            }
            else{
                Session::flash('success', 'The Category has been added successfully!');
            }
            return response()->json($category);

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }

    }
    public function EditCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return response()->json($category);
    }
    public function DeleteCategory(Request $request)
    {
        DB::table('categories')->where('id',$request->id)->delete();
        $msg = "Category has been deleted Successfully";
        Session::flash("success","Participant has been Deleted Successfully");
        return response()->json($msg);
    }
}
