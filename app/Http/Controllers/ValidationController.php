<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;

class ValidationController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(ProfileFormRequest $request)
    {
        collect(array_filter($request->emails))->each(function ($email) {
            var_dump($email);
        });
        die();
        //
    }
}
