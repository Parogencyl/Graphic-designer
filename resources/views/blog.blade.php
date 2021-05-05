@extends('layouts.app')

<link href="{{ asset('css/blog.css') }}" rel="stylesheet">

<?php

    $posts = DB::table('blog')->orderBy('created_at', 'DESC')->paginate(3);

    $allPosts = DB::table('blog')->orderBy('created_at', 'DESC')->get();

    $tag = array();

    for ($i=0; $i < sizeof($allPosts); $i++) { 
        if($allPosts[$i]->tag3){
            array_push($tag, $allPosts[$i]->tag3);
            array_push($tag, $allPosts[$i]->tag2);
            array_push($tag, $allPosts[$i]->tag1);
        } else if($allPosts[$i]->tag2){
            array_push($tag, $allPosts[$i]->tag2);
            array_push($tag, $allPosts[$i]->tag1);
        } else {
            array_push($tag, $allPosts[$i]->tag1);
        }
    }

    $tag = array_values(array_unique($tag));

?>

@section('content')

<section class="container text-center">
    <h1 class="font-weight-bold" style="padding-top: 120px" id="header"> Blog </h1>
    <h5 class="font-weight-bold col-md-6 col-10 ml-auto mr-auto mb-4 pb-2" id="blogUnderline"> Tutaj staram się
        umieszczać ciekawe spostrzeżenia </h5>
</section>

<section class="position-relative p-3 pt-5 pb-5">
    <div class="bgImage" style="background-image: url({{ asset('/graphics/design1.jpg')}} )"> </div>
    <div class="darkening"> </div>
    <div class="text text-center row justify-content-center">
        <p id="mainText" class="mt-4 col-md-8 col-sm-10 col-12"> Staram się wykonywać jak najlepiej swoją pracę, dlatego
            muszę być nabierząco
            z panującymi trendami nie tylko w kontekście estetyki. Muszę także śledzić aktualnie stosowane narzędzia do
            pracy oraz oprogramowania,
            bo właśnie dzięki nim mogę pokazać cały swój zamysł artystyczny. Chciałabym zebrać wszystkie cieawe rzeczy w
            jednym miejscu i móc się
            nimi podzielić z innym, dlatego właśnie powstał ten blog, także z myślą o was. <strong> :) </strong>
        </p>
    </div>
