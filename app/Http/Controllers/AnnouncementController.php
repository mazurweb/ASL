<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use App\Announcement;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class AnnouncementController extends Controller
{
    public function getAnnouncements() {

        $announcements = DB::select('select * from announcements order by created_at DESC limit 5');

        $announcements = json_encode($announcements);

        return $announcements;
    }

    public function createAnnouncement() {

        $announcement = new Announcement();

        $validation = Validator::make(Input::all(),

            array(
                'title' => 'required',
                'body'  => 'required'
            )
        );

        $title = Input::get('title');
        $body = Input::get('body');

        if($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
            $announcement->title = $title;
            $announcement->body = $body;
            $announcement->user = Auth::user()->username;
            $announcement->save();

            return Redirect::back()->withMessage('You have successfully added an announcement!');
        }
    }
}
