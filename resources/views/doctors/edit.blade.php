@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf
        @method('PUT')

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Edit doctor information</h4>
        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Modify the doctor's first
                name</label>
            <input name="first_name" type="text" class="input" value="{{ old('first_name', $doctor->user->first_name) }}"
                required />
        </div>
        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-medium text-slate-900">Modify the doctor's last
                name</label>
            <input name="last_name" type="text" class="input" value="{{ old('last_name', $doctor->user->last_name) }}"
                required />
        </div>
        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Modify the doctor's email
                address</label>
            <input name="email" type="email" class="input" value="{{ old('email', $doctor->user->email) }}" required />
        </div>
        <div class="mb-4">
            <label for="specialization_id" class="mb-2 block text-sm font-medium text-slate-900">Modify the doctor's
                specialization</label>
            <select name="specialization_id" class="input" required>
                <option value="" disabled selected>Modify the doctor's specialization</option>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}"
                        {{ old('specialization_id', $doctor->specialization_id) == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->specialization }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-12 flex gap-2 justify-center">
            <button type="submit" class="btn">Update Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
