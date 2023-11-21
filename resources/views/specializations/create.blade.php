@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('specializations.store') }}">
        @csrf

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Create a new doctor specialization category</h4>
        <div class="mb-4">
            <label for="specialization" class="mb-2 block text-sm font-medium text-slate-900">Create a new doctor specialization category</label>
            <select name="specialization" class="input" required>
                <option value="" disabled selected>Select specialization</option>
                @foreach ($specializationOptions as $specialization)
                    <option value="{{ $specialization }}">{{ $specialization }}</option>
                @endforeach
            </select>
        </div>        

        <div class="flex justify-center">
            <button type="submit" class="btn">Create Specialization</button>
        </div>
    </form>
@endsection
