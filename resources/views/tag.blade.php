@extends('layouts.frontend')

@section('content')

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Tag : {{ $title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">

                @if($tag->posts->count() > 0)
                <div class="case-item-wrap">
                    
                    @foreach ($tag->posts as $post)
                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                <a href="{{ route('single.post', ['slug' => $post->slug ]) }}"><img src="{{ $post->featured }}" alt="{{ $post->featured }}" class="cate-img"></a>
                            </div>
                            <h6 class="case-item__title"><a href="{{ route('single.post', ['slug' => $post->slug ]) }}">{{ $post->title }}</a></h6>
                        </div>
                    </div>
                    @endforeach

                @else
                    <h1 class="text-area">Data Tidak Ada</h1>
                @endif

                </div>

            </div>

        </main>
    </div>
</div>


@endsection