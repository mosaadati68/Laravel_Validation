<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
//        session()->flash('success_message', 'ثبت نام شما با موفقیت انجام گردید.');
        return response()->json(['success' => true]);
    }
}
