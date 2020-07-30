<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

class ModuleController extends Controller
{
    public function list(){
        return view('/list', array('modules'=>Module::all()));
    }
}
