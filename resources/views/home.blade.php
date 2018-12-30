@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: IRANSansWeb;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">Share</div>
                            <div class="card-body">
                                <form action="{{ route('validation.store') }}" method="post">
                                    {{ csrf_field() }}
                                    @foreach(range(0,4) as $x)
                                        <div class="form-group">
                                            <label for="email-{{ $x }}" class="control-label float-right">Email
                                                #{{ $x }}</label>
                                            <input type="text" name="emails[]" id="email-{{ $x }}" class="form-control {{ $errors->has('emails.' . $x ) ? 'has-error' : '' }}"
                                                   value="{{ old('emails.' . $x ) }}">

                                            @if($errors->has('emails.' . $x ))
                                                <span class="has-error-color mt-3 mb-3" >
                                                    {{ $errors->first('emails.' . $x ) }}
                                                </span>
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
