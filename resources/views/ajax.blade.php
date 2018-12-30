@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container" style="font-family:IRANSansWeb">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur corporis
                            deleniti
                            dolores fugiat harum impedit inventore ipsam iusto laudantium maxime modi molestiae
                            molestias
                            mollitia nam, nihil, nisi nobis nulla odit officiis optio perspiciatis porro praesentium
                            quae
                            quas repellat rerum sequi similique sunt voluptas? Assumenda eligendi incidunt ipsum.
                            Accusantium assumenda consequuntur error exercitationem id illo in laboriosam molestias
                            quaerat
                            sequi! Aut fugiat iure odit quos reprehenderit sequi veritatis? Assumenda autem cupiditate
                            dolorum fugiat minus molestiae natus, nemo nostrum nulla obcaecati pariatur rem sapiente,
                            sunt!
                            Accusantium ad amet aut cum eligendi, eum, eveniet harum hic id impedit, minus modi
                            molestias
                            natus nostrum officiis qui quisquam quod quos recusandae sapiente soluta suscipit velit
                            veniam
                            voluptas voluptatibus? Cupiditate ea error esse, est et hic illum ipsum magni, molestias
                            nihil
                            nulla qui, quo sint tempora voluptate. Aliquam aperiam architecto autem consectetur
                            consequatur,
                            consequuntur cumque cupiditate dolor dolore ducimus eius eligendi ex facilis hic in incidunt
                            ipsum itaque iure laudantium minima nesciunt nostrum nulla, odit praesentium quam quas
                            quibusdam
                            repellat repellendus reprehenderit rerum saepe veritatis voluptatem voluptatum. Aliquam
                            architecto at cum, earum minima numquam omnis, quasi saepe sed tempora unde vero voluptatem.
                            Corporis earum esse mollitia nemo pariatur reiciendis reprehenderit sit ullam. Aliquam amet
                            architecto asperiores autem beatae consequatur corporis culpa cumque dignissimos fuga hic,
                            laborum magnam nobis numquam optio perspiciatis porro possimus, quae sapiente sint, ut velit
                            vero? Animi at dolorem, ducimus facere harum inventore iure libero, molestiae obcaecati
                            provident quam reiciendis rem soluta sunt tenetur veritatis vitae. Aliquid animi culpa,
                            cumque
                            deleniti eum eveniet excepturi ipsa itaque labore, nihil quas repellat saepe sint vel vitae?
                            Accusantium commodi consequuntur dignissimos dolorum eum excepturi in, iusto molestiae,
                            nesciunt
                            perspiciatis quo repellat velit vero! Cum eius est libero placeat ratione! A ab aliquid amet
                            assumenda at cupiditate eligendi eos eveniet ipsa, laborum magnam minima natus
                            necessitatibus
                            nihil obcaecati optio placeat quas quasi repellendus rerum sapiente sequi sunt tempore
                            veniam
                            vero! Beatae, cupiditate error est iure modi placeat qui repellat. Aperiam aspernatur
                            blanditiis
                            dolore dolores ducimus enim fugiat in, molestias, nobis odit officiis optio placeat,
                            possimus
                            quas quos sapiente vel veritatis voluptatibus. A accusantium ad alias aperiam, beatae
                            blanditiis
                            dolorem, eligendi enim esse eum, fugiat fugit inventore ipsa laboriosam natus neque non
                            officiis
                            reiciendis repellat reprehenderit repudiandae ut voluptates? Asperiores aspernatur autem
                            distinctio dolorem, enim impedit ipsa nemo, officia, perferendis porro quam quis?
                            Consequuntur
                            dolorem eius eum id nam nobis tenetur vitae! Ab aspernatur dignissimos eligendi fugiat
                            inventore
                            nihil possimus quibusdam quidem ratione, sapiente. Deleniti eos ex magnam temporibus totam.
                            Accusamus commodi laboriosam repellat veniam veritatis? Aliquid consectetur debitis delectus
                            error facilis fugiat omnis perferendis, possimus, quae quaerat quia quos sapiente sequi,
                            velit
                            veniam. Aut blanditiis consequatur debitis distinctio ducimus et facilis fugit illum iusto
                            molestias necessitatibus officiis pariatur quidem quis quo rem tempora, velit! Aperiam
                            blanditiis cupiditate distinctio ducimus et expedita facilis perspiciatis qui ratione, sequi
                            sunt tempora voluptatibus. Architecto at ea ipsa minima nam neque nobis pariatur possimus
                            quidem, vel? Doloremque doloribus ducimus eaque esse, fugit harum ipsam maiores mollitia
                            nisi
                            quae, vitae voluptate voluptatum.
                        </div>

                        <div class="card-header">{{ __('ثبت نام') }}</div>

                        <div class="card-body">

                            @if(session('success_message'))
                                <div class="alert alert-success">
                                    {{session('success_message')}}
                                </div>
                            @endif

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('ajax.store') }}" id="userForm"
                                  aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-2 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
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
                                               name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
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
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
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
                                               name="password_confirmation" required>
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
