@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
        @csrf
        @method('PUT')

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Edit Patient Information</h4>
        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Modify the patient's first name</label>
            <input name="first_name" type="text" class="input" value="{{ old('first_name', $patient->first_name) }}" required />
        </div>
        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-medium text-slate-900">Modify the patient's last name</label>
            <input name="last_name" type="text" class="input" value="{{ old('last_name', $patient->last_name) }}" required />
        </div>
        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Modify the patient's email address</label>
            <input name="email" type="email" class="input" value="{{ old('email', $patient->email) }}" required />
        </div>
        <div class="mb-4">
            <label for="phone" class="mb-2 block text-sm font-medium text-slate-900">Modify the patient's phone number</label>
            <input name="phone" type="text" class="input" value="{{ old('phone', $patient->phone) }}" />
        </div>
        <div class="mb-4">
            <label for="dob" class="mb-2 block text-sm font-medium text-slate-900">Modify the patient's date of birth</label>
            <input name="dob" type="date" class="input" value="{{ old('dob', $patient->dob) }}" />
        </div>
        <div class="mb-4">
            <label for="address" class="mb-2 block text-sm font-medium text-slate-900">Modify the patient's address</label>
            <input name="address" type="text" class="input" value="{{ old('address', $patient->address) }}" />
        </div>

        <div class="mt-12 flex gap-2 justify-center">
            <button type="submit" class="btn">Update Patient</button>
            <a href="{{ route('patients.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
