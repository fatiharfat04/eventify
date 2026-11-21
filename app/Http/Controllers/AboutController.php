<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $appName = 'Eventify';
        $description = 'Aplikasi Manajemen Event';
        $author = 'frostbitfawn';

        return view('about.index', compact(
            'appName',
            'description',
            'author'
        ));
    }
}
