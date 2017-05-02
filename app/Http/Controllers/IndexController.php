<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Mail;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function sendMail($data){


    }

    public function store(Request $request){

        if($request->isMethod('post')) {

            //request validation
            $rules = [
                'name' => 'required|string|max:150|letters_only',
                'surname' => 'required|string|max:150|letters_only',
                'email' => 'required|email|max:100',
                'price' => 'required|numeric'
            ];

            $this->validate($request, $rules);

            //store data to DB
            $order = new Order;
            $order->name = $request->name;
            $order->surname = $request->surname;
            $order->email = $request->email;
            $order->price = $request->price;

            $order->save();

            //send email
            $request_data = array();
            $request_data['name'] = $request->name;
            $request_data['surname'] = $request->surname;
            $request_data['email'] = $request->email;
            $request_data['price'] = $request->price;

            //$this->sendMail($request_data);

            $user_email =  $request->email;

            Mail::send('emails.to_user', $request_data, function ($message) use($user_email)
            {
                $message->from(config('settings.app_mail'), config('settings.mail_from'));
                $message->to($user_email)->subject(config('settings.user_topic'));
            });

            Mail::send('emails.to_admin', $request_data, function ($message)
            {
                $message->from(config('settings.app_mail'), config('settings.mail_from'));
                $message->to(config('settings.admin_mail'))->subject(config('settings.admin_topic'));;
            });

        }
        return ['message' => 'Saved!'];
    }
}
