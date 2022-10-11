<?php

namespace App\Http\Controllers\Participant;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Modules\Participant\Models\Participant;

class ParticipantController extends Controller
{

    public function __construct()
    {
        $this->middleware('participant');
    }
    protected function guard()
    {
        return Auth::guard('participant');
    }
    public function index()
    {
        $participant = Participant::findOrFail(Auth::guard('participant')->user()->id);
        return view('front.dashboard.dashboard',compact('participant'));
    }
    public function Profile()
    {
        return view('front.dashboard.profile');
    }
    public function EditProfile(){
        return view('front.dashboard.edit-profile');
    }
    public function UpdateParticipant(Request $request) {
        try {
            $data = Participant::findOrFail(Auth::guard('participant')->user()->id);
            $data->passing_year = $request->passing_year;
            $data->name = $request->name;
            $data->fathers_name = $request->fathers_name;
            $data->mother_name = $request->mother_name;
            $data->occupation = $request->occupation;
            $data->present_address = $request->present_address;
            $data->permanent_address = $request->permanent_address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->dress = $request->dress;
            $data->blood_group = $request->blood_group;
            $data->gender = $request->gender;
            if ($request->has('image') && $request->image != '') {
                $old = $data->image;
                if(file_exists($old)){
                    unlink($old);
                }
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                $data->image = $this->imageUpload($request, "image", "uploads/participant");
            }
            $data->save();
            Session::flash("success","Profile info updated successfully");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function UpdatePassword(Request $request){
        $data = Participant::findOrFail(Auth::guard('participant')->user()->id);
        $data->password = Hash::make($request->new_password);
        $data->save();
        Session::flash("success","Password has updated successfully");
        return redirect()->back();
    }
  
}
