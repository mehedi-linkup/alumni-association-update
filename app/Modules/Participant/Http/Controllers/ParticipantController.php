<?php

namespace App\Modules\Participant\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libraries\CommonFunction;
use App\Modules\Event\Models\Downloads;
use App\Modules\Participant\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use App\Payment;
use PDF;
use DNS2D;
use DNS1D;
use Mockery\Undefined;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

// require_once __DIR__ . '/vendor/autoload.php';

class ParticipantController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewParticipant()
    {
        $participant = null;
        return view('Participant::view-participant',compact('participant'));
    }

    public function ActiveParticipant(){
        return view('Participant::active-participant');
    }

    public function PendingParticipant(){
        return view('Participant::pending-participant');
    }
    public function getParticipantList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            // $list = Participant::participantList($request->status);
            $list = Participant::latest()->get();
            // $customImage = "";
            // if($list->gender) {
            //     if($list->gender == 'Male') {
            //         $customImage = "front/images/male.png";
            //     } else {
            //         $customImage = "front/images/female.png";
            //     }
            // }
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
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function getParticipantpendingList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            
            $list = Participant::where('status', '0')->latest()->get();
           
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
                    return  '<a style="color: #fff" name="'.$list->id.'" onclick="deleteparticipant(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','image','status'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }


    public function AddPayment($id)
    {
        try{
        $participant = Participant::findOrFail($id);
        $participant = DB::table('participants')->orderby("created_at","desc")->first();
        $transaction = Array();
        $transaction['user_id'] = $participant->id;
        Session::flash('success', 'Your Registration Has Been Successfully !!');
        $amount = 1000;
        if($participant->year == "2022"){
            $amount = 500;
        }
        $shurjopay_service = new ShurjopayService();
        $tx_id = $shurjopay_service->generateTxId();
        $transaction['tx_id'] = $tx_id;
        $transaction['amount'] = $amount;
        DB::table('transaction')->insert($transaction);
        $success_route = route('participant-payment'); //This is your custom route where you want to back after completing the transaction.
        $shurjopay_service->sendPayment(1, $success_route);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }

    public function ParticipantPayment(Request $request)
    {
        try {
            if($request->status == "Success"){
                $transaction = Array();
                $transaction['bank_tx_id'] = $request->bank_tx_id;
                $transaction['status'] = $request->status;
                $transaction['bank_status'] = $request->bank_status;
                $transaction['sp_payment_option'] = $request->sp_payment_option;
                $transaction['sp_code'] = $request->sp_code;
                $transaction['sp_code_des'] = $request->sp_code_des;
                DB::table('transaction')->where("tx_id",$request->tx_id)->update($transaction);
                $participants = DB::table('transaction')->where("tx_id",$request->tx_id)->where("status","Success")->first();
                DB::table('participants')->where('id',$participants->user_id)->update(['status' => 1]);
                Session::flash('success', 'Your Payment received Successfully received !!');
                return redirect()->back();
            }
            else{
                DB::table('transaction')->where("tx_id",$request->tx_id)->delete();
                return redirect()->back();
            }
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
                return Redirect::back()->withInput();
            }
    }

    public function getParticipantactiveList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Participant::participantactiveList($request->status);
            return DataTables::of($list)
                ->editColumn('status', function ($list) {
                    if($list->status == 2){
                    return '<a data-toggle="modal" id="'.$list->id.'" onclick="statuschange(this.id)" style="color:#fff" class="badge badge-danger append-id">Waiting</button>';
                    }
                    else{
                        return '<a data-toggle="modal" id="'.$list->id.'" class="badge badge-success">Active</button>';
                    }
                })
                ->addColumn('action', function ($list) {
                    if($list->status == '1'){
                        return '<a href="'.route('print_participant_list',['id'=>$list->id]).'" target="_blank" class="btn btn-success" style="color: #fff;"><i class="fa fa-print" aria-hidden="true"></i></a><a style="color: #fff" name="'.$list->id.'" onclick="deleteparticipanttr(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                    }
                    else{
                        return '<a style="color: #fff" name="'.$list->id.'" onclick="deleteparticipanttr(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                    }
                    
                })
                ->addIndexColumn()
                ->rawColumns(['action','status'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function GetParticipantDetails(Request $request)
    {
        $participant = Participant::findOrFail($request->id);
        $output = '';
        $output .= DNS2D::getBarcodeHTML($participant->id,$participant->name, 'QRCODE');
        return response()->json($participant);
    }

    public function SaveParticipant(Request $request)
    {
        try {
            
            DB::beginTransaction();
            if($request->participant_id){
                $data = Participant::findOrFail($request->participant_id);
            }
            else{
                $data = new Participant();
                $data->password = bcrypt($request->password);
            }
            $data->registration_id = "".$request->passing_year.date('ymdhis',strtotime(Carbon::now()));
            $data->passing_year = $request->passing_year;
            $data->name = $request->name;
            $data->fathers_name = $request->fathers_name;
            $data->mother_name = $request->mother_name;
            $data->occupation = $request->occupation;
            $data->present_address = $request->present_address;
            $data->permanent_address = $request->permanent_address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->blood_group = $request->blood_group;
            $data->gender = $request->gender;
            $data->dress = $request->dress;
            if($request->participant_id){
                $filename = $data->image;
                File::delete($filename);
            }
            if ($request->has('image') && $request->image != '' && $request->image != 'undefined') {

                $path = 'uploads/users/' . date("Y") . "/" . date("m") . "/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    $new_file = fopen($path . '/index.html', 'w') or die('Cannot create file:  [UC-1001]');
                    fclose($new_file);
                }
                // $root_path = CommonFunction::getProjectRootDirectory(); // Path to the project's root folder
                $image = $request->image;
                $imageName = time() . '.' . $image->extension();
                // $image->move($root_path . '/' . $path, $imageName);
                $image->move(public_path() . '/' . $path, $imageName);
                $data->image = $path . $imageName;
            }
            $data->save();
            DB::commit();
            // $status = 0;

            // $participant = Participant::participantList($status);
            $participant = Participant::latest()->get();
            Session::flash('success', 'The participant has been added successfully!');
            return response()->json($participant);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }

    }

    public function ParticipantList($passing_year){
        $year = $passing_year;
        return view('Participant::participant-list',compact('year'));
    }

    public function PrintParticipantId($id)
    {
        $part = Participant::where('id',$id)->where('status',1)->first();
        return view('Participant::print-participant-id',compact('part'));
    }

    public function YearParticipantList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Participant::participantyearList($request->year);
            // return response()->json($request->year);

            return DataTables::of($list)
                ->editColumn('status', function ($list) {
                    if($list->status == 0){
                    return '<a data-toggle="modal" id="'.$list->id.'" onclick="statuschange(this.id)" style="color:#fff" class="badge badge-danger append-id">Waiting</button>';
                    }
                    else{
                        return '<a data-toggle="modal" id="'.$list->id.'" class="badge badge-success">Active</button>';
                    }
                })
                ->addColumn('action', function ($list) {
                    return '<a href="'.route('print_participant_list',['id'=>$list->id]).'" target="_blank" class="btn btn-success" style="color: #fff;"><i class="fa fa-print" aria-hidden="true"></i></a><a href="'.route('print_participant_id',['id'=>$list->id]).'" target="_blank" class="btn btn-success" style="color: #fff;"><i class="fa fa-envelope" aria-hidden="true"></i></a><a style="color: #fff" name="'.$list->id.'" onclick="deleteparticipanttr(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','status'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }
    public function EditParticipant(Request $request)
    {
        $participant = Participant::findOrFail($request->id);
        return response()->json($participant);
    }
    public function DeleteParticipant(Request $request)
    {
        try {
            
            // $participant = DB::table('participants')->where('id',$request->id)->first();
            $participant = Participant::find($request->id);
            $filename = $participant->image;
            if(file_exists($filename)) {
                unlink($filename);
            }
            // DB::table('participants')->where('id',$request->id)->delete();
            $participant->delete();
            $msg = "Participant has been deleted Successfully";
            
            Session::flash("success","Participant has been Deleted Successfully");
            
            $participant = Participant::latest()->get();
            return response()->json($participant);
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            // return Redirect::back();
            response()->json($e->getMessage());
        }
    }
    public function DeleteParticipantTr(Request $request)
    {
        $participant = DB::table('participants')->where('id',$request->id)->first();
       
        if(file_exists($participant->image) AND $participant->image != null) {
            unlink($participant->image);
        }
        DB::table('payments')->where('participant_id',$participant->id)->delete();
        DB::table('participants')->where('id',$request->id)->delete();
        $msg = "Participant has been deleted Successfully";
        Session::flash("success","Participant has been Deleted Successfully");
        return response()->json($msg);
    }

    public function ParticipantStatus(Request $request)
    {
        // dd();
        $participant = Participant::findOrFail($request->id);
        $participant->status = 1;
        $participant->save();
        $msg = true;
        return response()->json($msg,$barcode);
    }
    public function PrintParticipantList($id){
        $participant = Participant::where('id',$id)->first();
        $output = '\r\n';
        $output .= $participant->name;
        $output .= $participant->registration_id;
        $output .= '\r\n lunch';
        return view('Participant::print-participant-list',compact('participant','output'));
    }

    public function ParticipantIdList($passing_year){
        $participant = Participant::where('passing_year',$passing_year)->where('status',1)->orderby("passing_year","asc")->get();
        return view('Participant::participant-id-list',compact('participant'));
    }
    public function ParticipantInvoiceList($passing_year){
        $participant = Participant::where('passing_year',$passing_year)->where('status',1)->orderby("passing_year","asc")->get();
        return view('Participant::participant-invoice-list',compact('participant'));
    }

    public function DownloadPDFarticipantList($id){
        
        $participant = Participant::where('id',$id)->first();
        $pdf = PDF::loadView('admin.downloadpdf-participant-list',compact('participant'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('invoice.pdf');

    }


    public function PaymentSave(Request $request){
        try {
        DB::begintransaction();
         $payment = Array();
         $payment['user_id'] = $request->user_id;
         $payment['tx_id'] = $request->tx_id;
         $payment['bank_tx_id'] = $request->bank_tx_id;
         $payment['amount'] = $request->amount;
         $payment['bank_status'] = $request->bank_status;
         $payment['sp_code'] = $request->sp_code;
         $payment['sp_code_des'] = $request->sp_code_des;
         $payment['sp_payment_option'] = $request->sp_payment_option;
         $payment['status'] = $request->status;
         DB::table('transaction')->insert($payment);
         $participant = Participant::findOrFail($request->user_id);
         $participant->status = 2;
         $participant->save();
         Session::flash('success', 'success');
        return redirect()->back()->with('success', 'Payment Information Send Successfully');     
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
     } 


    public function SoronikaDocuments(){
        $downloads = null;
        return view('Participant::soronika',compact('downloads'));
    }


    public function checkPhone(Request $request) {

        if($request->participant_id != null) {
            $phone = Participant::where('phone', $request->phone)->where('id', '!=', $request->participant_id)->first();
            if($phone) {
                return response()->json(['data' => false]);
            } else {
                return response()->json(['data' => true]);
            }
        } else {
            $phone = Participant::where('phone', $request->phone)->first();
            if($phone) {
                return response()->json(['data' => false]);
            } else {
                return response()->json(['data' => true]);
            }
        }

    }
  
}

