@extends('layouts.frontend')

@section('title', $post->title . ' - ' . 'Digishaz')

@section('meta')
    <meta name="title" content="{{ $post->title }} - Digishaz">
    <meta name="description" content="{{ $post->description }}">
    <meta name="keywords" content="web">
    <meta name="news_keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="article">
    <meta property="og:description" content="{{ $post->description }}">
    <meta property="og:image" content="{{ Storage::url($post->photo->path) }}">
    <meta property="og:image:alt" content="{{ $post->title }} - Digishaz">
    <meta property="og:image:height" content="628">
    <meta property="og:image:width" content="1200">
    <meta property="og:site_name" content="Digishaz">
    <meta property="og:title" content="{{ $post->title }} - Digishaz">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta property="article:opinion" content="false">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:section" content="tags">
    <meta property="article:published_time" content="{{ $post->created_at }}">
    <meta property="article:modified_time" content="{{ $post->updated_at }}">
    <meta property="article:author" content="{{ $post->user->name }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://digishaz.com">
    <meta property="twitter:title" content="{{ $post->title }} - Digishaz">
    <meta property="twitter:description" content="{{ $post->description }}">
    <meta property="twitter:site" content="@Digishaz_">
    <meta property="twitter:image" content="{{ Storage::url($post->photo->path) }}">
    <meta property="twitter:creator" content="@Digishaz_">
@endsection

@section('content')
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=6496c7967674a90012611553&product=sticky-share-buttons&source=platform"
        async="async"></script>

    <div class="container">
        <h3 class="mvp-post-cat left relative"> <a class="mvp-post-cat-link" href="{{ $post->category->slug }}"> <span
                    class="mvp-post-cat left">
                    {{ strtoupper(preg_replace('~[^\p{M}\p{L}]+~u', ' ', $post->category->title)) }} </span> </a></h3>
        <h2 class="post-title">{{ $post->title }}</h2>
        <div class="author-main">
            <p class="date">Updated on {{ $post->publish_date_time }}</p>
            <p class="name">By <a href="{{ $post->user->slug }}">{{ $post->user->name }}</a></p>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="mt-5">
                    <img class="lazyload"
                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                        data-src="{{ Storage::url($post->photo->path) }}" alt="{{ $post->title }}">
                </div>
                <div class="post-body">
                    {!! clean($post->body) !!}
                </div>
                <div class="post-tags">
                    @foreach ($post->tags as $tag)
                        <a href="{{ $tag->slug }}" class="button">#{{ lcfirst($tag->title) }}</a>
                    @endforeach
                </div>
                @guest
                    <a href="{{ route('login') }}" class="auth-condition">Sign in to comment</a>
                @endguest
                <!-- Comments Vue Component -->
                <comments :post="{{ $post }}"></comments>
            </div>
            <div class="col-md-3">
                @include('frontend.post.includes.sidebar')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/sticky-kit.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/sticky-kit_users.js') }}" defer></script>
    <!-- /.Scripts -->
@endpush
