<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departments;
use DB;
use Input;
use Config;
use Validator;
use PDO;
use Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getEditUser($id, Request $request)
    {
        $request->session()->forget('user_id');
        $user = User::find($id);

        $request->session()->push('user_id', $id);

        return view('user.edit', array(
            'user' => $user
        ));
    }

    public function editUser(Request $request)
    {
        $user_id = $request->session()->pull('user_id');

        $fname = Input::get('fname');
        $lname = Input::get('lname');
        $username = Input::get('username');
        $email = Input::get('email');
        $password = Input::get('password');


        $validation = Validator::make(Input::all(),

            array(
                'fname' => 'required',
                'lname' => 'required',
                'username' => 'required',
                'email' => 'required'

            )
        );

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        elseif(Input::has('password'))
        {
            DB::table('users')->where('id', '=', $user_id[0])->update(array(
                'fname' => $fname,
                'lname' => $lname,
                'username' => $username,
                'email' => $email,
                'password' => bcrypt($password)
            ));
        }
        else
        {
            DB::table('users')->where('id', '=', $user_id[0])->update(array(
                'fname' => $fname,
                'lname' => $lname,
                'username' => $username,
                'email' => $email,
            ));
        }

        return Redirect::back()->withMessage('You have successfully updated the user\'s info.');
    }
}
