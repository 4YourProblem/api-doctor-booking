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
                            <th>Adsress</th>
                            <th>Education</th>
                            <th>Specialty</th>
                            <th>Work Experience</th>
                            <th>Availability</th>
                            <th>CV</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($doctors as $doctor)
                        <tbody>
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $doctor->avatar) }}" alt="" style="width: 50%;">
                                </td>
                                <td>{{ $doctor->user->name }}</td>
                                <td>{{ $doctor->user->email }}</td>
                                <td>{{ $doctor->user->phone }}</td>
                                <td>{{ $doctor->address }}</td>
                                <td>{{ $doctor->education }}</td>
                                <td>{{ $doctor->specialty }}</td>
                                <td>{{ $doctor->work_experience }}</td>
                                <td>{{ $doctor->availability }}</td>
                                <td>
                                    @if ($doctor->resume_path)
                                        <a href="{{ asset('cv/' . $doctor->resume_path) }}" target="_blank">
                                            View CV
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger"
                                        href="{{ route('doctor.destroy', $doctor->id) }}">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</section>
