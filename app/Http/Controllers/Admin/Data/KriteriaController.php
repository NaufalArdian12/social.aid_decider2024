<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        return view('pages.admin.data.kriteria');
    }
}
