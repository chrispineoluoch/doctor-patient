@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Patients</h4>
        <a href="{{ route('patients.create') }}" class="btn">Create New Patient</a>
    </div>

    @if($patients->isEmpty())
        <p>No Patients found.</p>
    @else
        <ol>
            @foreach($patients as $index => $patient)
                <li class="flex justify-between">
                    {{ $index + 1 }}. {{ $patient->first_name }} {{ $patient->last_name }}
                    <div class="flex space-x-2">
                        <!-- View link -->
                        <a href="{{ route('patients.show', $patient->id) }}" class="text-green-600">View</a>

                        <!-- Edit link -->
                        <a href="{{ route('patients.edit', $patient->id) }}" class="text-blue-600">Edit</a>

                        <!-- Delete form -->
                        <form method="POST" action="{{ route('patients.destroy', $patient->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600"
                                onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ol>
    @endif
@endsection
