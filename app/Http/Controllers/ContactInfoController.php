<?php
namespace App\Http\Controllers;

use App\ContactInfo;
use App\HeaderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth');  
    }
    public function index()
    {
        $all=ContactInfo::first();
       return view ('admin.contactinfo.information', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactInfoUpdate(Request $request, ContactInfo $contact)
    {
        $request->validate([
            'school_email' =>'required',
            'school_phone' =>'required',
            'school_address' =>'required',
            'secretary_email' =>'required',
            'secretary_phone' =>'required',
            'secretary_address' =>'required',
            'committee_email' =>'required',
            'committee_phone' =>'required',
            'committee_address' =>'required',
        ]);
        
        $contact->school_email = $request->school_email;
        $contact->school_phone = $request->school_phone;
        $contact->school_address = $request->school_address;
        $contact->secretary_email = $request->secretary_email;
        $contact->secretary_email = $request->secretary_email;
        $contact->secretary_phone = $request->secretary_phone;
        $contact->secretary_address = $request->secretary_address;
        $contact->committee_email = $request->committee_email;
        $contact->committee_phone = $request->committee_phone;
        $contact->committee_address = $request->committee_address;
        $contact->program_start_date = $request->program_start_date;
        $contact->save();
        $data = HeaderContent::first();
        $data->email = $request->header_email;
        $data->phone = $request->header_phone;
        $data->update();
        if($contact){
            Session::flash('success', 'success');
            return redirect()->back()->with('success', 'Save successfully');     
        }else{
            Session::flash('errors', ' something went wrong');
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
