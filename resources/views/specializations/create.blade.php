@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('specializations.store') }}">
        @csrf

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Create a new doctor specialization category</h4>
        <div class="mb-4">
            <label for="specialization" class="mb-2 block text-sm font-medium text-slate-900">Enter doctor specialization</label>
            <input name="specialization" type="text" class="input" placeholder="Enter the new doctor specialization category" required/>
        </div>       

        <div class="mt-12 flex gap-2 justify-center">
            <button type="submit" class="btn">Create Specialization</button>
            <a href="{{ route('specializations.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
