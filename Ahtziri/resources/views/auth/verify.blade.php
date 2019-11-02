@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Hemos enviado un link de verificacion a tu correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor revisa tu e-mail para el link de verificación.') }}
                    {{ __('Si no recibes el correo') }}, <a href="{{ route('verification.resend') }}">{{ __('click aquí para solicitar otro.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
