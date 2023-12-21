@extends('layouts.app')

@section('content')
    <h4 class="mb-4 block text-2xl font-semibold text-slate-900 text-center">Welcome to the Doctor & Patient Appointment
        Management System</h4>
    <h4 class="mb-4 block text-xl font-normal text-slate-900 text-center">"Embrace each day as a step towards your brighter
        tomorrow"</h4>

    <div class="mt-10">
        @auth
            @if (Auth::user()->role === 'doctor')
                <div class="col">
                    <div class="row flex space-x-2 mx-auto justify-center">
                        <div class="cards w-72 mb-4 j">
                            <div class="flex justify-between">
                                <h4 class="mb-4 block text-base font-semibold text-slate-900 text-left">Appointment Module</h4>
                                <a href="{{ route('doctors.appointments', ['id' => Auth::id()]) }}" type="button"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <h4 class="mb-4 block text-base font-normal text-slate-900 text-left">Access the appointment module to access your appointments</h4>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role === 'receptionist')
                <div class="col">
                    <div class="row flex space-x-2 mx-auto">
                        <div class="cards w-72 mb-4">
                            <div class="flex justify-between">
                                <h4 class="mb-4 block text-base font-semibold text-slate-900 text-left">Doctor Module</h4>
                                <a href="{{ route('doctors.index') }}" type="button"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <h4 class="mb-4 block text-base font-normal text-slate-900 text-left">Access the doctor module to create, edit or delete doctors from the system</h4>
                        </div>
                        <div class="cards w-72 mb-4">
                            <div class="flex justify-between">
                                <h4 class="mb-4 block text-base font-semibold text-slate-900 text-left">Patient Module</h4>
                                <a href="{{ route('patients.index') }}" type="button"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <h4 class="mb-4 block text-base font-normal text-slate-900 text-left">Access the patient module to create, edit or delete patient information</h4>
                        </div>
                        <div class="cards w-72 mb-4">
                            <div class="flex justify-between">
                                <h4 class="mb-4 block text-base font-semibold text-slate-900 text-left">Appointment Module</h4>
                                <a href="{{ route('appointments.index') }}" type="button"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <h4 class="mb-4 block text-base font-normal text-slate-900 text-left">Access the appointment module to create, edit or delete doctor appointments</h4>
                        </div>
                    </div>
                    <div class="row flex space-x-2 mx-auto">
                        <div class="cards w-72 mb-4">
                            <div class="flex justify-between">
                                <h4 class="mb-4 block text-base font-semibold text-slate-900 text-left">Dashboard Module</h4>
                                <a href="{{ route('dashboard.index') }}" type="button"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <h4 class="mb-4 block text-base font-normal text-slate-900 text-left">Access the dashboard module to view metrics and search appointments</h4>
                        </div>
                        <div class="cards w-72 mb-4">
                            <div class="flex justify-between">
                                <h4 class="mb-4 block text-base font-semibold text-slate-900 text-left">Specializations Module</h4>
                                <a href="{{ route('specializations.index') }}" type="button"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <h4 class="mb-4 block text-base font-normal text-slate-900 text-left">Access the specialization module to create, edit or delete doctor specializations</h4>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection
