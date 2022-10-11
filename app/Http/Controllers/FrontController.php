<?php

namespace App\Http\Controllers;

use DB;
use App\Etc;
use App\News;
use Exception;
use App\Slider;
use App\AboutUs;
use App\Massage;
use App\Payment;
use App\Sponsor;
use App\Teacher;
use App\Committe;
use App\UpdateNew;
use App\WecomeNews;
use App\ContactInfo;
use App\WelcomeNotes;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Carbon;
use App\Libraries\CommonFunction;
use PHPMailer\PHPMailer\PHPMailer;
use App\Modules\Event\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Modules\Event\Models\Downloads;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\Exception as Except;
use App\Modules\Participant\Models\Participant;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class FrontController extends Controller
{
    public function home()
    {
        $contact = ContactInfo::first();
        $sponsors = Sponsor::all();
        $sliders = Slider::orderBy('id', 'DESC')->get();
        $massages = Massage::orderBy('id', 'DESC')->limit(5)->get();
        $schoolgallerys = Event::get();
        $welcomenews = WecomeNews::first();
        $welcomenotes = WelcomeNotes::first();
        $updatenews = UpdateNew::first();
        $committee = Committe::Where('committee_type', '100 Years Celebration Committee')->get();
        return view('front.home.home', compact('committee', 'welcomenotes', 'welcomenews', 'schoolgallerys', 'sliders', 'sponsors', 'updatenews', 'massages', 'contact'));
    }


    public function AddPayment($id)
    {
        $data = [
            'username' => env('MERCHANT_USERNAME'),
            'password' => env('MERCHANT_PASSWORD')
        ];

        $firstUrl = env('SHURJOPAY_SERVER_URL') . '/api/get_token';

        $ch = curl_init();
        $url = $firstUrl;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response);
        $token =  $res->token;
        $store_id =  $res->store_id;
        $execute_url =  $res->execute_url;


        $data = Participant::find($id);

        $transaction = array();
        $transaction['user_id'] = $data->id;

        $amount = 1000;
        if ($data->passing_year == "2022") {
            $amount = 500;
        }

        $shurjopay_service = new ShurjopayService();
        $tx_id = $shurjopay_service->generateTxId();
        $transaction['tx_id'] = $tx_id;
        $transaction['amount'] = $amount;
        $res = DB::table('transaction')->insert($transaction);

        $ip = \Request::ip();

        $data2 = [
            'token'             => $token,
            'store_id'          => $store_id,
            'prefix'            => 'AAH',
            "amount"            => $amount,
            "currency"          => "BDT",
            "customer_name"     => $data->name,
            "customer_address"  => $data->present_address,
            "customer_city"     => "Dhaka",
            "customer_phone"    => $data->phone,
            "return_url"        => 'https://aahcalumni.org/success-payment',
            "cancel_url"        => 'https://aahcalumni.org/success-payment',
            "order_id"          => $tx_id,
            "customer_email"    => $data->email,
            "client_ip"         => $ip,
            "intent"            => "sale",
            "transactionStatus" => "Initiated"
        ];

        $ch = curl_init();
        $url2 = $execute_url;
        curl_setopt($ch, CURLOPT_URL, $url2);
        curl_setopt($ch, CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response2 = curl_exec($ch);
        curl_close($ch);

        $res2 = json_decode($response2);
        $address =  $res2->checkout_url;

        return redirect()->to($address);

        // try {
        //     $participant = DB::table('participants')->where("id", $id)->first();
        //     $transaction = array();
        //     $transaction['user_id'] = $participant->id;
        //     $amount = 1000;
        //     if ($participant->passing_year == "2021") {
        //         $amount = 500;
        //     }
        //     $shurjopay_service = new ShurjopayService();
        //     $tx_id = $shurjopay_service->generateTxId();
        //     $transaction['tx_id'] = $tx_id;
        //     $transaction['amount'] = $amount;
        //     DB::table('transaction')->insert($transaction);
        //     $success_route = route('success-payment'); //This is your custom route where you want to back after completing the transaction.
        //     $shurjopay_service->sendPayment($amount, $success_route);
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     Session::flash('success', $e->getMessage());
        //     // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
        //     return Redirect::back();
        //     // return Redirect::back()->withInput();
        // }
    }
    public function registration()
    {
        $etc = Etc::first();
        return view('front.home.signup', compact('etc'));
    }

    public function registrationBangla()
    {
        $etc = Etc::first();
        return view('front.home.signup-bangla', compact('etc'));
    }

    public function Login()
    {
        return view('front.home.login');
    }
    public function contacts()
    {
        $info = ContactInfo::first();
        return view('front.home.contact', compact('info'));
    }
    public function aboutHistory($type)
    {
        $histories = AboutUs::where('about_type', $type)->orderBy('id', 'desc')->first();
        return view('front.home.about.history', compact('histories'));
    }

    public function SaveContact(Request $request)
    {
        try {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['message'] = $request->message;
            DB::table('contact_messages')->insert($data);
            Session::flash('success', 'Your information has been saved successfully. We will contact with you within 24 hours');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function GetCommitteeType($type)
    {
        if ($type == "Advisory Committee") {
            $committees = Committe::where('committee_type', $type)->orderby('batch', 'asc')->get();
        } else {
            $committees = Committe::where('committee_type', $type)->orderby('id', 'asc')->get();
        }
        return view('front.home.committee.committee', compact('committees', 'type'));
    }

    public function ViewSoronika()
    {
        $documents = Downloads::orderby('id', 'desc')->where("type", "soronika")->paginate(12);
        return view('front.home.soronika.soronika', compact('documents'));
    }

    public function GetNewsType($type)
    {
        $news = News::where('news_type', $type)->get();
        return view('front.home.news.news', compact('news'));
    }

    public function schoolGallery()
    {
        $schoolgallerys = Event::orderBy('id', 'desc')->get();
        return view('front.home.gallery.school', compact('schoolgallerys'));
    }
    public function committeeGallery()
    {
        $schoolgallerys = Event::where('event_type', 'committee-gallery')->orderBy('id', 'desc')->get();
        return view('front.home.gallery.committee', compact('schoolgallerys'));
    }
    public function Dashboard()
    {
        return view('front.dashboard.dashboard');
    }

    public function ParticipantInvoice($id)
    {
        $participant = Participant::where('id', $id)->first();
        $output = '\r\n';
        $output .= $participant->name;
        $output .= $participant->registration_id;
        $output .= '\r\n lunch';
        return view('front.dashboard.participant-invoice', compact('participant', 'output'));
    }
    public function ParticipantRegister(Request $request)
    {
        $participant = Participant::where('email', $request->email)->first();
        if ($participant) {
            if (Hash::check($request->password, $participant->password)) {
                Session::put("id", $participant->id);
                return view('front.dashboard.dashboard');
            } else {
                Session::flash("message", "Your Given password is Wrong");
                return redirect()->back();
            }
        } else {
            Session::flash("message", "Email and password was incorrect");
        }
    }
    public function ParticipantRegistration(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = new Participant();
            $data->password = bcrypt($request->password);
            $data->registration_id = "" . $request->passing_year . date('ymdhis', strtotime(Carbon::now()));
            $data->passing_year = $request->passing_year;
            $data->class = $request->class;
            $data->year = $request->year;
            $data->name = $request->name;
            $data->occupation = $request->occupation;
            $data->fathers_name = $request->fathers_name;
            $data->mother_name = $request->mother_name;
            $data->present_address = $request->present_address;
            $data->permanent_address = $request->permanent_address;
            $data->blood_group = $request->blood_group;
            $data->gender = $request->gender;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->dress = $request->dress;


            if ($request->has('image') && $request->image != '') {
                $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png']);
                $data->image = $this->imageUpload($request, "image", "uploads/participant");
            }
            $data->save();
            DB::commit();

            return $this->AddPayment($data->id);


            return redirect()->route('participant.login');


            Session::flash('status', 'success');
            Session::flash('message', 'Your Registration Has Been Successfully !!');


            $participant = DB::table('participants')->orderby("created_at", "desc")->first();
            $participant = Participant::latest()->first();
            $transaction = array();
            $transaction['user_id'] = $participant->id;
            Session::flash('success', 'Your Registration Has Been Successfully !!');
            $amount = 1000;
            if ($request->passing_year == "2022") {
                $amount = 500;
            }
            $shurjopay_service = new ShurjopayService();
            $tx_id = $shurjopay_service->generateTxId();
            $transaction['tx_id'] = $tx_id;
            $transaction['amount'] = $amount;
            DB::table('transaction')->insert($transaction);
            $success_route = route('success-payment'); //This is your custom route where you want to back after completing the transaction.

            $shurjopay_service->sendPayment($amount, $success_route);
        } catch (\Exception $e) {
            DB::rollback();
            // Session::flash('status', 'danger');
            // Session::flash('message', 'Something wrong! Please try again.');
            // return Redirect::back();
            return $e->getMessage();
        }
    }

    public function SuccessPayment(Request $request)
    {
        $id = $request->order_id;

        $data = [
            'username' => env('MERCHANT_USERNAME'),
            'password' => env('MERCHANT_PASSWORD')
        ];

        $firstUrl = env('SHURJOPAY_SERVER_URL') . '/api/get_token';

        $ch = curl_init();
        $url = $firstUrl;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response);
        $token =  $res->token;


        $data = [
            'token' => $token,
            'order_id' => $id,
        ];

        $url = env('SHURJOPAY_SERVER_URL') . '/api/payment-status';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response);

        // return $res;

        try {
            if ($res[0]->sp_massage == "Success") {

                $transaction         = array();
                $transaction['order_id']          = $res[0]->order_id;
                $transaction['bank_tx_id']        = $res[0]->bank_trx_id;
                $transaction['status']            = $res[0]->sp_massage;
                $transaction['bank_status']       = $res[0]->bank_status;
                $transaction['sp_payment_option'] = $res[0]->method;
                $transaction['sp_code']           = $res[0]->sp_code;
                $transaction['sp_code_des']       = $res[0]->sp_massage;

                DB::table('transaction')->where("tx_id", $res[0]->customer_order_id)->update($transaction);
                $participants = DB::table('transaction')->where("tx_id", $res[0]->customer_order_id)->where("status", "Success")->first();

                // return $participants;
                DB::table('participants')->where('id', $participants->user_id)->update(['status' => 1]);
                Session::flash('status', 'success');
                Session::flash('success', 'Your Payment Received Successfully !!');
                return redirect()->route('participant.dashboard');
            } else {
                DB::table('transaction')->where("tx_id", $res[0]->customer_order_id)->delete();
                Session::flash('status', 'danger');
                Session::flash('message', 'Opps! Your Payment has failed !!');

                // Session::flash('message', 'Your Registration Has Been Successfully !!');
                return redirect()->route('signup');
            }
        } catch (\Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }

    public function Payment($id)
    {
        $participant = $id;
        return view('front.home.payment', compact('participant'));
    }

    public function ForgotPassword()
    {
        return view('front.home.forgot_password');
    }

    public function PasswordEmail(Request $request)
    {
        $participant = Participant::where('email', $request->email)->first();
        $data = [];

        // return response()->json($request->all());
        if ($participant) {
            $data = "success";
            $rand = rand(1000, 9999);
            $document = array([
                "email" => $request->email,
                "token" => $rand,
            ]);
            DB::table('password_resets')->insert($document);
            $info = "Your verification code is" . $rand . "Thanks. Stay with us";
            // Mail::raw($info, ['user' => $participant], function ($m) use ($participant) {
            //     $m->from('services@mail.aahcalumni.org', 'Ali Azam School & College');
            //     $m->to($participant->email, $participant->name)->subject('Forgot Password recover')
            //     ->setBody($participant, 'text/html');
            // });
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'rs006.webhostbox.net';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'services@mail.aahcalumni.org';                     //SMTP username
                $mail->Password   = 'aliazam2021';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('services@mail.aahcalumni.org', 'Ali Azam Alumni Association');
                $mail->addAddress($participant->email, $participant->name);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Forgot Password Recover from Aliazam Alumini Association';
                $mail->Body    = 'Your forgotten password verification code is <b>' . $rand . '</b> Thanks Stay with us';

                $mail->send();
                return response()->json($data);
            } catch (Exception $e) {
                return response()->json($mail->ErrorInfo);
            }
        } else {
            $data = "false";
            return response()->json($data);
        }
    }

    public function PasswordCode(Request $request)
    {
        try {
            $data = "";
            $check = DB::table('password_resets')->where('email', $request->email)->where('token', $request->code)->first();
            if ($check) {
                $data = "success";
                return view('front.home.change_password', compact('check'));
            } else {
                $data = "failed";
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }

    public function ChangePassword(Request $request)
    {
        try {
            $participant = Participant::where('email', $request->email)->first();
            if ($participant) {
                $data = array();
                $data['password'] = Hash::make($request->password);
                Participant::where('email', $request->email)->update($data);
                Session::flash('message', 'password recovered successfully');
                $data = "success";
                return response()->json($data);
            } else {
                Session::flash('error', 'something went wrong');
                return false;
            }
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1005]');
            return Redirect::back()->withInput();
        }
    }

    public function PaymentSave(Request $request)
    {
        DB::begintransaction();
        $payment = array();
        $payment['user_id'] = $request->user_id;
        $payment['tx_id'] = $request->tx_id;
        $payment['bank_tx_id'] = $request->bank_tx_id;
        $payment['amount'] = $request->amount;
        $payment['bank_status'] = $request->bank_status;
        $payment['sp_code'] = $request->sp_code;
        $payment['sp_code_des'] = $request->sp_code_des;
        $payment['sp_payment_option'] = $request->sp_payment_option;
        $payment['status'] = $request->status;
        $save = DB::table('transaction')->insert($payment);
        if ($save) {
            \Session::flash('success', 'success');
            return redirect()->back()->with('success', 'Payment Information Send Successfully');
        } else {
            Session::flash('errors', ' something went wrong');
        }
        return redirect()->back();
    }
    public function termsCondition() {
        $terms = Etc::select('terms_conditions')->first();
        return view('front.home.terms_conditions.terms', compact('terms'));
    }
    public function privacyPolicy() {
        $privacy = Etc::select('privacy_policy')->first();
        return view('front.home.privacy_policy.privacy', compact('privacy'));
    }
    public function returnPolicy() {
        $return = Etc::select('return_policy')->first();
        return view('front.home.return_policy.return', compact('return'));
    }

    public function CheckPhoneFront(Request $request) {
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
