@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900 text-center">Doctor Information</h4>

        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Doctor's first name</label>
            <p class="input">{{ $doctor->user->first_name }}</p>
        </div>

        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-medium text-slate-900">Doctor's last name</label>
            <p class="input">{{ $doctor->user->last_name }}</p>
        </div>

        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Doctor's email address</label>
            <p class="input">{{ $doctor->user->email }}</p>
        </div>

        <div class="mb-4">
            <label for="specialization_id" class="mb-2 block text-sm font-medium text-slate-900">Doctor's specialization</label>
            <p class="input">{{ $doctor->specialization->specialization }}</p>
        </div>
        <div class="mt-12 flex gap-2 justify-center">
            <a href="{{ route('doctors.index') }}" class="btn">Cancel</a>
        </div>
    </div>
@endsection
<p></p>