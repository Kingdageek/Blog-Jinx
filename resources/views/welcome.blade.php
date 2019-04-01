    @include('includes.header')
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
                            <a href="#" class="link-post">
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
                                            <a href="#">{{ $first_post->category->name }}</a>
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
                            <a href="#" class="link-post">
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
                                            <a href="#">{{ $second_post->category->name }}</a>
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
                            <a href="#" class="link-post">
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
                                            <a href="#">{{ $third_post->category->name }}</a>
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
                                            <h6 class="case-item__title"><a href="#">{{ $post->title }}</a></h6>
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

<!-- Subscribe Form -->

<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="subscribe scrollme">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Email Newsletters!</h4>
                        <form class="subscribe-form" method="post" action="">
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Sign up for new {{ $settings->site_name ?? 'Seosight' }} content, updates, surveys & offers.</div>

                    </div>

                    <div class="images-block">
                        <img src="{{ asset('app/img/subscr-gear.png') }}" alt="gear" class="gear">
                        <img src="{{ asset('app/img/subscr1.png') }}" alt="mail" class="mail">
                        <img src="{{ asset('app/img/subscr-mailopen.png') }}" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Subscribe Form -->
</div>



@include('includes.footer')

</body>
</html>
