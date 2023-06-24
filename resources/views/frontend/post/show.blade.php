@extends('layouts.frontend')

@section('title', $post->title)

@section('meta', $post->description)

@section('content')
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6496c7967674a90012611553&product=sticky-share-buttons&source=platform" async="async"></script>
<!-- Show post page -->
<section class="news-show">
    <div class="news-show-wrapper">
        <div class="item-itself">
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
            <p class="main-title">{{ $post->title }}</p>
            <p>{{ $post->description }}</p>
            <div class="sharethis-sticky-share-buttons"></div>
            {!! clean($post->body) !!}
            {{-- <div class="item-line"></div> --}}
            <div class="meta-bottom">
                {{-- <div class="post-tags">
                    @foreach ($post->tags as $tag)
                    <a href="{{ $tag->slug }}" class="button">#{{ lcfirst($tag->title) }}</a>
                    @endforeach
                </div> --}}
                <div class="votes">
                    <!-- Likes Vue Component -->
                    {{-- <likes :default_likes="{{ $post->likes }}" :entity_id="{{ $post->id }}" 
                           :entity_owner="{{ $post->user_id }}">
                    </likes> --}}
                </div>
            </div>
            {{-- @guest
            <a href="{{ route('login') }}" class="auth-condition">Sign in to comment</a>
            @endguest --}}
            <!-- Comments Vue Component -->
            {{-- <comments :post="{{ $post }}"></comments> --}}
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
