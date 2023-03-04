@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <a href="{{ route('information.index') }}" class="btn btn-primary m-2">Information list <i class="fas fa-arrow-right"></i></a>
                <div class="card mt-2">
                    <div class="card-body">
                        {{-- @if(session()->has('success'))
                            {{session()->get('success')}}
                        @endif --}}
                        {{-- @include('includes.error') --}}
                        <h3 class="card-title text-center mb-4">Census of Educational Institutions</h3>
                        <form action="{{ route('information.store') }}" method="post">
                            @csrf
                            <!--row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputInstitutionName">Institution Name</label>
                                        <input type="text"
                                            class="form-control @error('inputInstitutionName') is-invalid @enderror"
                                            name="inputInstitutionName" placeholder="Enter institution name"
                                            value="{{ old('inputInstitutionName') }}">
                                        @error('inputInstitutionName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputInstitutionType">Institution Type</label>
                                        <select class="form-control @error('inputInstitutionType') is-invalid @enderror"
                                            name="inputInstitutionType">
                                            <option value="Primary School">Primary School</option>
                                            <option value="Secondary School">Secondary School</option>
                                            <option value="Higher Secondary School">Higher Secondary School</option>
                                            <option value="College">College</option>
                                            <option value="University">University</option>
                                        </select>
                                        @error('inputInstitutionType')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-group">
                                <label for="inputLocation">Location</label>
                                <input type="text" class="form-control @error('inputLocation') is-invalid @enderror"
                                    name="inputLocation" placeholder="Enter institution location"
                                    value="{{ old('inputLocation') }}">
                                @error('inputLocation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputTotalStudents">Total Students</label>
                                <input type="number" class="form-control @error('inputLocation') is-invalid @enderror"
                                    name="inputTotalStudents" placeholder="Enter total number of students"
                                    value="{{ old('inputTotalStudents') }}">
                                @error('inputTotalStudents')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputTotalTeachers">Total Teachers</label>
                                <input type="number" class="form-control @error('inputLocation') is-invalid @enderror"
                                    name="inputTotalTeachers" placeholder="Enter total number of teachers"
                                    value="{{ old('inputTotalTeachers') }}">
                                @error('inputTotalTeachers')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Add now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
