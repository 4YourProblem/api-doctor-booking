@include('layouts.header')
@extends('layouts.nav')
<section class="pcoded-main-container">
    <div class="card">
        <div class="card-header">
            <h5>User Table</h5>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</section>
