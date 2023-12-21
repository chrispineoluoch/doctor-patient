@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('auth.store') }}" class="authentication-card">
        @csrf

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Log in to your account</h4>
        <div class="mb-4">
            <label for="title" class="mb-2 block text-sm font-medium text-slate-900">Enter your email address</label>
            <input name="email" type="email" id="email" class="input" placeholder="Enter your email address"/>
        </div>
        <div class="mb-4">
            <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Enter your password</label>
            <input name="password" type="password" id="password" class="input" placeholder="Create a password"/>
        </div>
        <div class="mb-8 flex justify-between text-sm font-medium">
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="remember" class="rounded-sm border border-slate-400 h-5">
                <label for="remember" class="align-middle">Remember me</label>
            </div>
            {{-- <div>
                <a href="#" class="text-indigo-600 hover:underline">
                    Forget password?
                </a>
            </div> --}}
        </div>
        
        <div class="flex justify-center">
            <button type="submit" class="btn">Login</button>
        </div>
    </form>
@endsection