<?php

namespace App\Modules\Event\Http\Controllers;

use DB;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Libraries\Encryption;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Libraries\CommonFunction;
use App\Modules\Event\Models\Event;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\Event\Models\Downloads;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewGallery()
    {
        $event = null;
        $list = Event::galleryList();
        return view('Event::list',compact('event','list'));
    }

    public function getList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

//        try {

            $list = Event::galleryList();
            return DataTables::of($list)
                ->editColumn('photo', function ($list) {
                    return Event::getimage($list->id);
                })
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" href="'.asset('/'). 'event/gallery/edit/'.$list->id.'" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deletegallery(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','photo'])
                ->make(true);

//        } catch (\Exception $e) {
//            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
//            return Redirect::back();
//        }
    }

    public function getImageList(Request $request) {
        
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }
        $list = DB::table('photo')->where('event_id',$id)->get();
        return DataTables::of($list)
            ->editColumn('photo', function ($list) {
                return $list;
            })
            ->addColumn('action', function ($list) {
                return '<a id="'.$list->id.'" href="'.asset('/'). 'event/gallery/edit/'.$list->id.'" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deletegallery(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
            })
            ->addIndexColumn()
            ->rawColumns(['action','photo'])
            ->make(true);

    }

    public function SaveGallery(Request $request)
    {
       try {
            DB::beginTransaction();
            $data = new Event();
            $data->event_name = $request->event_name;
            $data->event_type = $request->event_type;
            $data->date = $request->date;
            $data->save();


            $event_id = DB::table('photo_gallery')->orderBy("created_at","desc")->first()->id;
            $photo = $request->file('images');
            if($photo){
                foreach ($photo as $key=>$value) {
                    $details = Array();
                    $path = 'uploads/event/' . date("Y") . "/" . date("m") . "/";
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                        $new_file = fopen($path . '/index.html', 'w') or die('Cannot create file:  [UC-1001]');
                        fclose($new_file);
                    }
                    // $root_path = CommonFunction::getProjectRootDirectory(); // Path to the project's root folder
                    $image = $photo[$key];
                    $imageName = time().$key. '.' . $image->extension();
                    // $image->move($root_path . '/' . $path, $imageName);
                    $image->move(public_path() . '/' . $path, $imageName);
                    $details['photo'] = $path . $imageName;
                    $details['event_id'] = $event_id;
                    $save = DB::table('photo')->insert($details);
                }
            }

            DB::commit();

            $event = Event::galleryList();
                Session::flash('success', 'The Gallery has been Insert successfully!');

           return Redirect::back();
         

       } catch (\Exception $e) {
           DB::rollback();
           Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
           return Redirect::back()->withInput();
       }

    }

    private function createdUserVerification($encrypted_token)
    {
        try {
            $user = User::where('user_hash', $encrypted_token)->first();
            if (empty($user)) {
                Session::flash('error', 'Invalid token! Please sign up again to complete the process');
                return redirect()->route('user_add');
            }

            // e.g. 'Sgbw~pec2l'
            $special_char = "!@#$%^&*()_+={}:;'\|,>?/<>.`~";
            $user_password = chr(rand(65,90)). strtolower(Str::random(3)). substr(str_shuffle($special_char),0,1). strtolower(Str::random(3)). rand(0,9). chr(rand(97,122));

            DB::beginTransaction();

            $data = [
                'password' => Hash::make($user_password),
                'email_verified_at' => Carbon::now(),
            ];

            $user->checkVerified($encrypted_token, $data);

            AuditPassword::create([
                'user_id' => $user->id,
                'password' => $user_password,
            ]);

            $email_sms_info['user_password'] = $user_password;
            $email_sms_info['base_url'] = config('app.url');

            $receiver_info[] = [
                'user_email' => $user->email,
                'mobile_number' => $user->mobile,
            ];

            CommonFunction::sendEmailSMS('ACCOUNT_ACTIVATION', $email_sms_info, $receiver_info);

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', 'Something went wrong [UC-1520]');
            return \redirect()->back();
        }
    }
    public function EditEvent($id) {
        $event = Event::find($id);
        $gallery =  DB::table('photo')->where('event_id',$id)->get();

        return view('Event::gallery-list',compact('event','gallery'));

    }

    public function EditGallery($id)
    {
        $user_id = Encryption::decodeId($id);

        try {

            $user = User::findOrFail($user_id);

            $user_types = UserType::where('status','active')->get(['id','type_name']);

            return view('Users::edit', compact('user', 'user_types'));

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1010]');
            return Redirect::back();
        }
    }

    public function UpdateGallery(Request $request)
    {
   
    }
    public function DeleteGallery(Request $request)
    {

        $event = Event::findOrFail($request->id);
        DB::table('photo')->where('id',$event->id) ->delete(); 
        $event->delete();
        $msg = "Photo Gallery has been deleted Successfully";
        Session::flash("error","Photo Gallery has been Deleted Successfully");
        return response()->json($msg);
    }

    public function ViewDownloads()
    {
        $downloads = null;
        return view('Event::downloads.list',compact('downloads'));
    }

    public function getDownloadList(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }
        try {
            $list = Downloads::downloadList($request->type);
            return DataTables::of($list)
                ->editColumn('file', function ($list) {
                    return ' <a target="_blank"><i class="fas fa-file-archive 2x" style="color: #0a0f1c"></i>"'.basename($list->file).'"</a>';
                })
                ->addColumn('action', function ($list) {
                    return '<a id="'.$list->id.'" onclick="editdownloads(this.id)" class="btn btn-primary btn-xs" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a style="color: #fff" name="'.$list->id.'" onclick="deletedownloads(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action','file'])
                ->make(true);

        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function SaveDownloads(Request $request)
    {

        try {
            DB::beginTransaction();
            if($request->document_id){
                $data = Downloads::findOrFail($request->document_id);
            }
            else{
                $data = new Downloads();
            }

            $data->document_name = $request->document_name;
            $data->type = $request->type;
            if($request->date){
                $data->date = $request->date;
            }
            else{
                $data->date = date('Y-m-d H:i:s',Carbon::now());
            }

            $file = $request->file('file');

            if ($request->has('file') && $request->file != '') {
                $request->validate(['file' => 'required|file|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx']);
                $path = 'uploads/users/' . date("Y") . "/" . date("m") . "/" . "soronika_documents/";               
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    $new_file = fopen($path . 'index.html', 'w') or die('Cannot create file:  [UC-1001]');
                    fclose($new_file);
                }
                if($data->file) {
                    if(file_exists($data->file) AND !empty($data->file)) {
                        unlink($data->file);
                    }
                }
                // $root_path = CommonFunction::getProjectRootDirectory(); // Path to the project's root folder
                $new_file = $request->file;
                $fileName = time() . '.' . $new_file->extension();
                // $new_file->move($root_path . '/' . $path, $fileName);
                $new_file->move(public_path(). '/' . $path, $fileName);
                $data->file = $path . $fileName;
            }
            $data->save();

            // User photo
            DB::commit();

            if($request->document_id){
                Session::flash('success', 'The downloads document has been updated successfully!');
            } else {
                Session::flash('success', 'The downloads document has been added successfully!');
            }
            return redirect()->route('soronika-documents');

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }

    }
    public function EditDownloads(Request $request)
    {
        $downloads = Downloads::findOrFail($request->id);
        return response()->json($downloads);
    }
    public function DeleteDownloads(Request $request)
{
        $document = Downloads::find( $request->id);

        if(file_exists($document->file) AND !empty($document->file)) {
            unlink($document->file);
        }
        $document->delete();
        $msg = "Download documents Deleted Successfully";
        Session::flash("success","Download documents Deleted Successfully");
        return response()->json($msg);
    }

}
