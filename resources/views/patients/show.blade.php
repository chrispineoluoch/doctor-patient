@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900 text-center">Patient Information</h4>
        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Patient's first name</label>
            <p class="input">{{ $patient->first_name }}</p>
        </div>
        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-medium text-slate-900">Patient's last name</label>
            <p class="input">{{ $patient->last_name }}</p>
        </div>
        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Patient's email address</label>
            <p class="input">{{ $patient->email }}</p>
        </div>
        <div class="mb-4">
            <label for="phone" class="mb-2 block text-sm font-medium text-slate-900">Patient's email address</label>
            <p class="input">{{ $patient->phone }}</p>
        </div>
        <div class="mb-4">
            <label for="dob" class="mb-2 block text-sm font-medium text-slate-900">Patient's email address</label>
            <p class="input">{{ $patient->dob }}</p>
        </div>
        <div class="mb-4">
            <label for="address" class="mb-2 block text-sm font-medium text-slate-900">Patient's email address</label>
            <p class="input">{{ $patient->address }}</p>
        </div>
    </div>
@endsection
<p></p>