<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\FrontContact;
use Illuminate\Http\Request;

class ShowContactController extends Controller
{
    public function index()
    {
        $result['data']=FrontContact::all();
        return view('admin/showcontact',$result);
    }
}
