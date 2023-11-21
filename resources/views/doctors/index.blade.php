@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('doctors.create') }}" class="btn">Create New Doctor</a>
        <h4 class="mt-8 block text-2xl font-semibold text-slate-900">All Doctors</h4>
    </div>

    @if ($doctors->isEmpty())
        <p>No Doctors found.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border py-0.5 px-1 text-left text-base font-medium">SN</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Doctor name</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Specialization</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $index => $doctor)
                    <tr>
                        <td class="border py-0.5 px-2 text-left">{{ $index + 1 }}</td>
                        <td class="border py-0.5 px-2 text-left">{{ $doctor->user->first_name }}
                            {{ $doctor->user->last_name }}</td>
                        <td class="border py-0.5 px-2 text-left">{{ $doctor->specialization->specialization }}</td>
                        <td class="border py-0.5 px-2 text-left">
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="text-blue-600">Show</a>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('doctors.destroy', $doctor->id) }}"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"
                                    onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
