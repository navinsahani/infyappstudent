<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller {
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
            
            
        ]); 

        $username = $request->input('email');
        $password  = $request->input('password');
        $deviceId = $request->input('device_id');
        $deviceName = $request->input('device_name');
        $user = User::where('email', $username)->first();
        $data= $request->input('user');
        $request->session()->put('user',$data);

       

        if($user){
            if(!Hash::check($request->password, $user->password)){
                return redirect()->route('login')->with('error', 'Password wrong..');
            }else{
                // this feature avilable for user 
                if($user['user_role'] === 'student'){
                if ($user->devices()->count() >= 2) {
                    // Check if the current device is already registered-----
                    if (!$user->devices()->where('device_id', $deviceId)->exists()) {
                        return redirect()->route('login')->with('error', 'You have reached the maximum number of devices. <a href="' . route('devicechange') . '">Click here</a> to request for a change of device.');

                    }
                } else {
                    // Register the new device
                    if (!$user->devices()->where('device_id', $deviceId)->exists()) {
                        $user->devices()->create(['device_id' => $deviceId, 'device_name' => $deviceName]);

                    }
                }
            }
            auth()->login($user);
            // echo '<pre>';
            // print_r($user['name']);
            // die();
            session()->put('user', $user['name']);
            
            // session()->put('email', $user['email']);
            // $request->session()->put();
            // Session::set('user',  $user['name']);
            // return redirect()->route('/index'); 
            return view('/addstudent'); 

                // $user->devices()->create(['device_id' => $deviceId]); 
            }
        } 
        else{
            return redirect()->route('/addstudent')->with('error', 'Username Does not exit!!.');


        }


    }
}
