@extends('layouts.app')

@section('content')
    <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Scheduled Appointments for Dr. {{ $doctor->getFullNameAttribute() }}</h4>

    @if ($appointments->isEmpty())
        <p>No Appointments found.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border py-0.5 px-1 text-left text-base font-medium">SN</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Patient name</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Appointment Date</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $index => $appointment)
                    <tr>
                        <td class="border py-0.5 px-2 text-left">{{ $index + 1 }}</td>
                        <td class="border py-0.5 px-2 text-left">{{ $appointment->patient->first_name }}
                            {{ $appointment->patient->last_name }}</td>
                        <td class="border py-0.5 px-2 text-left">{{ $appointment->appointment_datetime }}</td>
                        <td class="border py-0.5 px-2 text-left">
                            <a href="{{ route('doctors.edit-appointment', ['doctorId' => $doctor->id, 'appointmentId' => $appointment->id]) }}" class="text-blue-600">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
