@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container" style="font-family:IRANSansWeb">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" id="registerForm">
                        <div class="card-header text-center">{{ __('ایجاد فیلد اعتبار سنجی') }}</div>

                        <div class="card-body">

                            @if(session('success_message'))
                                <div class="alert alert-success text-right">
                                    {{session('success_message')}}
                                </div>
                            @endif

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="list-group text-right"> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('custom-validation.store') }}"
                                  class="mb-4" aria-label="{{ __('Custom Validation') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('شماره همراه') }}</label>

                                    <div class="col-md-8">
                                        <input id="phone" type="text"
                                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               name="phone" value="{{ old('phone') }}" autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback text-right" role="alert">
                                                 <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('ارسال') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
@endsection
