<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index() {
//        $data=Employee::select('id','created_at')->get()->groupBy(function ($data) {
//            return Carbon::parse($data->created_at)->format('M');
//        });

//        $months = [];
//        $monthCnt = [];
//        foreach ($data as $month => $values){
//            $months[]=$month;
//            $monthCnt[]=count($values);
//        }
//        Auth::user()->name;
        return view('index');
    }

    public function login() {
        return view('login');
    }

    public function to_login(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request->username,'password'=>$request->password])){
            return redirect('admin');
        }
        else{
            return redirect('admin/login')->with('message','Invalid username or password');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect('admin/login');
    }

//    public function dashboard(){
//        Mail::to('tatsam.gautam@sifal.deerwalk.edu.np')->send(new ContactMail('Tatsam'));
//        $data = [
//            'name' => 'Pranjal',
//            'age' => 18
//        ];
//        return view('dashboard')->with($data);
//    }

//    public function register(){
//        $user=new User();
//        $user->email='admin';
//        $user->name='admin';
//        $user->password=Hash::make('admin');
//        $user->save();
//    }


}
