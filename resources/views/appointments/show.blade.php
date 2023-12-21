@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Appointment Details</h4>

        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Doctor's name</label>
            <p class="input">{{ $appointment->doctor->user->first_name }} {{ $appointment->doctor->user->last_name }}</p>
        </div>

        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-medium text-slate-900">Patient's name</label>
            <p class="input">{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</p>
        </div>

        <div class="mb-4">
            <label for="specialization_id" class="mb-2 block text-sm font-medium text-slate-900">Doctor's specialization</label>
            <p class="input">{{ $appointment->doctor->specialization->specialization }}</p>
        </div>

        <div class="mb-4">
            <label for="appointment_datetime" class="mb-2 block text-sm font-medium text-slate-900">Appointment Date and Time</label>
            <p class="input">{{ $appointment->appointment_datetime }}</p>
        </div>

        <div class="mb-4">
            <label for="description" class="mb-2 block text-sm font-medium text-slate-900">Appointment Description</label>
            <textarea name="description" class="input" rows="5" style="height: 100px">{{ $appointment->description }}</textarea>
        </div>
        
    </div>

    <div class="mt-12 flex gap-2 justify-center">
        <a href="{{ route('appointments.index') }}" class="btn">Cancel</a>
    </div>
@endsection
