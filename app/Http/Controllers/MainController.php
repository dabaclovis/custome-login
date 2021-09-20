<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('clovis.login');
    }
    public function register()
    {
        return view('clovis.register');
    }
    public function save(Request $request)
    {
        // return $request->input();

        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'email' =>'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);
        $user = new Admin();
        $user->fname = Str::of($request->input('fname'))->ucfirst();
        $user->lname = Str::of($request->input('lname'))->ucfirst();
        $user->email = Str::of($request->input('email'));
        // $user->password = bcrypt($request->input('password'));
        $user->password = Hash::make($request->input('password'));
        $save = $user->save();

        if ($save) {
           return back()->with('success','New user created successfully');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }
    public function check(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $userInfo = Admin::where('email','=',$request->email)->first();
        if( !$userInfo ) {
            //check email
           return back()->with('fail','Your email was not recognize');
        }else{
            //check password
            if (Hash::check($request->password, $userInfo->password)) {

                $request->session()->put('loggedUser',$userInfo->id);

                return redirect()->route('admin.dashboard');
            }else{
                return back()->with('fail','incorrect password');
            }
        }


    }
    public function index()
    {
        $data = ['loggedUserInfo' => Admin::where('id','=',session('loggedUser'))->first()];
        return view('admin.index',$data);
    }
    public function logout()
    {
        if(session()->has('loggedUser')) {
         session()->pull('loggedUser');
         return redirect('/clovis/login');
        }
    }


}
