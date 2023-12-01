@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('doctors.store') }}">
        @csrf

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Create a doctor</h4>
        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Enter the doctor's first name</label>
            <input name="first_name" type="text" class="input" placeholder="Enter the doctor's first name" required/>
        </div>
        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-medium text-slate-900">Enter the doctor's last name</label>
            <input name="last_name" type="text" class="input" placeholder="Enter the doctor's last name" required/>
        </div>
        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Enter the doctor's email address</label>
            <input name="email" type="email" class="input" placeholder="Enter the doctor's email address" required/>
        </div>
        <div class="mb-4">
            <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Enter the doctor's account password</label>
            <input name="password" type="password" class="input" placeholder="Enter the doctor's account password" required/>
        </div>

        <div class="mb-4">
            <label for="specialization_id" class="mb-2 block text-sm font-medium text-slate-900">Enter the doctor's specialization</label>
            <select name="specialization_id" class="input" required>
                <option value="" disabled selected>Select the doctor's specialization</option>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}">{{ $specialization->specialization }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-12 flex gap-2 justify-center">
            <button type="submit" class="btn">Create Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
