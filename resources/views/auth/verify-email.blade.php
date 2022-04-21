<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="{!! asset('frontend/images/throwing-trash.png') !!}">
    <title>SEMANDING</title>

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

</head>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <center><img src="{{ asset('frontend/images/smdwaste.png') }}" width="40%"></center>
            </a>
        </x-slot>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Thanks for signing up!</h1>
                <p class="col-md-8 fs-4">Before getting started, could you verify your email address by clicking on the link we just emailed to you?<br>
                    If you didn\'t receive the email, we will gladly send you another.</p>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="btn btn-primary btn-lg">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <br>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-danger btn-lg">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>

                <!-- <button class="btn btn-primary btn-lg" type="button">Button</button> -->
            </div>
        </div>

        <!-- <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div> -->

    </x-auth-card>
</x-guest-layout>

@include('includes.footer')

</html>