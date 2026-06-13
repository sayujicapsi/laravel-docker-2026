@extends('layouts.app')

@section('title', 'Create Country')

@section('content')
    <div class="page-head">
        <h1>Create Country</h1>
        <a href="{{ route('countries.index') }}" class="btn btn-light">Back</a>
    </div>

    <form action="{{ route('countries.store') }}" method="POST" class="stack">
        @csrf
        @include('countries._form', ['country' => null])

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Country</button>
            <a href="{{ route('countries.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
