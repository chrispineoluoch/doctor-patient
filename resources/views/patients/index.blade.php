@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('patients.create') }}" class="btn">Create New Patient</a>
        <h4 class="mt-8 block text-2xl font-semibold text-slate-900">Patients</h4>
    </div>

    @if ($patients->isEmpty())
        <p>No Patients found.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border py-0.5 px-1 text-left text-base font-medium">SN</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Patient name</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $index => $patient)
                    <tr>
                        <td class="border py-0.5 px-2 text-left">{{ ($patients->currentPage() - 1) * $patients->perPage() + $index + 1 }}</td>                        
                        <td class="border py-0.5 px-2 text-left">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                        <td class="border py-0.5 px-2 text-left">
                            <a href="{{ route('patients.show', $patient->id) }}" class="text-blue-600">View</a>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('patients.destroy', $patient->id) }}"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"
                                    onclick="return confirm('Are you sure you want to delete this patient?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($patients->count())
            <nav class="mt-4">
                {{ $patients->links() }}
            </nav>
        @endif
        <div class="mt-4 flex gap-2 justify-end">
            <a href="{{ route('homepage') }}" class="btn">Back</a>
        </div>
    @endif
@endsection
