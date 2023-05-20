@extends('layouts.app')

@section('content')

    <h1>List of Users</h1>

    @empty($users)
        <div class="alert alert-warning">
            <span>This list of users is empty</span>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Admin Since</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr class="">
                            <td scope="row">{{ $user->id }}</td>
                            <td scope="row">{{ $user->name }}</td>
                            <td scope="row">{{ $user->email }}</td>
                            <td scope="row">{{ optional($user->admin_since)->diffForHumans() ?? 'Never' }}</td>
                            <td>
                                <form action="{{ route('users.admin.toggle', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link">
                                        {{ $user->isAdmin() ? 'Remove' : 'Make' }}
                                        Admin
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection
