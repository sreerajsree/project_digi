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

    <div class="container pt-100">
        <div class="mvp-widget-home-head">
            <h4 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">{{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $chosen_category->title) }}</span></h4>
        </div>
        <div class="row">
            <div class="col-md-9">
                @forelse ($posts_by_category as $post_item)
                    <a href="{{ route('post.show', [$post_item->slug]) }}">
                        <div class="main-post">
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="{{ Storage::url($post_item->photo->path) }}" alt="{{ $post_item->title }}">
                            <div class="content">
                                <p class="category">
                                    {{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $post_item->category->title) }} /
                                    {{ $post_item->date }}</p>
                                <p class="author">By {{ $post_item->user->name }}</p>
                                <h3 class="title">{{ $post_item->title }}</h3>
                                <p class="subtitle">
                                    {{ $post_item->excerpt }}{{ $post_item->three_dots }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <h3>Temporarily unavailable</h3>
                @endforelse
                <!-- Pagination section -->
                <div class="news-pagination">
                    <div class="news-pagination-wrapper">
                        {{ $posts_by_category->links('vendor.pagination.default') }}
                    </div>
                </div>
                <!-- /.Pagination section -->
            </div>
            <div class="col-md-3">
                <a target="_blank" href="https://ameerah.nyc/products/buy-a-nycxi-momentum-rotational-women-watch">
                    <img class="lazyload pb-5"
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="/ad.png">
                </a>
            </div>
        </div>
    </div>


@endsection
