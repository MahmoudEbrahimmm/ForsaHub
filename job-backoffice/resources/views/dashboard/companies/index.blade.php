@extends('layouts.dashboard')

@section('content')

<h1 class="mb-4">Companies</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Users</h6>
                <h3>120</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Companies</h6>
                <h3>35</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Vacancies</h6>
                <h3>78</h3>
            </div>
        </div>
    </div>
</div>

@endsection
