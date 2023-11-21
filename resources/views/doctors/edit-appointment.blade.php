@extends('layouts.app')

@section('content')
    <h4 class="block text-2xl font-semibold text-slate-900 mb-4">Edit Appointment for <span>{{ $appointment->patient->getFullNameAttribute() }}</span> with Dr. {{ $doctor->getFullNameAttribute() }}</h4>

    <form method="POST" action="{{ route('doctors.update-appointment', ['doctorId' => $doctor->id, 'appointmentId' => $appointment->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="appointment_datetime" class="block text-sm font-medium text-gray-700">Appointment Date and Time</label>
            <input type="datetime-local" name="appointment_datetime" id="appointment_datetime" value="{{ old('appointment_datetime', $appointment->appointment_datetime) }}" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn">Update Appointment</button>
            <a href="{{ route('doctors.appointments', ['id' => $doctor->id]) }}" class="btn">Back to Appointments</a>
        </div>
    </form>
@endsection
