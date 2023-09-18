<aside class="sidebar">
    <!-- Related posts -->
    <div class="related-posts-widget">
        @if (count($related))
            <div class="mvp-widget-home-head p-0">
                <h4 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">recent posts</span></h4>
            </div>
            @foreach ($related as $post)
                <ul class="related">
                    <li>
                        <div class="post-content">
                            <a href="{{ route('post.show', [$post->slug]) }}" title="{{ $post->title }}">
                                <h5>{{ $post->title }}</h5>
                            </a>
                        </div>
                    </li>
                </ul>
            @endforeach
            <a target="_blank" href="https://ameerah.nyc/products/buy-a-nycxi-momentum-rotational-women-watch">
                <img class="lazyload pb-5"
                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                data-src="/ad.png">
            </a>
        @else
        <a target="_blank" href="https://ameerah.nyc/products/buy-a-nycxi-momentum-rotational-women-watch">
            <img class="lazyload pb-5"
            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
            data-src="/ad.png">
        </a>
        @endif
    </div>
    <!-- /.Related posts -->
</aside>
