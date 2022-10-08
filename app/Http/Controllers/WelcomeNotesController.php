<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\WelcomeNotes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class WelcomeNotesController extends Controller
{


    public function Editnotes(Request $request)
    {
        $welcomenotes = WelcomeNotes::findOrFail($request->id);
        return view('admin.welcome.view-welcome', compact('welcomenotes'));
        return response()->json($welcomenotes);
    }

    public function UpdateNotes(Request $request)
    {

        try {

            DB::beginTransaction();

            $data = WelcomeNotes::findOrFail($request->welcomenotes_id);
            $data->title = $request->title;
            $data->date = $request->date;
            $data->description = html_entity_decode($request->description);

            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                $old = $data->image;
                if(File::exists($old)){
                    File::delete($old);
                }
                $data->image = $this->imageUpload($request, "image", "uploads/welcomenotes");
            }

            $data->save();

            // User photo


            DB::commit();

            $welcomenotes = WelcomeNotes::welcomenotesList();
            Session::flash('success', 'The Welcome Notes has been updated successfully!');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }
}
