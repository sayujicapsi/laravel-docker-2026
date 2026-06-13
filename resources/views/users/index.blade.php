@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page-head">
        <h1>Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Create User</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th style="width:60px">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th style="width:170px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="muted">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="muted">{{ $user->created_at?->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-light btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                      onsubmit="return confirm('Delete {{ $user->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty">No users yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
