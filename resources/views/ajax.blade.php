@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container" style="font-family:IRANSansWeb">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" id="registerForm">
                        <div class="card-header text-center">{{ __('ثبت نام') }}</div>

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

                            <form method="POST" action="{{ route('ajax.store') }}" id="userForm"
                                  class="mb-4" aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-2 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback text-right" role="alert">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-2 col-form-label text-md-right">{{ __('آدرس ایمیل') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback text-right" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-2 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback text-right" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-2 col-form-label text-md-right">{{ __('تکرار رمز عبور') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('ثبت نام') }}
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
    <script>
        (function () {
            document.querySelector('#userForm').addEventListener('submit', function (e) {
                e.preventDefault()

                // let data = {
                //     'name': document.querySelector('#name').value,
                //     'email': document.querySelector('#email').value,
                //     'password': document.querySelector('#password').value,
                //     'password-confirm': document.querySelector('#password-confirm').value
                // }
                axios.post(this.action, {
                    'name': document.querySelector('#name').value,
                    'email': document.querySelector('#email').value,
                    'password': document.querySelector('#password').value,
                    'password_confirmation': document.querySelector('#password-confirm').value
                }).then((response) => {
                    {{--window.location.href = '{{ route('ajax.index') }}'--}}
                    this.reset()
                    this.insertAdjacentHTML('beforebegin', `<div class="alert alert-success text-right" id="success">ثبت نام شما با موفقیت انجام گردید. </br>ایمیلی جهت تایید و فعال نمودن حساب کاربری برای شما ارسال گردید</div>`)
                    document.getElementById('registerForm').scrollIntoView();
                    setTimeout(function() {
                        $(".alert").slideUp(500, function(){
                            $(this).remove();
                        });
                    }, 4000);
                }).catch((error) => {
                    const errors = error.response.data.errors
                    const firstItem = Object.keys(errors)[0]
                    const firstItemDOM = document.getElementById(firstItem)
                    const firstErrorMessage = errors[firstItem][0]
                    // console.log(errors);

                    // scroll to the error message
                    // firstItemDOM.scrollIntoView({behavior: 'smooth'});
                    firstItemDOM.scrollIntoView()

                    // remove all errors messages
                    const errorMessages = document.querySelectorAll('.text-danger')
                    errorMessages.forEach((element) => element.textContent = '')

                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger text-right">${firstErrorMessage}</div>`)

                    //remove all form controler with highlighted error text box
                    const formControlers = document.querySelectorAll('.form-control')
                    formControlers.forEach((element) => element.classList.remove('border', 'border-danger'))

                    // hithlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger');
                });
            });
        })();
    </script>
@endsection
