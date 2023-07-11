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
    <meta property="og:image"
        content="{{ Storage::url($post->photo->path) }}">
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
    <meta property="twitter:image"
        content="{{ Storage::url($post->photo->path) }}">
    <meta property="twitter:creator" content="@Digishaz_">
@endsection

@section('content')
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6496c7967674a90012611553&product=sticky-share-buttons&source=platform" async="async"></script>
<!-- Show post page -->
<section class="news-show">
    <div class="news-show-wrapper">
        <div class="item-itself">
            <p class="main-title">{{ $post->title }}</p>
            <p class="meta">
                @if ($post->category)
                <a href="{{ $post->category->slug }}" class="show-category">
                    {{ strtoupper(preg_replace('~[^\p{M}\p{L}]+~u', ' ', $post->category->title)) }}
                </a>
                @endif
                {{ $post->publish_date_time }}
                @if ($post->user)
                <a href="{{ $post->user->slug }}" class="show-author" title="Posts by {{ $post->user->name }}">
                    {{ $post->user->name }}
                </a>
                @endif
            </p>
            @if ($post->photo)
            <div class="thumbnail">
                <img class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="{{ Storage::url($post->photo->path) }}" alt="{{ $post->title }}">
            </div>
            @if ($post->photo_source)
            <button class="photo-source">{{ $post->photo_source }}</button>
            @endif
            @endif
            
           
            <div class="sharethis-sticky-share-buttons"></div>
            <div class="post-body">
                {!! clean($post->body) !!}
            </div>
            <div class="item-line"></div>
            <div class="meta-bottom">
                <div class="post-tags">
                    @foreach ($post->tags as $tag)
                    <a href="{{ $tag->slug }}" class="button">#{{ lcfirst($tag->title) }}</a>
                    @endforeach
                </div>
                <div class="votes">
                    <!-- Likes Vue Component -->
                    {{-- <likes :default_likes="{{ $post->likes }}" :entity_id="{{ $post->id }}" 
                           :entity_owner="{{ $post->user_id }}">
                    </likes> --}}
                </div>
            </div>
            @guest
            <a href="{{ route('login') }}" class="auth-condition">Sign in to comment</a>
            @endguest
            <!-- Comments Vue Component -->
            <comments :post="{{ $post }}"></comments>
        </div>
        <!-- Sidebar -->
        @include('frontend.post.includes.sidebar')
        <!-- /.Sidebar -->
        <div class="clear"></div>
    </div>
</section>
<!-- /.Show post page -->

@endsection

@push('scripts')

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/sticky-kit.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/sticky-kit_users.js') }}" defer></script>
<!-- /.Scripts -->

@endpush
