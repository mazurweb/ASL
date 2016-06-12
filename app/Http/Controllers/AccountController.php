<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Password;
use Hashing;
use Hash;
use Validator;
use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccount()
    {
        return view('account.settings');
    }

    public function updateInfo()
    {
        $user = Auth::user();

        if($user->fname === Input::get('fname') && $user->lname === Input::get('lname'))
        {
            return Redirect::back()->withErrors('Your Information hasn\'t changed. Please enter new information if you want to change anything.');
        } else {
            $user->fname = Input::get('fname');
            $user->lname = Input::get('lname');

            $user->save();

            return Redirect::back()->withMessage('You have Successfully Updated Your Information!');
        }

    }

    public function updateEmail()
    {

        $user = Auth::user();
        $validation = Validator::make(Input::all(),

            array(
                'email' => 'required|email',
            )
        );

        if($validation->fails()) {

            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {

            if($user->email === Input::get('email'))
            {
                return Redirect::back()->withErrors('Your email hasn\'t changed.  Please enter a new email.');
            }
            $user->email = Input::get('email');
            $user->save();
            return Redirect::back()->withMessage('Your Email has been changed');
        }

    }

    public function changePassword()
    {
        $user = Auth::user();
        $inputPW = Input::get('password');
        $validation = Validator::make(Input::all(),

            array(
                'password' => 'required',
                'password_confirmation' => 'required'
            )
        );


        if($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {

            if(Hash::check($inputPW, bcrypt($inputPW)) && Hash::check($inputPW, $user->password))
            {
                return Redirect::back()->withErrors('Your password is the same as your current password.  Please enter a different password.');
            }
            elseif(Input::get('password') != Input::get('password_confirmation')) {
                return Redirect::back()->withErrors('Your passwords do not match.  Make sure you have entered the same password.');
            }
            else {
                $user->password = bcrypt(Input::get('password'));
                $user->save();
                return Redirect::back()->withMessage('Your Password has been changed');
            }
        }
    }
}
