@extends('layouts.frontend')

@section('title', 'DIGISHAZ: Discover Engaging Content and Stay Informed.')

@section('meta')
    <meta name="title" content="DIGISHAZ: Discover Engaging Content and Stay Informed.">
    <meta name="description"
        content="Explore a world of captivating content and stay informed with DIGISHAZ. Dive into our diverse collection of articles and insights.">
    <meta name="keywords"
        content="web">
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
    <meta property="twitter:image"
    content="{{ asset('logo.jpg') }}">
    <meta property="twitter:creator" content="@Digishaz_">
    <meta name="dcterms.rightsHolder" content="Digishaz">
    <meta name="dcterms.dateCopyrighted" content="{{ now()->year }}">
@endsection

@section('content')

<!-- Jumbotron section -->
<section class="jumbothron">
    <div class="hero">
       <p> <span style="color: yellow">D</span>iscover engaging content anf stay informed.</p>
    </div>
    @if ($featured)
    <div class="jumbothron-wrapper">
        <div class="content">
            <a href="{{ route('post.show', [$featured->slug]) }}" title="{{ $featured->title }}">
                <h2>{{ $featured->title }}</h2>
            </a>
            <p>
                {{ $featured->featured_excerpt }}{{ $featured->featured_three_dots }}
            </p>
            <a href="{{ route('post.show', [$featured->slug]) }}" class="button">
                Read more
            </a>            
        </div>
        @if ($featured->photo)
        <div class="image-holder">
            <a href="{{ route('post.show', [$featured->slug]) }}">
                <img class="lazyload" 
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="{{ Storage::url($featured->photo->path) }}" alt="{{ $featured->title }}">
                <div class="image-overlay"></div>
            </a>
        </div>
        @endif        
    </div>
    @endif
</section>
<!-- /.Jumbotron section -->

<!-- Posts section -->
<section class="news">
    <h1>Latest Articles</h1>
    <div class="news-wrapper">
        @forelse ($posts as $post_item)
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
            <a href="{{ $post_item->category->slug }}" class="category">
                {{ preg_replace('~[^\p{M}\p{L}]+~u', ' ', $post_item->category->title) }}
            </a>
            <div class="item-content">
                <a href="{{ route('post.show', [$post_item->slug]) }}" title="{{ $post_item->title }}">
                    <h2>{{ $post_item->title }}</h2>
                </a>
                {{-- <p class="item-blog-text">
                    {{ $post_item->excerpt }}{{ $post_item->three_dots }}
                </p> --}}
            </div>
        </div>
        @empty
        <h3>Temporarily unavailable</h3>
        @endforelse
    </div>
</section>
<!-- /.Posts section -->

<!-- Pagination section -->
<section class="news-pagination">
    <div class="news-pagination-wrapper">
        {{ $posts->links('vendor.pagination.default') }}
    </div>
</section>
<!-- /.Pagination section -->

<!-- Subscription livewire component widget -->
<!--<livewire:subscription />-->
<!-- /.Subscription livewire component widget -->

<!-- Random posts slider -->
{{-- <section class="slider">
    <h3>Read More</h3>
    <div class="contact-slider">
        <div class="contact-slider-wrapper">
            @foreach ($random_posts as $post_item)
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
                <div class="item-content">
                    <a href="{{ route('post.show', [$post_item->slug]) }}" title="{{ $post_item->title }}">
                        <h2>{{ $post_item->title }}</h2>
                    </a>
                    <p class="item-blog-text">
                        {{ $post_item->excerpt }}{{ $post_item->three_dots }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}
<!-- /.Random posts slider -->

@endsection

@push('scripts')

<!-- Scripts -->
{{-- <script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/slick_users.js') }}"></script> --}}
<!-- /.Scripts -->

@endpush
