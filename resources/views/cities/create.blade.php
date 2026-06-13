@extends('layouts.app')

@section('title', 'Create City')

@section('content')
    <div class="page-head">
        <h1>Create City</h1>
        <a href="{{ route('cities.index') }}" class="btn btn-light">Back</a>
    </div>

    <form action="{{ route('cities.store') }}" method="POST" class="stack">
        @csrf
        @include('cities._form', ['city' => null, 'countries' => $countries])

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create City</button>
            <a href="{{ route('cities.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
