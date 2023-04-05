@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите Ваш Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка с подтверждением была отправлена на Ваш Email.') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пожалуйста, проверьте Ваш Email на наличие ссылки с подтверждением аккаунта.') }}
                    {{ __('Если вы не получили Email-сообщение, то') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда, чтобы получить ещё одну') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
