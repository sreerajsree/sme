@extends('layouts.dashboard')

@section('title', 'Create Profile - SME Business Review™')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Create Profile</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            <a href="/dashboard/sme/magazine/{{ $mag->id }}/profile" class="back">Back</a>
            <div class="well">
                <div class="well-title">
                    <h5>Create Profile for <b>{{ $mag->name }}</b></h5>
                </div>
                <div class="well-content">
                    <form action="{{ route('magazine.storeProfile') }}" method="POST" class="create-update"
                        enctype="multipart/form-data">
                        @include('/dashboard/profile/includes.form')
                        <button type="submit" class="button">Save</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Dashboard -->

@endsection
@push('scripts')
    <!--Scripts -->
    <script src="https://cdn.tiny.cloud/1/or30vnattjfewkqddql58gyvexgoltbqt0z2fkx3t2iwu0l5/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            height: "480",
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            toolbar_mode: 'floating',
            extended_valid_elements: 'script[src|async|defer|type|charset]',
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            }
        });
    </script>
    <!-- /.Scripts -->
@endpush
