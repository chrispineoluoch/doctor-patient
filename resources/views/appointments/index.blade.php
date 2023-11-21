@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('appointments.create') }}" class="btn">Create New Appointment</a>
        <h4 class="mt-8 block text-2xl font-semibold text-slate-900">All Scheduled Appointments</h4>
    </div>

    @if ($appointments->isEmpty())
        <p>No Appointments found.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border py-0.5 px-1 text-left text-base font-medium">SN</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Patient name</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Doctor name</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Specialization</th>
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
                        <td class="border py-0.5 px-2 text-left">{{ $appointment->doctor->user->first_name }}
                            {{ $appointment->doctor->user->last_name }}</td>
                            <td class="border py-0.5 px-2 text-left">{{ $appointment->doctor->specialization->specialization }}</td>
                        <td class="border py-0.5 px-2 text-left">{{ $appointment->appointment_datetime }}</td>
                        <td class="border py-0.5 px-2 text-left">
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-blue-600">Edit</a>
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="text-blue-600">Show</a>
                            <form method="POST" action="{{ route('appointments.destroy', $appointment->id) }}"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"
                                    onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
