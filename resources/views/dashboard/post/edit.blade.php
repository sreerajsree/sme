@extends('layouts.dashboard')

@section('title', 'Edit: ' . $post->title.'- SME Business Review™')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Edit Post</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            <a href="/dashboard/sme/posts" class="back">Back</a>
            <div class="well">
                <div class="well-title">
                    <h5>Edit Post</h5>
                </div>
                <div class="well-content">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="create-update"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @include('/dashboard/post/includes.form')
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
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tag-select-for-post').select2();
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/or30vnattjfewkqddql58gyvexgoltbqt0z2fkx3t2iwu0l5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
