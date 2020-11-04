@extends('layouts.app')

<? 
    $products = DB::table('projects')->orderBy('id', 'desc')->limit(8)->get();
    
    if(session('language') == 'pl'){
        $lan = 'pl';
    } else {
        $lan = 'eng';
    }

?>

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

@section('content')

<section id="baner" class="mb-4 w-100">
    <img src="{{ asset('graphics/baner.jpg') }}" class="vh-100 w-100">
</section>

<section class="container pt-5 pb-5" id="about">
    <div class="row justify-content-center text-center">
        <h1 class="font-weight-bold col-11 pb-2 pt-2 header "> {{ $lang[$lan]['titleMain1'] }} </h1>
        <h5 class="pb-3 col-sm-8 col-11 font-weight-bold underline"> {{ $lang[$lan]['titleSecond1'] }} </h5>
        <p class="p-3 pb-2 pt-4"> {{ $lang[$lan]['mainText1'] }} </p>
         <p class="pr-3 pl-3"> {{ $lang[$lan]['mainText1Left'] }} 
             <a href="#" class="item-link text-primary"> {{ $lang[$lan]['mainText1Button'] }}</a>{{ $lang[$lan]['mainText1Right'] }}
            </p>
         <p class="pb-2 pt-2 col-10"> <u>{{ $lang[$lan]['mainText1Welcome'] }} </u> </p>
         <p class="pb-2 pr-3 pl-3 pt-2 col-4"> 
             <a href="https://www.facebook.com/designbykw" target="_blank"> <i class="fab fa-facebook-square show-on-scroll fb shake"></i> </a> 
        </p>
    </div>
</section>

<section class="position-relative p-3 pt-5 pb-5">
    <div class="bgImage" style="background-image: url({{ asset('/graphics/design1.jpg')}} )"> </div>
    <div class="darkening"> </div>
    <div class="text text-center row justify-content-center">
        <p class="col-xl-6 col-md-8 col-sm-10 col-12 mb-3">{{ $lang[$lan]['saying1'] }}</p>
        <div class="dash"> </div>
        <p class="col-8 mt-3" style="font-size: 26px"> {{ $lang[$lan]['author1'] }}</p>
        <p class="col-8 mt-3"> <i class="fas fa-heart" style="color: rgb(201, 0, 0); text-shadow: 0 0 3px rgb(119, 0, 0)"></i> </p>
    </div>
</section>

<section class="container pt-5 pb-5" id="projects">
    <div class="row justify-content-center text-center">
        <h1 class="font-weight-bold text-center pl-5 pr-5 pb-2 pt-2 col-11 header" > {{ $lang[$lan]['titleMain2'] }} </h1> 
        <h5 class="pb-3 col-md-7 col-sm-10 col-11 font-weight-bold" id="projectsUnderline"> {{ $lang[$lan]['titleSecond2'] }}</h5>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 pt-5 m-0 justify-content-center text-center">

        @foreach ($products as $product)

            <div class="mb-4 col show-on-scroll">
                <div class="card h-100">
                    <img src="{{'graphics/'.$product->image}}" alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"> {{$product->name }} </h5>
                        <hr>
                        <p class="card-text"> {{ $lang[$lan][$product->type] }} </p>
                    </div>
                </div>
            </div>
            
        @endforeach

        <a href="{{ url('/projects') }}" class="btn btn-primary btn-lg mt-3 shadowButton"> {{ $lang[$lan]['projectsButton'] }} <i class="fas fa-arrow-right align-middle text-light" style="font-size: 1.5em"></i> </a>
    </div>
    


</section>

<section class="position-relative p-3 pt-5 pb-5">
    <div class="bgImage" style="background-image: url({{ asset('/graphics/design2.jpg')}} )"> </div>
    <div class="darkening"> </div>
    <div class="text text-center row justify-content-center">
        <p class="col-xl-6 col-md-8 col-sm-10 col-12 mb-3">{{ $lang[$lan]['saying2'] }}</p>
        <div class="dash"> </div>
        <p class="col-8 mt-3" style="font-size: 26px"> {{ $lang[$lan]['author2'] }}</p>
        <p class="col-8 mt-3"> <i class="fas fa-heart" style="color: rgb(201, 0, 0); text-shadow: 0 0 3px rgb(119, 0, 0)"></i> </p>
    </div>
</section>

<section class="container pt-5 pb-5" id="contact">
    <div class="row justify-content-center text-center">
        <h1 class="font-weight-bold text-center pl-5 pr-5 pb-2 pt-2 col-11 header" > {{ $lang[$lan]['titleMain3'] }} </h1>  
        <h5 class="pb-3 col-md-7 col-sm-9 col-11 font-weight-bold" id="contactUnderline"> {{ $lang[$lan]['titleSecond3'] }} </h5>

        <div class="row justify-content-center pt-5 m-0 col-12">
            <p class="col-10 pb-4 font-weight-bold"> <i class="fas fa-phone-square align-middle show-on-scroll fb shake"></i> 745 624 749 </p>
            <p class="col-md-8 col-sm-10 col-11"> {{ $lang[$lan]['contactText'] }} </p>
        </div>

        <form action="{{ url('/sendEmail') }}" method="POST" class="col-md-7 col-sm-9 col-11 mt-5">
        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3 text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block mt-3 text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text"  style="font-size: 18px" id="person"><i class="fas fa-male" style="font-size: 1em"></i></span>
                </div>
                <input type="text" name="name" style="font-size: 18px" class="form-control p-3" placeholder="{{ $lang[$lan]['placeholder1'] }}" aria-describedby="person" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 18px" id="number"><i class="fas fa-phone-square" style="font-size: 1em"></i></span>
                </div>
                <input type="text" name="phone" style="font-size: 18px" class="form-control p-3" placeholder="{{ $lang[$lan]['placeholder2'] }}" aria-describedby="number" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 18px" id="e-mail"><i class="fas fa-at" style="font-size: 1em"></i></span>
                </div>
                <input type="text" name="email" style="font-size: 18px" class="form-control p-3" placeholder="{{ $lang[$lan]['placeholder3'] }}" aria-describedby="e-mail" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 18px" id="message"><i class="fas fa-heading" style="font-size: 1em"></i></span>
                </div>
                <input type="text" name="title" style="font-size: 18px" class="form-control p-3" placeholder="{{ $lang[$lan]['placeholder4'] }}" aria-describedby="message" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 18px"><i class="fas fa-align-justify" style="font-size: 1em"></i></span>
                  </div>
                  <textarea class="form-control p-3" style="font-size: 18px" name="text" placeholder="{{ $lang[$lan]['placeholder5'] }}" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-lg"> {{ $lang[$lan]['formButton'] }} </button>

        </form>

    </div>
</section>

@endsection
