@extends('layouts.frontend')

@section('title', 'DIGISHAZ: Discover Engaging Content and Stay Informed.')

@section('meta')
    <meta name="title" content="DIGISHAZ: Discover Engaging Content and Stay Informed.">
    <meta name="description"
        content="Explore a world of captivating content and stay informed with DIGISHAZ. Dive into our diverse collection of articles and insights.">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="homepage">
    <meta property="og:description"
        content="Explore a world of captivating content and stay informed with DIGISHAZ. Dive into our diverse collection of articles and insights.">
    <meta property="og:image" content="{{ asset('logo.jpg') }}">
    <meta property="og:site_name" content="DIGISHAZ: Discover Engaging Content and Stay Informed.">
    <meta property="og:title" content="DIGISHAZ: Discover Engaging Content and Stay Informed.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="Digishaz">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://digishaz.com">
    <meta property="twitter:title" content="DIGISHAZ: Discover Engaging Content and Stay Informed.">
    <meta property="twitter:description"
        content="Explore a world of captivating content and stay informed with DIGISHAZ. Dive into our diverse collection of articles and insights.">
    <meta property="twitter:site" content="@tfe_worldwide">
    <meta property="twitter:image" content="{{ asset('logo.jpg') }}">
    <meta property="twitter:creator" content="@Digishaz_">
    <meta name="dcterms.rightsHolder" content="Digishaz">
    <meta name="dcterms.dateCopyrighted" content="{{ now()->year }}">
@endsection

@section('content')
    <div class="container nav-padding">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('post.show', [$featured[0]->slug]) }}">
                    <div class="relative">
                        <img class="lazyload"
                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                            data-src="{{ Storage::url($featured[0]->photo->path) }}" alt="{{ $featured[0]->title }}">
                        <div class="absolute featured-main">
                            <p class="category">{{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $featured[0]->category->title) }}
                                / {{ $featured[0]->date }}</p>
                            <p class="author">By {{ $featured[0]->user->name }}</p>
                            <h3 class="title">{{ $featured[0]->title }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 res-padding">
                <a href="{{ route('post.show', [$featured[1]->slug]) }}">
                    <div class="relative">
                        <img class="lazyload"
                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                            data-src="{{ Storage::url($featured[1]->photo->path) }}" alt="{{ $featured[1]->title }}">
                        <div class="absolute featured-main">
                            <p class="category">{{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $featured[1]->category->title) }}
                                / {{ $featured[1]->date }}</p>
                            <p class="author">By {{ $featured[1]->user->name }}</p>
                            <h3 class="title">{{ $featured[1]->title }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            @for ($i = 2; $i < count($featured); $i++)
                <div class="col-md-3">
                    <div class="mt-4">
                        <a href="{{ route('post.show', [$featured[$i]->slug]) }}">
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="{{ Storage::url($featured[$i]->photo->path) }}"
                                alt="{{ $featured[$i]->title }}">
                            <div class="post">
                                <p class="category">
                                    {{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $featured[$i]->category->title) }} /
                                    {{ $featured[$i]->date }}</p>
                                <p class="author">By {{ $featured[$i]->user->name }}</p>
                                <h3 class="title">{{ $featured[$i]->title }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="container">
        <div class="mvp-widget-home-head">
            <h4 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">More News</span></h4>
        </div>
        <div class="row">
            <div class="col-md-9">
                @forelse ($posts as $post_item)
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
                        {{ $posts->links('vendor.pagination.default') }}
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

    <!-- Subscription livewire component widget -->
    <livewire:subscription />
    <!-- /.Subscription livewire component widget -->



@endsection
