@extends('layouts.dashboard')

@section('title', 'Add Client - SME Business Review™')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Add Client</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            <a href="/dashboard/sme/clients" class="back">Back</a>
            <div class="well">
                <div class="well-title">
                    <h5>Add Client</h5>
                </div>
                <div class="well-content">
                    <form action="{{ route('clients.store') }}" method="POST" class="create-update"
                        enctype="multipart/form-data">
                        @include('/dashboard/clients/includes.form')
                        <button type="submit" class="button">Save</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Dashboard -->

@endsection