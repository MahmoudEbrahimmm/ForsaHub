@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h4 class="fw-bold mb-3 mt-5">Job Vacancies</h4>
                    <div>
                        <a href="#" class="btn btn-dark me-2">Archived Companies</a>
                        <a href="#" class="btn btn-primary">Add Company</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>title</td>
                            <td class="w-50">Descriprion</td>
                            <td>location</td>
                            <td>salary</td>
                            <td>type</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $vacance)
                            <tr>
                                <td>{{ $vacance->status }}</td>
                                <td>{{ $vacance->ai_generated_score }}</td>
                                <td>{{ $vacance->ai_generated_feedback }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a href="" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