</section>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <section class="col-md-8 col-12">

            @if(session('setTag'))
            @foreach (session('setTag') as $post)

            <article class="row justify-content-center p-2 mt-5 mb-5">

                @if ($post->image2)

                <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        @if ($post->image3)
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        @endif
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $post->image1 }}" alt="image1" class="rounded d-block">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ $post->image2 }}" alt="image2" class="rounded d-block">
                        </div>

                        @if ($post->image3)
                        <div class="carousel-item">
                            <img src="{{ $post->image3 }}" alt="image3" class="rounded d-block">
                        </div>
                        @endif
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                @else

                <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $post->image1 }}" alt="image1" class="rounded d-block">
                        </div>
                    </div>
                </div>


                @endif

                <p class="mt-2 text-left col-sm-6 col-12 mb-1"> <strong> Data publikacji: </strong>
                    {{ $post->created_at }} </p>
                <p class="mt-2 text-sm-right text-left col-sm-6 col-12 mb-1"> <strong> Tagi: </strong>
                    @if (isset($post->tag3))
                    <a href="{{ url('/blog/tag/'.$post->tag1)}}" class="text-dark text-decoration-none">
                        {{ $post->tag1 }}</a>,
                    <a href="{{ url('/blog/tag/'.$post->tag2)}}" class="text-dark text-decoration-none">
                        {{ $post->tag2 }}</a>,
                    <a href="{{ url('/blog/tag/'.$post->tag3)}}" class="text-dark text-decoration-none">
                        {{ $post->tag3 }}</a>
                    @elseif(isset($post->tag2))
                    <a href="{{ url('/blog/tag/'.$post->tag1)}}" class="text-dark text-decoration-none">
                        {{ $post->tag1 }}</a>,
                    <a href="{{ url('/blog/tag/'.$post->tag2)}}" class="text-dark text-decoration-none">
                        {{ $post->tag2 }}</a>
                    @else
                    <a href="{{ url('/blog/tag/'.$post->tag1)}}" class="text-dark text-decoration-none">
                        {{ $post->tag1 }}</a>
                    @endif
                </p>

                <h2 class="col-12 font-weight-bold"> {{ $post->title }} </h2>

                <div class="w-100 pl-3 pr-3 groupText">
                    <div class="borderLeft float-left mr-3 rounded"></div>
                    <div class="float-left">
                        <div class="articleText">
                            {{ $post->first_text }}
                        </div>
                        <a href="{{ url('/blog/post/id='.$post->id) }}" class="btn btn-lg ml-4 mt-3"> Więcej <i
                                class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            </article>

            <hr>

            @endforeach

            @else

            @foreach ($posts as $post)

            <article class="row justify-content-center p-2 mt-5 mb-5">

                @if ($post->image2)

                <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        @if ($post->image3)
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        @endif
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $post->image1 }}" alt="image1" class="rounded d-block">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ $post->image2 }}" alt="image2" class="rounded d-block">
                        </div>

                        @if ($post->image3)
                        <div class="carousel-item">
                            <img src="{{ $post->image3 }}" alt="image3" class="rounded d-block">
                        </div>
                        @endif
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                @else

                <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $post->image1 }}" alt="image1" class="rounded d-block">
                        </div>
                    </div>
                </div>


                @endif

                <p class="mt-2 text-left col-sm-6 col-12 mb-1"> <strong> Data publikacji: </strong>
                    {{ $post->created_at }} </p>

                <p class="mt-2 text-sm-right text-left col-sm-6 col-12 mb-1"> <strong> Tagi: </strong>
                    @if (isset($post->tag3))
                    <a href="{{ url('/blog/tag/'.$post->tag1)}}" class="text-dark text-decoration-none">
                        {{ $post->tag1 }}</a>,
                    <a href="{{ url('/blog/tag/'.$post->tag2)}}" class="text-dark text-decoration-none">
                        {{ $post->tag2 }}</a>,
                    <a href="{{ url('/blog/tag/'.$post->tag3)}}" class="text-dark text-decoration-none">
                        {{ $post->tag3 }}</a>
                    @elseif(isset($post->tag2))
                    <a href="{{ url('/blog/tag/'.$post->tag1)}}" class="text-dark text-decoration-none">
                        {{ $post->tag1 }}</a>,
                    <a href="{{ url('/blog/tag/'.$post->tag2)}}" class="text-dark text-decoration-none">
                        {{ $post->tag2 }}</a>
                    @else
                    <a href="{{ url('/blog/tag/'.$post->tag1)}}" class="text-dark text-decoration-none">
                        {{ $post->tag1 }}</a>
                    @endif

                </p>

                <h2 class="col-12 font-weight-bold"> {{ $post->title }} </h2>

                <div class="w-100 pl-3 pr-3 groupText">
                    <div class="borderLeft float-left mr-3 rounded"></div>
                    <div class="float-left">
                        <div class="articleText">
                            {{ $post->first_text }}
                        </div>
                        <a href="{{ url('/blog/post/id='.$post->id) }}" class="btn btn-lg ml-4 mt-3"> Więcej <i
                                class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            </article>

            <hr>

            @endforeach
            @endif

            @if (session('setTag'))
            {{ session('setTag')->render() }}
            @else
            {{ $posts->render() }}
            @endif

        </section>


        <!-- Aside -->

        <aside class="col-md-4 col-11 pl-sm-5">
            <div class="justify-content-center row">
                <img src="graphics/logo.jpg" alt="Logo" class="col-4">
                <p class="col-12 text-justify m-0"> Z pasją wykonuję swoją
                    pracę. Kocham to co robię, ale żeby jak najlepiej wykonywać to czym się zajmuję muszę być na
                    bieżąco z technikami pracy,
                    narzędziami, a w szczególności z trędami. Dlatego tworzę ten blog, by wszystkimi cennymi
                    informacjami móc się z Wami dzilić.
                    Teraz wszystko co ważne znajdziesz w jednym miejscu :) </p>
                <a href="https://www.facebook.com/designbykw" target="_blank"> <i
                        class="fab fa-facebook-square fb shake"></i> </a>

            </div>

            <div class="borderTop"></div>

            <div>
                <h3 class="w-100 mb-3"> Ostatnie publikacje: </h3>
                @if (isset($allPosts[2]))
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$allPosts[0]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $allPosts[0]->title }}</a>
                </p>
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$allPosts[1]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $allPosts[1]->title }} </a>
                </p>
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$allPosts[2]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $allPosts[2]->title }}</a>
                </p>
                @elseif(isset($allPosts[1]))
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$allPosts[0]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $allPosts[0]->title }}</a>
                </p>
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$allPosts[1]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $allPosts[1]->title }} </a>
                </p>
                @else
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$allPosts[0]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $allPosts[0]->title }}</a>
                </p>
                @endif
            </div>

            <div class="borderTop"></div>

            <div id="tags">
                <h3 class="w-100"> Tagi: </h3>
                @for ($i = 0; $i < sizeof($tag); $i++) <a href="{{ url('/blog/tag/'.$tag[$i])}}" class="btn mt-2 mr-2">
                    {{ $tag[$i] }} </a>
                    @endfor
            </div>
        </aside>
    </div>
</div>

@endsection