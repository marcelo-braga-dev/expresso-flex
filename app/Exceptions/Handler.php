<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    // Redireciona no erro 500
    protected function prepareResponse($request, Throwable $e){

        if (! $this->isHttpException($e) && config('app.debug')) {
            return $this->toIlluminateResponse($this->convertExceptionToResponse($e), $e);
        }

        if (! $this->isHttpException($e)) {
            session()->flash('erro', 'Ocorreu um erro interno no sistema.');
            return redirect()->route('login');
            // return redirect()-> route('admins.usuarios.clientes.index');
        }
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (\Exception $e) {
            // Redireciona pra login em pagina espirada
            if ($e->getPrevious() instanceof \Illuminate\Session\TokenMismatchException) {
                return redirect()->route('login');
            };
        });
    }
}
