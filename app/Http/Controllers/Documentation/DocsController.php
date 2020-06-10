<?php

namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    public function index (?string $locale)
    {
        return view('documentation.index', compact('locale'));
    }
}
