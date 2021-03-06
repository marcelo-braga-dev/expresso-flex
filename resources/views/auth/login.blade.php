<x-layout class="bg-secundario">
    <div class="container mt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body pb-1 rounded">
                        <div class="row justify-content-center mx-auto mb-3">
                            <img src="/assets/img/brand/logo-x256.png" width="50%"/>
                        </div>
                        @if (env('APP_ENV') == 'local')
                            DESENVOLVEDOR<br>
                            cliente1@email.com<br>
                            entregador1@email.com<br>
                            conferente1@email.com<br>
                            admin1@email.com
                        @endif
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            @include('layouts.componentes.alerts')
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="E-mail" type="email" name="email"
                                           value="@if (!empty($_COOKIE['ef_e'])){{ base64_decode($_COOKIE['ef_e']) }}@endif"
                                           required autofocus>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" placeholder="Senha" type="password"
                                           value="@if (!empty($_COOKIE['ef_s'])){{ base64_decode($_COOKIE['ef_s']) }}@endif"
                                           required autofocus>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin"
                                       type="checkbox"
                                       checked>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">Lembrar dados de acesso.</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>Recuperar senha</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="https://play.google.com/store/apps/details?id=com.expressoflexapp">
                            <img src="/assets/img/theme/playstore.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
