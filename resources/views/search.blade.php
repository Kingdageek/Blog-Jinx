@extends('layouts.frontend')
@section('title', $query.' | Search results')
@section('content')
<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search results: {{ $query }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">

            <div class="row">
                        <div class="case-item-wrap">
                            @forelse($posts as $post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                        </div>
                                        <h6 class="case-item__title">
                                            <a href="{{ route('frontend.single', ['category'=>$post->category->slug, 'slug'=>$post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center"><strong>No search results found.</strong></p>
                            @endforelse
                        </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            @include('includes.sidebar')

        </main>
    </div>
</div>
@endsection
