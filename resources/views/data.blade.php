@extends('layouts.data')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="container-fluid d-flex justify-content-between">
                <h2 class="font-weight-bold">Home page</h2>
                <div class="">

                    <a href="{{ route('trash.data') }}" class="btn btn-danger">Trash <i class="fas fa-arrow-right-arrow-left"></i></a>
                    <a href="{{ route('index') }}" class="btn btn-primary">Add new <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Institution Type</th>
                        <th>Location</th>
                        <th>Total_student</th>
                        <th>Total_teacher</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($all_data as $data)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->inputInstitutionType }}</td>
                            <td>{{ $data->location }}</td>
                            <td>{{ $data->total_student }}</td>
                            <td>{{ $data->total_teacher }}</td>
                            <td class="d-flex">
                                <a href="{{ route('information.edit', [$data->id]) }}" class="btn btn-success mr-1"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('information.destroy', [$data->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $all_data->links() }}
        </div>
    </div>
@endsection
