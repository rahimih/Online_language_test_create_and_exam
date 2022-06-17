<?php

namespace App\Http\Controllers;

use App\ot_institute_name;
use App\ot_introduce_code;
use App\ot_send_sms;
use App\ot_users_kind;
use App\User;
//use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

//use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ot_users = User::leftjoin('ot_institute_names','ot_users.Anestutude_Id','=','ot_institute_names.id')->
        leftjoin('ot_users_kinds','ot_users.kindusers','=','ot_users_kinds.KINDUSER_ID')->get();
//        where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Users.UsersManagment', compact('ot_users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $OpenForm
     */
    public function create()
    {
        $OpenForm=1;
        $ot_institute_names = ot_institute_name:: where('status','=' ,'1')->get();
        $ot_users_kinds = ot_users_kind::where('status','=' ,'1')->get();
        return view('Admin.Users.UsersProfile',compact('OpenForm','ot_institute_names','ot_users_kinds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kinduser=$request->get('kindusers');
        $fn= $request->get('fname');
        $ln= $request->get('lname');
        $mobile=$request->get('Mobile');
        //
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:ot_users'],
            'Mobile' => ['required', 'string', 'digits:11', 'unique:ot_users' ],
        ]);

        $ot_users = new User();
        $ot_users->fname=$request->get('fname');
        $ot_users->lname=$request->get('lname');
        $ot_users->mobile =$request->get('Mobile');
        $ot_users->age =$request->get('age');
        $ot_users->email=$request->get('email');
        $ot_users->password= Hash::make($request->get('password'));
        $ot_users->Anestutude_Id=$request->get('Anestutude_Id');
        $ot_users->kindusers=$request->get('kindusers');
        $ot_users->save();
        $ins_id =$ot_users->id;
        //--------------------
        if ($kinduser==2)
        {
            //-----------------send sms
            require_once('nusoap.php');

            $client = new \nusoap_client('http://mihansmscenter.com/webservice/?wsdl', 'wsdl');
            $client->decodeUTF8(false);

            //send a message to a number
            $res = $client->call('send', array(
                'username'	=> config('app.S_userName'),
                'password'	=> config('app.S_userPassword'),
                'to'		=> $mobile,
                'from'		=> config('app.S_sms_number'),
                'message'	=> "Dear " . $fn. " " .$ln  . PHP_EOL  . "از اینکه سایت L-TESTS را برای انجام آزمون های آزمایشی زبان انتخاب کردید ممنونیم." ,
                'send_time'	=> 'null'
            ));

                        $ot_send_sms = new ot_send_sms();
                        $ot_send_sms->USER_ID=$ins_id;
                        $ot_send_sms->RECEPTOR=$mobile;
                        $ot_send_sms->TEXT= "Dear " . $fn. " " .$ln  . PHP_EOL  . "از اینکه سایت L-TESTS را برای انجام آزمون های آزمایشی زبان انتخاب کردید ممنونیم." ;
                        $ot_send_sms->RESULT=$res['status'];
                        $ot_send_sms->IDENTIFIER=$res['identifier'];
                        $ot_send_sms->SENT_DATE=date("Y-m-d");
                        $ot_send_sms->SENT_TIME=date("h:i:s");
                        $ot_send_sms->save();

            return back()->withStatus(__('User successfully Created'));
        }

        if ($kinduser==4)
        {
            $code=mt_rand(1001,9999);
            $text =substr($fn,0,1);
            $text =$text.substr($ln,0,1);
            $coder = $text.$code;

            $ot_introduce_codes = new ot_introduce_code();
            $ot_introduce_codes->INTRODUCE_CODE = $coder;
            $ot_introduce_codes->INTRODUCE_CODE_KIND = 1;
            $ot_introduce_codes->INSTRUCTURES_ID = $ins_id;
            $ot_introduce_codes->save();
            //-----------------send sms
            require_once('nusoap.php');

            $client = new \nusoap_client('http://mihansmscenter.com/webservice/?wsdl', 'wsdl');
            $client->decodeUTF8(false);

            //send a message to a number
            $res = $client->call('send', array(
                'username'	=> config('app.S_userName'),
                'password'	=> config('app.S_userPassword'),
                'to'		=> $mobile,
                'from'		=> config('app.S_sms_number'),
                'message'	=> "Dear " . $fn. " ".$ln .PHP_EOL ." ثبت نام شما در سایت L-Tests با موفقیت انجام شد." .PHP_EOL. "کد معرف شما" . $coder . "می باشد" ,
                'send_time'	=> 'null'
            ));

            $ot_send_sms = new ot_send_sms();
            $ot_send_sms->USER_ID=$ins_id;
            $ot_send_sms->RECEPTOR=$mobile;
            $ot_send_sms->TEXT= "Dear " . $fn. " ".$ln .PHP_EOL ." ثبت نام شما در سایت L-Tests با موفقیت انجام شد." .PHP_EOL. "کد معرف شما" . $coder . "می باشد" ;
            $ot_send_sms->RESULT=$res['status'];
            $ot_send_sms->IDENTIFIER=$res['identifier'];
            $ot_send_sms->SENT_DATE=date("Y-m-d");
            $ot_send_sms->SENT_TIME=date("h:i:s");
            $ot_send_sms->save();

            return back()->withStatus(__('User successfully Created with introduce code: ' .$coder));
        }
       else
       {
           return back()->withStatus(__('User successfully Created.'));
       }

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
    //     * @param  \App\ot_questions_type  $ot_questions_type
     * @param  int  $OpenForm
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OpenForm=2;
        $Users = User::find($id);
        $ot_institute_names = ot_institute_name:: where('status','=' ,'1')->get();
        $ot_users_kinds = ot_users_kind::where('status','=' ,'1')->get();
        return view('Admin.Users.UsersProfile',compact('Users','id'),compact('OpenForm','ot_institute_names','ot_users_kinds'));
    }

    /**
     * Update the specified resource in storage.
     *
    //  * @param  \App\ot_questions_type  $ot_questions_type
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
        ]);

        $ot_users = User::find($id);
        $ot_users->fname=$request->get('fname');
        $ot_users->lname=$request->get('lname');
        $ot_users->mobile =$request->get('Mobile');
        $ot_users->email=$request->get('email');
//        $ot_users->password= Hash::make($request->get('password'));
        $ot_users->Anestutude_Id=$request->get('Anestutude_Id');
        $ot_users->kindusers=$request->get('kindusers');
        $ot_users->save();
        return back()->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
    //     * @param  \App\ot_questions_type  $ot_questions_type
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
        $ot_users = User::destroy($id);
    }

    /**
     * Change the password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    //     * @return \Illuminate\Http\RedirectResponse
     * @return \Illuminate\Http\Response
     */
    public function Passwords(Request $request,$id)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $ot_users = User::find($id);
        $ot_users->password= Hash::make($request->get('password'));
        $ot_users->save();
        return back()->withStatusPassword(__('Password successfully updated.'));
    }

}
