<x-layout class="bg-secundario">
    <div class="container mt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h3>Insira sua nova senha.</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('mail.usuario.senha.salvar-nova-senha') }}">
                            @csrf @method('put')

                            @if (session('invalido'))
                                <div class="alert alert-danger">
                                    {{ session('invalido') }}
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Email') }}" type="email" name="email"
                                           value="{{ $email }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ session('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ session('password') ? ' is-invalid' : '' }}"
                                           placeholder="Nova Senha" type="password" name="password" minlength="6"
                                           required>
                                </div>
                                @if (session('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ session('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Confirmar Nova Senha" type="password"
                                           name="password_confirmation" minlength="6" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="hash" value="{{ $hash }}">
                                <button type="submit" class="btn btn-primary mt-4">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
