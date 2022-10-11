<?php

namespace App\Modules\Participant\Http\Controllers;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Participant\Models\Participant;

class ParticipantSmsController extends Controller
{
    public function index()
    {
        // $welcomenotes = WelcomeNotes::findOrFail($request->id);
        return view('Participant::sendsms');
    }
    public function getParticipantList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Participant::latest()->get();
            return DataTables::of($list)
                ->editColumn('image', function ($list) {
                    return '<img src="'.( @$list->image? asset($list->image) : (@$list->gender == "Male"? asset('front/images/male.png') : asset('front/images/female.png')) ).'" style="width:100px;height:auto">';
                })
                ->editColumn('status', function ($list) {
                    if($list->status == 0){
                    return '<a id="'.$list->id.'" target="_blank" href="'.route('add_payment',['id'=>$list->id]).'" style="color:#fff" class="badge badge-danger append-id">Pending</button>';
                    }
                    else{
                        return '<a data-toggle="modal" id="'.$list->id.'" class="badge badge-success">Active</button>';
                    }
                })
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" onclick="editparticipant(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deleteparticipant(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','image','status'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', ($e->getMessage()));
            return Redirect::back();
        }
    }
}
