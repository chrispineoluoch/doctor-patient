@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Available Doctor Specializations</h4>
        <a href="{{ route('specializations.create') }}" class="btn">Create New Specialization</a>
    </div>

    @if($specializations->isEmpty())
        <p>No specializations found.</p>
    @else
        <ol>
            @foreach ($specializations as $index => $specialization)
                <li>{{ $index + 1 }}. {{ $specialization->specialization }}</li>
            @endforeach
        </ol>
    @endif
@endsection
