@extends('layouts.frontend')

@section('title', 'Search')

@section('meta', 'Airways Media - Search')

@section('content')

<div class="container pt-100">
    <div class="mvp-widget-home-head">
        <h4 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">Search</span></h4>
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
            <h3>No results match your search criteria</h3>
            @endforelse
        </div>
        <div class="col-md-3">
            <img class="lazyload pb-5"
                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                data-src="https://www.emaildrips.com/app/uploads/2021/01/Samsung-Google-Ad-example.png">
        </div>
    </div>
</div>

@endsection
