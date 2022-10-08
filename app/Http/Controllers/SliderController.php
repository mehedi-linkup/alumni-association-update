<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function ViewSlider()
    {
        $sliders = null;
        return view('admin.slider.view-slider',compact('sliders'));
    }

    public function getSliderList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {

            $list = Slider::sliderList();
            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return ' <a target="_blank"><img src="'.asset('/').($list->image).'" height="60" width="110"></a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" onclick="editslider(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deleteslider(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','image'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveSlider(Request $request)
    {
       try {
            DB::beginTransaction();
            if($request->slider_id!=null) {
                $data = Slider::findOrFail($request->slider_id);
                $old = $data->image;
            }
            else {
                $data = new Slider();
            }
            $data->title = $request->title;

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                if(isset($old)){
                    if(File::exists($old)){
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, "image", "uploads/slider");
            }

            $data->save();

            // User photo


            DB::commit();

            $slider = Slider::sliderList();
            if($request->slider_id!=null){
                Session::flash('success', 'The Slider has been updated successfully!');
            }
            else{
                Session::flash('success', 'The Slider has been added successfully!');
            }
            return response()->json($slider);

       } catch (\Exception $e) {
           DB::rollback();
           Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
           return Redirect::back()->withInput();
       }

    }
    public function EditSlider(Request $request)
    {
        $sliders = Slider::findOrFail($request->id);
        return response()->json($sliders);
    }
    public function DeleteSlider(Request $request)
    {
        $data = Slider::find($request->id);
        $old = $data->image;
        if(File::exists($old)){
            File::delete($old);
        }
        $data->delete();
        $msg = "Slider member has been deleted Successfully";
        Session::flash("error","Slider member has been Deleted Successfully");
        return response()->json($msg);
    }
}
