@extends('layouts.dashboard')

@section('title', 'Create Magazine - SME Business Review™')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Create Magazine</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            <a href="/dashboard/sme/magazine" class="back">Back</a>
            <div class="well">
                <div class="well-title">
                    <h5>Create Magazine</h5>
                </div>
                <div class="well-content">
                    <form action="{{ route('magazine.store') }}" method="POST" class="create-update"
                        enctype="multipart/form-data">
                        @include('/dashboard/magazine/includes.form')
                        <button type="submit" class="button">Save</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Dashboard -->

@endsection