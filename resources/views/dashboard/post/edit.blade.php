@extends('layouts.dashboard')

@section('title', 'Edit: ' . $post->title)

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
        <a href="/dashboard/posts" class="back">Back</a>
        <div class="well">
            <div class="well-title">
                <h5>Edit Post</h5>
            </div>
            <div class="well-content">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="create-update" enctype="multipart/form-data">
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
    $(document).ready(function () {
        $('.tag-select-for-post').select2();
    });
</script>
<!-- /.Scripts -->
<script src="https://cdn.tiny.cloud/1/ixle0z1ai7rwqgaiicjfvkm4lhgcdsjf4jv3yf1ivog2z8t2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            height: "600",
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            toolbar_mode: 'floating',
            extended_valid_elements : 'script[src|async|defer|type|charset]',
            formats: {
                h1: {
                    block: 'h1',
                    styles: {
                        'font-weight': 'normal',
                        'font-size': '1.8rem'
                    }
                },
                h2: {
                    block: 'h2',
                    styles: {
                        'font-weight': 'normal',
                        'font-size': '1.8rem'
                    }
                },
                h3: {
                    block: 'h3',
                    styles: {
                        'font-weight': 'normal',
                        'font-size': '1.8rem'
                    }
                },
                h4: {
                    block: 'h4',
                    styles: {
                        'font-weight': 'normal',
                        'font-size': '1.8rem'
                    }
                },
                h5: {
                    block: 'h5',
                    styles: {
                        'font-weight': 'normal',
                        'font-size': '1.8rem'
                    }
                },
                h6: {
                    block: 'h6',
                    styles: {
                        'font-weight': 'normal',
                        'font-size': '1.8rem'
                    }
                },
            },
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            }
        });
    </script>
@endpush
