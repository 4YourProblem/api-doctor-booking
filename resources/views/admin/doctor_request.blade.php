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
                            <th>Education</th>
                            <th>Specialty</th>
                            <th>Work Experience</th>
                            <th>CV</th>
                            <th></th>
                            <th></th>


                        </tr>
                    </thead>
                    @foreach ($doctorRequests as $doctorRequest)
                        <tbody>
                            <tr>
                                <td>{{ $doctorRequest->id }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $doctorRequest->avatar) }}" alt=""
                                        style="width: 50%;">
                                </td>
                                <td>{{ $doctorRequest->user->name }}</td>
                                <td>{{ $doctorRequest->user->email }}</td>
                                <td>{{ $doctorRequest->user->phone }}</td>
                                <td>{{ $doctorRequest->address }}</td>
                                <td>{{ $doctorRequest->education }}</td>
                                <td>{{ $doctorRequest->specialty }}</td>
                                <td>{{ $doctorRequest->work_experience }}</td>
                                <td>
                                    @if ($doctorRequest->resume_path)
                                        <a href="{{ asset('cv/' . $doctorRequest->resume_path) }}" target="_blank">
                                            View CV
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @csrf
                                    @method('POST')
                                    <a class="btn btn-success"
                                        href="{{ route('doctor.approve', $doctorRequest->id) }}">Approve</a>
                                </td>
                                <td>
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger"
                                        href="{{ route('doctor.refuse', $doctorRequest->id) }}">Refuse</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</section>
