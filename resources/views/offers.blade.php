@extends('layouts.app')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/offers.css') }}" rel="stylesheet">

<?
    if(session('language') == 'pl'){
        $lan = 'pl';
    } else {
        $lan = 'eng';
    }

?>

@section('content')

<section class="container text-center">
    <h1 class="font-weight-bold" style="padding-top: 120px" id="header"> {{$lang[$lan]['titleMain']}} </h1>
    <h5 class="font-weight-bold col-md-6 col-10 ml-auto mr-auto mb-4 pb-2" id="offersUnderline">
        {{$lang[$lan]['titleSecond']}} </h5>

</section>

<section class="position-relative p-3 pt-5 pb-5">
    <div class="bgImage" style="background-image: url({{ asset('/graphics/design3.jpg')}} )"> </div>
    <div class="darkening"> </div>
    <div class="text text-center row justify-content-center">
        <p id="mainText" class="mt-4 col-md-8 col-sm-10 col-12"> {{$lang[$lan]['mainTextLeft']}}
            <a href="{{ url('/#contact')}}" class="text-success"> {{$lang[$lan]['mainTextButton']}} </a>
            {{$lang[$lan]['mainTextRight']}}
        </p>
    </div>
</section>

<section class="container text-center">
    <div class="row row-cols-md-2 row-cols-1 mt-5">

        <div class="col pb-4 mt-5 show-on-scroll">
            <div class="row  row-cols-1 row-cols-sm-12 justify-content-center h-100">

                <div class="col-sm-2 col-10 text-center pr-0 pl-0 pb-3">
                    <span> <i class="fas fa-pen pt-4" style="font-size: 30px; color:rgb(219, 117, 0)"></i> </span>
                </div>

                <div class=" h-100 col-sm-9 col-11">
                    <h1 class="text-center font-weight-bold mb-4"> {{$lang[$lan]['offer1Title']}} </h1>
                    <div>
                        <div class="text-justify pb-3">
                            {{$lang[$lan]['offer1Text']}}
                        </div>
                        <h4 class="mb-3 font-weight-bold">
                            {{$lang[$lan]['offer1Title2']}}
                        </h4>

                        <h4 class="mb-3 font-weight-bold" style="color: rgb(219, 117, 0)">
                            {{$lang[$lan]['offer1Price']}}
                        </h4>
                    </div>
                    <div>
                        <form action="{{ url('offers/paymentController') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$lang['eng']['offer1Price']}}" name="price">
                            <input type="hidden" value="{{$lang[$lan]['offer1Title']}}" name="title">
                            <button class="btn btn-success btn-lg pl-4 pr-4">
                                {{$lang[$lan]['offerButton']}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col pb-4 mt-5 show-on-scroll">
            <div class="row row-cols-1 row-cols-sm-12 justify-content-center h-100">

                <div class="col-2 text-center pr-0 pl-0 pb-3">
                    <span> <i class="fas fa-file-powerpoint pt-4" style="font-size: 30px; color:rgb(219, 117, 0)"></i>
                    </span>
                </div>

                <div class=" h-100 col-sm-9 col-11">
                    <h1 class="text-center font-weight-bold mb-4"> {{$lang[$lan]['offer2Title']}} </h1>
                    <div>
                        <div class="text-justify pb-3">
                            {{$lang[$lan]['offer2Text']}}
                        </div>

                        <h4 class="mb-3 font-weight-bold" style="color: rgb(219, 117, 0)">
                            {{$lang[$lan]['offer2Price']}}
                        </h4>
                    </div>
                    <div>
                        <form action="{{ url('offers/paymentController') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$lang['eng']['offer2Price']}}" name="price">
                            <input type="hidden" value="{{$lang[$lan]['offer2Title']}}" name="title">
                            <button class="btn btn-success btn-lg pl-4 pr-4">
                                {{$lang[$lan]['offerButton']}}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="col pb-4 mt-5 show-on-scroll">
            <div class="row justify-content-center h-100">

                <div class="col-2 text-center pr-0 pl-0 pb-3">
                    <span> <i class="fas fa-image pt-4" style="font-size: 30px; color:rgb(219, 117, 0)"></i> </span>
                </div>

                <div class=" h-100 col-sm-9 col-11">
                    <h1 class="text-center font-weight-bold mb-4"> {{$lang[$lan]['offer3Title']}} </h1>
                    <div>
                        <div class="text-justify pb-3">
                            {{$lang[$lan]['offer3Text']}}
                        </div>

                        <h4 class="mb-3 font-weight-bold" style="color: rgb(219, 117, 0)">
                            {{$lang[$lan]['offer3Price']}}
                        </h4>
                    </div>
                    <div>
                        <form action="{{ url('offers/paymentController') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$lang['eng']['offer3Price']}}" name="price">
                            <input type="hidden" value="{{$lang[$lan]['offer3Title']}}" name="title">
                            <button class="btn btn-success btn-lg pl-4 pr-4">
                                {{$lang[$lan]['offerButton']}}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>



        <div class="col pb-4 mt-5 show-on-scroll">
            <div class="row justify-content-center h-100">

                <div class="col-2 text-center pr-0 pl-0 pb-3">
                    <span> <i class="fas fa-sticky-note pt-4" style="font-size: 30px; color:rgb(219, 117, 0)"></i>
                    </span>
                </div>

                <div class=" h-100 col-sm-9 col-11">
                    <h1 class="text-center font-weight-bold mb-4"> {{$lang[$lan]['offer4Title']}} </h1>
                    <div>
                        <div class="text-justify pb-3">
                            {{$lang[$lan]['offer4Text']}}
                        </div>
                        <h4 class="mb-3 font-weight-bold">
                            {{$lang[$lan]['offer4Title2']}}
                        </h4>

                        <h4 class="mb-3 font-weight-bold" style="color: rgb(219, 117, 0)">
                            {{$lang[$lan]['offer4Price']}}
                        </h4>
                    </div>
                    <div>
                        <form action="{{ url('offers/paymentController') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$lang['eng']['offer4Price']}}" name="price">
                            <input type="hidden" value="{{$lang[$lan]['offer4Title']}}" name="title">
                            <button class="btn btn-success btn-lg pl-4 pr-4">
                                {{$lang[$lan]['offerButton']}}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>



        <div class="col pb-4 mt-5 show-on-scroll">
            <div class="row justify-content-center h-100">

                <div class="col-2 text-center pr-0 pl-0 pb-3">
                    <span> <i class="fas fa-laptop-code pt-4" style="font-size: 30px; color:rgb(219, 117, 0)"></i>
                    </span>
                </div>

                <div class=" h-100 col-sm-9 col-11">
                    <h1 class="text-center font-weight-bold mb-4"> {{$lang[$lan]['offer5Title']}} </h1>
                    <div>
                        <div class="text-justify pb-3">
                            {{$lang[$lan]['offer5Text']}}
                        </div>

                        <h4 class="mb-3 font-weight-bold" style="color: rgb(219, 117, 0)">
                            {{$lang[$lan]['offer5Price']}}
                        </h4>
                    </div>
                    <div>
                        <form action="{{ url('offers/paymentController') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$lang['eng']['offer5Price']}}" name="price">
                            <input type="hidden" value="{{$lang[$lan]['offer5Title']}}" name="title">
                            <button class="btn btn-success btn-lg pl-4 pr-4">
                                {{$lang[$lan]['offerButton']}}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="col pb-4 mt-5 show-on-scroll">
            <div class="row justify-content-center h-100">

                <div class="col-2 text-center pr-0 pl-0 pb-3">
                    <span> <i class="fas fa-user pt-4" style="font-size: 30px; color:rgb(219, 117, 0)"></i> </span>
                </div>

                <div class=" h-100 col-sm-9 col-11">
                    <h1 class="text-center font-weight-bold mb-4"> {{$lang[$lan]['offer6Title']}} </h1>
                    <div>
                        <div class="text-justify pb-3">
                            {{$lang[$lan]['offer6Text']}}
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-success btn-lg pl-4 pr-4" href="{{ url('/#contact')}}">
                            {{$lang[$lan]['offerButtonContact']}} </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

@endsection