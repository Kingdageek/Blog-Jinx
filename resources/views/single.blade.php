@extends('layouts.frontend')
@section('title', $post->title)
@section('content')
<div class="content-wrapper">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">{{ $post->title }}</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <!-- Post Details -->


        <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    <div class="col-lg-10 col-lg-offset-1">
                        <article class="hentry post post-standard-details">

                            <div class="post-thumb">
                                <img src="{{ $post->featured }}" alt="seo">
                            </div>

                            <div class="post__content">


                                <div class="post-additional-info">

                                    <div class="post__author author vcard">
                                        Posted by

                                        <div class="post__author-name fn">
                                            <a href="#" class="post__author-link">{{ $post->user->name }}</a>
                                        </div>

                                    </div>

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="{{ $post->created_at }}">
                                            {{ $post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="{{ route('frontend.category', ['category'=>$post->category->slug]) }}">{{ $post->category->name }}</a>
                                    </span>

                                </div>

                                <div class="post__content-info">

                                    <p class="post__text">
                                        {!! $post->content !!}
                                    </p>

                                    <div class="widget w-tags">
                                        <div class="tags-wrap">
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ route('frontend.tag', ['tag'=>$tag->slug]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="socials">Share:
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-facebook"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-twitter"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-linkedin"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-google-plus"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-pinterest"></i>
                                </a>
                            </div>

                        </article>

                        <div class="blog-details-author">

                            <div class="blog-details-author-thumb">
                                <img src="{{ asset($post->user->profile->avatar) }}" alt="Author" style="height: 10em;
                                border-radius: 50%;">
                            </div>

                            <div class="blog-details-author-content">
                                <div class="author-info">
                                    <h5 class="author-name">{{ $post->user->name }}</h5>
                                </div>
                                <p class="text">{{ $post->user->profile->about }}
                                </p>
                                <div class="socials">

                                    <a href="{{ $post->user->profile->facebook }}" class="social__item">
                                        <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                                    </a>

                                    <a href="{{ $post->user->profile->youtube }}" class="social__item">
                                        <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="pagination-arrow">
                            @if ($prev_post)
                                <a href="{{ route('frontend.single', ['category'=>$prev_post->category->slug, 'slug' => $prev_post->slug]) }}" class="btn-prev-wrap">
                                    <svg class="btn-prev">
                                        <use xlink:href="#arrow-left"></use>
                                    </svg>
                                    <div class="btn-content">
                                        <div class="btn-content-title">Previous Post</div>
                                        <p class="btn-content-subtitle">{{ $prev_post->title }}</p>
                                    </div>
                                </a>
                            @endif
                            @if ($next_post)
                                <a href="{{ route('frontend.single', ['category'=>$next_post->category->slug, 'slug' => $next_post->slug]) }}" class="btn-next-wrap">
                                    <div class="btn-content">
                                        <div class="btn-content-title">Next Post</div>
                                        <p class="btn-content-subtitle">{{ $next_post->title }}</p>
                                    </div>
                                    <svg class="btn-next">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </a>
                            @endif

                        </div>

                        <div class="comments">

                            <div class="heading text-center">
                                <h4 class="h1 heading-title">Comments</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                                @include('includes.disqus')
                            </div>
                        </div>

                        <div class="row">

                        </div>


                    </div>

                    <!-- End Post Details -->

                    @include('includes.sidebar')

                </main>
            </div>
        </div>
@endsection
