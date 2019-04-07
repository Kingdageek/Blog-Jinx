@extends('layouts.frontend')
@section('content')
    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">
                    {{--  $first_post is a model instance not a collection that's why isEmpty() won't work  --}}
                    @if ( ! empty($first_post) )
                        <div class="post-thumb">
                            <img src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $first_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{ route('frontend.single', ['category' => $first_post->category->slug, 'slug' => $first_post->slug]) }}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="15_blog_details.html">{{ $first_post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{ $first_post->created_at }}">
                                                {{ $first_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('frontend.category', ['category'=>$first_post->category->slug]) }}">{{ $first_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                    @else
                        @include('includes.themeFirstPost')
                    @endif

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">
                    @if ( ! empty($second_post) )
                        <div class="post-thumb">
                            <img src="{{ $second_post->featured }}" alt="{{ $second_post->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $second_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{ route('frontend.single', ['category' => $second_post->category->slug, 'slug' => $second_post->slug]) }}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="15_blog_details.html">{{ $second_post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{ $second_post->created_at }}">
                                                {{ $second_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('frontend.category', ['category'=>$second_post->category->slug]) }}">{{ $second_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                    @else
                        @include('includes.themeSecondPost')
                    @endif
                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">
                    @if ( ! empty($third_post) )
                        <div class="post-thumb">
                            <img src="{{ $third_post->featured }}" alt="{{ $third_post->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $third_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{ route('frontend.single', ['category' => $third_post->category->slug, 'slug' => $third_post->slug]) }}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="15_blog_details.html">{{ $third_post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{ $third_post->created_at }}">
                                                {{ $third_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('frontend.category', ['category'=>$third_post->category->slug]) }}">{{ $third_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                    @else
                        @include('includes.themeThirdPost')
                    @endif

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                @forelse ($categories as $category)
                    @if ( ! $category->posts->isEmpty() )
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{ $category->name }}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            @foreach ($category->posts()->orderBy('created_at', 'DESC')->take(3)->get() as $post)
                                <div class="case-item-wrap">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->featured }}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{ route('frontend.single', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            @endif
        @empty
            @include('includes.themeCategories')
        @endforelse
            </div>
            </div>
        </div>
    </div>
@endsection
