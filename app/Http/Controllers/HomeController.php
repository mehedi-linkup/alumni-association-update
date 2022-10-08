<?php

namespace App\Http\Controllers;

use App\HeaderContent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Modules\Participant\Models\Participant;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $min_passing_year = Participant::orderby("passing_year","desc")->min('passing_year');
        $max_passing_year = Participant::orderby("passing_year","desc")->max('passing_year');
        $month = date('M',strtotime(Carbon::now()));
        $today = date('d',strtotime(Carbon::now()));
        $t_collection = 0;
        $m_collection = 0;
        $all = DB::table('transaction')->where("status","Success")->orderby("created_at","desc")->get();
        foreach($all as $al){
            if(date('M',strtotime($al->created_at)) == $month){
                $m_collection += intval($al->amount);
            }
            if(date('d',strtotime($al->created_at)) == $today){
                $t_collection += intval($al->amount);
            }
            
        }
    
        // dd($min_passing_year,$max_passing_year,$passing_year);
        return view('admin.home',compact('min_passing_year','max_passing_year','t_collection','m_collection'));
    }

    public function CollectionReport(){
        return view('admin.collection.collection_report');
    }

    public function GetCollection(Request $request)
    {
        $from = $request->date_from;
        $date = Carbon::createFromFormat('Y-m-d', $request->date_to);
        $to = $date->addDays(1);
        $transaction = DB::table("transaction")->join('participants','participants.id','=','transaction.user_id')->whereBetween("transaction.created_at",[$from, $to])->where("transaction.status","Success")->select('transaction.*','participants.name')->get();
        return response()->json($transaction);
    }

    public function GetContactMessage()
    {
        $messages = DB::table('contact_messages')->orderby("id","desc")->get();
        return view('admin.massage.contact_message',compact('messages'));
    }

    public function DeleteContactMessage(Request $request)
    {
        DB::table('contact_messages')->where('id',$request->id)->delete();
        $msg = "Contact Message has been deleted Successfully";
        Session::flash("error","Contact Message has been deleted Successfully");
        return response()->json($msg);
    }


    public function headerindex()
    {
        $data = HeaderContent::first();
        return view("admin.headercontent.index", compact("data"));
    }

}
