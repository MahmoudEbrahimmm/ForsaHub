@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h4 class="fw-bold mb-3 mt-5">Job Application</h4>
                    <div>
                        <a href="#" class="btn btn-dark me-2">Archived Companies</a>
                        <a href="#" class="btn btn-primary">Add Company</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>status</td>
                            <td>ai_generated_score</td>
                            <td class="w-50">ai_generated_feedback</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->status }}</td>
                                <td>{{ $application->ai_generated_score }}</td>
                                <td>{{ $application->ai_generated_feedback }}</td>
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
