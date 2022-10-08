<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    public function ViewNews()
    {
        $news = null;
        return view('admin.news.view-news',compact('news'));
    }

    public function getNewsList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = News::newsList();

            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="'.asset('/').($list->image).'" height="60" width="110"></a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" onclick="editnews(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deletenews(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','image'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveNews(Request $request)
    {

       try {
        DB::beginTransaction();
        if($request->news_id!=null){
            $data = News::findOrFail($request->news_id);
            $old = $data->image;
        }
        else{
            $data = new News();
        }
        $data->title = $request->title;
        $data->description = html_entity_decode($request->description);
        if ($request->has('image') && $request->image != '') {
            $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
            if(isset($old)){
                if(File::exists($old)){
                    File::delete($old);
                }
            }
            $data->image = $this->imageUpload($request, "image", "uploads/news");
        }

        $data->save();

        // User photo


        DB::commit();

        $committee = news::newsList();
        if($request->committee_id!=null){
            Session::flash('success', 'The Committee has been updated successfully!');
        }
        else{
            Session::flash('success', 'The Committee has been added successfully!');
        }
        return response()->json($committee);

       } catch (\Exception $e) {
           DB::rollback();
           Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
           return Redirect::back()->withInput();
       }

    }
    public function EditNews(Request $request)
    {
        $news = News::findOrFail($request->id);
        return response()->json($news);
    }
    public function DeleteNews(Request $request)
    {
        $data = News::find($request->id);
        $old = $data->image;
        if(File::exists($old)){
            File::delete($old);
        }
        $data->delete();
        $msg = "News/Event has been deleted Successfully";
        Session::flash("error","News has been Deleted Successfully");
        return response()->json($msg);
    }
}
