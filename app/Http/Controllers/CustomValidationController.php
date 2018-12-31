<?php

namespace App\Http\Controllers;

use App\Rules\ValidPhone;
use Illuminate\Http\Request;

class CustomValidationController extends Controller
{
    public function index()
    {
        return view('CustomValidation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => ['required', new ValidPhone],
        ]);
        echo 'Valid Phone';
    }
}
