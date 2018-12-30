<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax');
    }

    public function store(UserRequest $request)
    {
        return $this->validate($request);
        User::create($request->all());
        return back()->with('success_message', 'ثبت نام شما با موفقیت انجام گردید.');
    }
}
