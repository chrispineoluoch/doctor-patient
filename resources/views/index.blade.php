@extends('layouts.app')

@section('content')
    <h4 class="mb-4 block text-2xl font-semibold text-slate-900 text-center">Welcome to the Doctor & Patient Appointment
        Management System</h4>
    <h4 class="mb-4 block text-xl font-normal text-slate-900 text-center">"Embrace each day as a step towards your brighter
        tomorrow"</h4>

    <div class="mt-10 flex gap-2">
        @auth
        @if (Auth::user()->role === 'doctor')
        <div class="cards w-80 mx-auto">
            <h4 class="mb-4 block text-base font-semibold text-slate-900 text-center">Appointment Module</h4>
            <h4 class="mb-4 block text-base font-normal text-slate-900 text-center">Access the doctor module</h4>
            <a href="{{ route('doctors.appointments', ['id' => Auth::id()]) }}" type="button" class="btn h-10">Access</a>
        </div>
        @elseif (Auth::user()->role === 'receptionist')
        <div class="cards w-80 mx-auto">
            <h4 class="mb-4 block text-base font-semibold text-slate-900 text-center">Doctor Module</h4>
            <h4 class="mb-4 block text-base font-normal text-slate-900 text-center">Access the doctor module</h4>
            <a href="{{ route('doctors.index') }}" type="button" class="btn h-10">Access</a>
        </div>
        <div class="cards w-80 mx-auto">
            <h4 class="mb-4 block text-base font-semibold text-slate-900 text-center">Patient Module</h4>
            <h4 class="mb-4 block text-base font-normal text-slate-900 text-center">Access the patient module</h4>
            <a href="{{ route('patients.index') }}" type="button" class="btn h-10">Access</a>
        </div>
        <div class="cards w-80 mx-auto">
            <h4 class="mb-4 block text-base font-semibold text-slate-900 text-center">Appointment Module</h4>
            <h4 class="mb-4 block text-base font-normal text-slate-900 text-center">Access the appointment module</h4>
            <a href="{{ route('appointments.index') }}" type="button" class="btn h-10">Access</a>
        </div>
        <div class="cards w-80 mx-auto">
            <h4 class="mb-4 block text-base font-semibold text-slate-900 text-center">Appointment Dashboard</h4>
            <h4 class="mb-4 block text-base font-normal text-slate-900 text-center">Access the appointment dashboard</h4>
            <a href="{{ route('dashboard.index') }}" type="button" class="btn h-10">Access</a>
        </div>
        @endif
        @endauth
    </div>
@endsection
