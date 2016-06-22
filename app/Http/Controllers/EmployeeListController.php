<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use DB;

class EmployeeListController extends Controller
{
    public function getList()
    {
        $employee = DB::select('select id, username, fname, lname, email from users');

        return json_encode($employee);

    }
}
