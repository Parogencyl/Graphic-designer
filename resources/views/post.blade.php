@extends('layouts.app')

<link href="{{ asset('css/blog.css') }}" rel="stylesheet">

<? 
    // wszystkie posty 
    $posts = DB::table('blog')->orderBy('created_at', 'DESC')->get();

    //Wszystkie komentarze
    $comments = DB::table('comments')->where('id_post', session('idPost'))->orderBy('created_at', 'DESC')->get();

    // Wyświetlany post
    $post = DB::table('blog')->where('id', session('idPost'))->first();

    $tag = array();

    for ($i=0; $i < sizeof($posts); $i++) { 
        if($posts[$i]->tag3){
            array_push($tag, $posts[$i]->tag3);
            array_push($tag, $posts[$i]->tag2);
            array_push($tag, $posts[$i]->tag1);
        } else if($posts[$i]->tag2){
            array_push($tag, $posts[$i]->tag2);
            array_push($tag, $posts[$i]->tag1);
        } else {
            array_push($tag, $posts[$i]->tag1);
        }
    }

    $tag = array_values(array_unique($tag));

?>

@section('content')


<div class="container mt-5 mb-5" style="padding-top: 100px">
    <div class="row justify-content-center">
        <h1 class="text-center font-weight-bold mb-3 d-inline-block px-5" id="blogUnderline">
            {{ $post->title }} </h1>

        <div class="col-12"> </div>

        <section class="col-md-8 col-12">
            <article class="row justify-content-center p-2 mb-5">

                @if ($post->image3 || $post->image2)

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        @if ($post->image3)
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        @endif
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{'../../'.$post->image1 }}" alt="image1" class="rounded d-block">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ '../../'.$post->image2 }}" alt="image2" class="rounded d-block">
                        </div>

                        @if ($post->image3)
                        <div class="carousel-item">
                            <img src="{{ '../../'.$post->image3 }}" alt="image3" class="rounded d-block">
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

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ '../../'.$post->image1 }}" alt="image1" class="rounded d-block">
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

                <div class="w-100 pl-3 pr-3 groupText mt-4">
                    <div class="borderLeft float-left mr-3 rounded"></div>
                    <div class="float-left">
                        <div class="articleText text-break">
                            {!! nl2br(e($post->main_text)) !!}
                        </div>
                    </div>
                </div>
            </article>

            <hr>

            <!-- Wyświetlane komentarze -->

            <article class="col-sm-10 col-11 mt-4 mb-4" id="opinions">
                @if ($comments->count())

                @foreach($comments as $comment)
                <div class="opinion">
                    <h5 class="font-weight-bold mb-1"> {{ $comment->name }} </h5>
                    <p class="text-dark mb-2"> {{ $comment->created_at }} </p>
                    <p style="font-size: 16px"> {{ $comment->text }} </p>
                </div>
                @endforeach

                @else

                <div class="opinion">
                    <h5 class="mt-4 mb-4"> Podziel się swoją opinią jako pierwszy. </h5>
                </div>

                @endif
            </article>

            <hr>

            <!-- Dodawanie komentarzy -->

            @if ($message = Session::get('commentNotAdded'))
            <div class="alert alert-danger alert-block mt-3 text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('commentAdded'))
            <div class="alert alert-success alert-block mt-3 text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <form action="{{url('/blog/post/comment')}}" method="POST" class="mb-5 mt-4 row col-12 mx-auto">
                @csrf
                <h4 class="mb-4"> Podziel się swoją opinią na ten temat </h4>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="font-size: 18px" id="message"><i class="fas fa-male"
                                style="font-size: 1em"></i></span>
                    </div>
                    <input type="text" name="name" style="font-size: 18px" class="form-control p-3" placeholder="Imię"
                        aria-describedby="message" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="font-size: 18px"><i class="fas fa-align-justify"
                                style="font-size: 1em"></i></span>
                    </div>
                    <textarea class="form-control p-3" style="font-size: 18px" name="text"
                        placeholder="Treść komentarza" required></textarea>
                </div>
                <button class="btn btn-lg btn-primary mx-auto" type="submit"> Dodaj </button>
            </form>

        </section>


        <!-- Aside -->

        <aside class="col-md-4 col-11 pl-sm-5">
            <div class="justify-content-center row">
                <img src="../../graphics/logo.jpg" alt="Logo" class="col-4">
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
                @if (isset($posts[2]))
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$posts[0]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $posts[0]->title }}</a>
                </p>
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$posts[1]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $posts[1]->title }} </a>
                </p>
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$posts[2]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $posts[2]->title }}</a>
                </p>
                @elseif(isset($posts[1]))
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$posts[0]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $posts[0]->title }}</a>
                </p>
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$posts[1]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $posts[1]->title }} </a>
                </p>
                @else
                <p class="mb-1"> <a href="{{ url('/blog/post/id='.$posts[0]->id) }}"> <i
                            class="fas fa-circle align-middle"> </i> {{ $posts[0]->title }}</a>
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