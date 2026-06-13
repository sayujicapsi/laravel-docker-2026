@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="page-head">
        <h1>Create User</h1>
        <a href="{{ route('users.index') }}" class="btn btn-light">Back</a>
    </div>

    <form action="{{ route('users.store') }}" method="POST" class="stack">
        @csrf

        <div class="field">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required>
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
            <div class="hint">Minimum 8 characters.</div>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
