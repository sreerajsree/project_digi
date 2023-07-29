@extends('layouts.frontend')

@section('title', ucwords($chosen_category->title) . ' - ' . 'Digishaz')

@section('meta')
    <meta name="title" content="{{ $chosen_category->title }} - Digishaz">
    <meta name="description" content="">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description" content="{{ $chosen_category->title }}">
    <meta property="og:image" content="http://digishaz.com/{{ Storage::url($posts_by_category[0]->photo->path) }}">
    <meta property="og:site_name" content="Digishaz">
    <meta property="og:title" content="{{ $chosen_category->title }} - Digishaz">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="Digishaz">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://digishaz.com">
    <meta property="twitter:title" content="{{ $chosen_category->title }} - Digishaz">
    <meta property="twitter:description" content="{{ $chosen_category->title }}">
    <meta property="twitter:site" content="@Digishaz_">
    <meta property="twitter:image" content="http://digishaz.com/{{ Storage::url($posts_by_category[0]->photo->path) }}">
    <meta property="twitter:creator" content="@Digishaz_">
@endsection

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>{{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $chosen_category->title) }}</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Posts by category section -->
    <section class="news">
        <div class="news-container">
            <div class="news-wrapper">
                @forelse ($posts_by_category as $post_item)
                    <div class="item">
                        @if ($post_item->photo)
                            <div class="image-holder">
                                <a href="{{ route('post.show', [$post_item->slug]) }}">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url($post_item->photo->path) }}" alt="{{ $post_item->title }}">
                                    <div class="image-overlay"></div>
                                </a>
                            </div>
                        @endif
                        <div class="category-container">
                            <a href="{{ $post_item->category->slug }}" class="category">
                                {{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $post_item->category->title) }}
                            </a>
                            <div class="item-content">
                                <a href="{{ route('post.show', [$post_item->slug]) }}" title="{{ $post_item->title }}">
                                    <h2>{{ $post_item->title }}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>Temporarily unavailable</h3>
                @endforelse
            </div>
            <div class="ads">&nbsp;
            </div>
        </div>
    </section>
    <!-- /.Posts by category section -->

    <!-- Pagination -->
    <section class="news-pagination">
        <div class="news-pagination-wrapper">
            {{ $posts_by_category->links('vendor.pagination.default') }}
        </div>
    </section>
    <!-- /.Pagination -->

@endsection
