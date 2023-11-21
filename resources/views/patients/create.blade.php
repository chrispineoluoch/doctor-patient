@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Create Patient</h4>
        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Patient's First Name</label>
            <input name="first_name" type="text" class="input" placeholder="Enter the patient's first name" required/>
        </div>
        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-medium text-slate-900">Patient's Last Name</label>
            <input name="last_name" type="text" class="input" placeholder="Enter the patient's last name" required/>
        </div>
        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Email Address</label>
            <input name="email" type="email" class="input" placeholder="Enter the patient's email address" required/>
        </div>
        <div class="mb-4">
            <label for="phone" class="mb-2 block text-sm font-medium text-slate-900">Phone</label>
            <input name="phone" type="text" class="input" placeholder="Enter the patient's phone number"/>
        </div>
        <div class="mb-4">
            <label for="dob" class="mb-2 block text-sm font-medium text-slate-900">Date of Birth</label>
            <input name="dob" type="date" class="input" placeholder="Enter the patient's date of birth"/>
        </div>
        <div class="mb-4">
            <label for="address" class="mb-2 block text-sm font-medium text-slate-900">Address</label>
            <input name="address" type="text" class="input" placeholder="Enter the patient's address"/>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="btn">Create Patient</button>
        </div>
    </form>
@endsection
