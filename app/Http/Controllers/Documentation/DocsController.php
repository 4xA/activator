<?php

namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    public function index ()
    {
        return view('documentation.index');
    }
}
