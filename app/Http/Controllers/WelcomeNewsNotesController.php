<?php

namespace App\Http\Controllers;

use App\WecomeNews;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class WelcomeNewsNotesController extends Controller
{

    public function EditNewsNote(Request $request)
    {
        $welcomenews = WecomeNews::findOrFail($request->id);
        return view('admin.welcomeNews.view-welcome-news', compact('welcomenews'));
        return response()->json($welcomenews);
    }

    public function UpdateNews(Request $request)
    {

        try {

            DB::beginTransaction();

            $data = WecomeNews::findOrFail($request->welcomenews_id);
            $data->title = $request->title;
            $data->date = $request->date;
            $data->description = html_entity_decode($request->description);

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                $old = $data->image;
                if(File::exists($old)){
                    File::delete($old);
                }
                $data->image = $this->imageUpload($request, "image", "uploads/welcomenews");
            }

            $data->save();

            // User photo


            DB::commit();

            $welcomenews = WecomeNews::welcomenotesList();
            Session::flash('success', 'The Welcome News has been updated successfully!');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }
}
