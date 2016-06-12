<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;
use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserRegController extends Controller
{
    public function getReg(){

        return view('account.userreg');

    }

    public function postReg(){
        $validation = Validator::make(Input::all(),

            array(
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required'
            )
        );
        $username = Input::get('username');
        $password = bcrypt(Input::get('password'));
        $email = Input::get('email');
        $fname = Input::get('fname');
        $lname = Input::get('lname');

        if($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {

            if(Input::get('password') != Input::get('password_confirmation')) {
                return Redirect::back()->withErrors('Your passwords do not match.  Make sure you have entered the same password.');
            }
            else {
                $user_id = DB::table('users')->insertGetId([
                   'email' => $email, 'password' => $password, 'username' => $username, 'fname' => $fname, 'lname' => $lname,
                ]);
                return Redirect::back()->withMessage('The user has been succesfully created!');
            }
        }
    }
}
