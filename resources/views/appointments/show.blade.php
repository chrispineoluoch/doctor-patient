@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Appointment Details</h4>
    </div>

    <div class="mb-4">
        <p><strong>Doctor:</strong> {{ $appointment->doctor->user->first_name }} {{ $appointment->doctor->user->last_name }}</p>
        <p><strong>Patient:</strong> {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</p>
        <p><strong>Specialization:</strong> {{ $appointment->specialization->specialization }}</p>
        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
        <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>
    </div>

    <div class="flex justify-center">
        <a href="{{ route('appointments.index') }}" class="btn">Back to Appointments</a>
    </div>
@endsection
