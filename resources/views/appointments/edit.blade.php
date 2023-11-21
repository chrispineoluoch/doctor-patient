@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Edit Appointment</h4>
    </div>

    <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="patient_id" class="mb-2 block text-sm font-medium text-slate-900">Select Patient</label>
            <select name="patient_id" class="input" required>
                <option value="" disabled>Select Patient</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->first_name }} {{ $patient->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="specialization_id" class="mb-2 block text-sm font-medium text-slate-900">Select Specialization</label>
            <select name="specialization_id" class="input" required>
                <option value="" disabled>Select Specialization</option>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}" {{ $appointment->specialization_id == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->specialization }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="doctor_id" class="mb-2 block text-sm font-medium text-slate-900">Select Doctor</label>
            <select name="doctor_id" class="input" required>
                <option value="" disabled>Select Doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="appointment_datetime" class="mb-2 block text-sm font-medium text-slate-900">Appointment Date</label>
            <input name="appointment_datetime" type="datetime-local" class="input" value="{{ $appointment->appointment_datetime }}" required />
        </div>

        <div class="mb-4">
            <label for="description" class="mb-2 block text-sm font-medium text-slate-900">Appointment description</label>
            <textarea name="description" class="input" rows="5" style="height: 100px">{{ $appointment->description }}</textarea>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="btn">Update Appointment</button>
        </div>
    </form>
@endsection
