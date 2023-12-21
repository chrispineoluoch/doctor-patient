<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h4 class="block text-2xl font-semibold text-slate-900 mb-4 text-center">Appointment Dashboard</h4>

    <!-- Search Form -->
    <form action="{{ route('dashboard.index') }}" method="GET" class="mb-4 flex justify-center" id="searchForm">
        <div class="flex space-x-4">
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Enter Date</label>
                <input type="date" name="date" id="date" value="{{ request('date') }}"
                    class="mt-1 p-2 h-10 border rounded-md">
            </div>
            <div>
                <label for="doctor" class="block text-sm font-medium text-gray-700">Select Doctor:</label>
                <!-- Replace 'doctors' with the actual route or method to retrieve the list of doctors -->
                <select name="doctor" id="doctor" class="mt-1 p-2 h-10 border rounded-md">
                    <option value="" selected>Select Doctor</option>
                    <option value="" selected>All Doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ request('doctor') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->getFullNameAttribute() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="btn">Search</button>
                <button href="{{ route('dashboard.index') }}" type="button" class="btn h-10"
                    onclick="clearSearch()">Clear</button>
            </div>
        </div>
    </form>

    <!-- Display Filtered Appointments -->
    <div id="dashboardContent" class="flex justify-center mt-12">
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
                            <td class="border py-0.5 px-2 text-left">
                                {{ ($appointments->currentPage() - 1) * $appointments->perPage() + $index + 1 }}</td>
                            <td class="border py-0.5 px-2 text-left">{{ $appointment->patient->first_name }}
                                {{ $appointment->patient->last_name }}</td>
                            <td class="border py-0.5 px-2 text-left">{{ $appointment->doctor->user->first_name }}
                                {{ $appointment->doctor->user->last_name }}</td>
                            <td class="border py-0.5 px-2 text-left">
                                {{ $appointment->doctor->specialization->specialization }}</td>
                            <td class="border py-0.5 px-2 text-left">{{ $appointment->appointment_datetime }}</td>
                            <td class="border py-0.5 px-2 text-left">
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-blue-600">Edit</a>
                                <a href="{{ route('appointments.show', $appointment->id) }}" class="text-blue-600">View</a>
                                <form method="POST" action="{{ route('appointments.destroy', $appointment->id) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600"
                                        onclick="return confirm('Are you sure you want to delete this appointment?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($appointments->count())
                <nav class="mt-4">
                    {{ $appointments->links() }}
                </nav>
            @endif
        @endif
    </div>
    <div class="mt-12 flex gap-2 justify-center">
        <a href="{{ route('homepage') }}" class="btn">Cancel</a>
    </div>

    {{-- Script to clear the search results and search parameters --}}
    <script>
        function clearSearch() {
            // Clear search inputs
            document.getElementById('date').value = '';
            document.getElementById('doctor').value = '';

            // Hide the table
            document.getElementById('dashboardContent').style.display = 'none';
        }
    </script>

@endsection
