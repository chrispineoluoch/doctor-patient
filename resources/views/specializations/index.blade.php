@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('specializations.create') }}" class="btn">Create New Specialization</a>
        <h4 class="mt-8 block text-2xl font-semibold text-slate-900">Available Doctor Specializations</h4>
    </div>

    @if ($specializations->isEmpty())
        <p>No specializations found.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border py-0.5 px-1 text-left text-base font-medium">SN</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Specialization name</th>
                    <th class="border py-0.5 px-2 text-left text-base font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specializations as $index => $specialization)
                    <tr>
                        <td class="border py-0.5 px-2 text-left">
                            {{ ($specializations->currentPage() - 1) * $specializations->perPage() + $index + 1 }}</td>
                        <td class="border py-0.5 px-2 text-left">{{ $specialization->specialization }}</td>
                        <td class="border py-0.5 px-2 text-left">
                        <a href="{{ route('specializations.show', $specialization->id) }}" class="text-blue-600">View</a>
                        <a href="{{ route('specializations.edit', $specialization->id) }}" class="text-blue-600">Edit</a>
                        <form method="POST" action="{{ route('specializations.destroy', $specialization->id) }}"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600"
                                onclick="return confirm('Are you sure you want to delete this specialization?')">Delete
                            </button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($specializations->count())
            <nav class="mt-4">
                {{ $specializations->links() }}
            </nav>
        @endif
        <div class="mt-12 flex gap-2 justify-center">
            <a href="{{ route('homepage') }}" class="btn">Cancel</a>
        </div>
    @endif
@endsection
