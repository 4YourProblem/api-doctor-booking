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
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Medical History</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($patients as $patient)
                        <tbody>
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $patient->avatar) }}" alt=""
                                        style="width: 50%;">
                                </td>
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->user->email }}</td>
                                <td>{{ $patient->user->phone }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>{{ $patient->birthday }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->medical_history }}</td>
                                <td>
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger"
                                        href="{{ route('patient.destroy', $patient->id) }}">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</section>
