@extends('layouts.app')

<? 
    $products = DB::table('projects')->orderBy('id', 'desc')->get();

    if(session('language') == 'pl'){
        $lan = 'pl';
    } else {
        $lan = 'eng';
    }

?>

<link href="{{ asset('css/projects.css') }}" rel="stylesheet">
<script src="{{ asset('js/mixitup.min.js')}}"></script>

@section('content')

<section class="container text-center">
    <h1 class="font-weight-bold" style="padding-top: 120px" id="header"> {{ $lang[$lan]['titleMain'] }} </h1>
    <h5 class="font-weight-bold col-md-6 col-10 ml-auto mr-auto mb-4 pb-2" id="projectsUnderline"> {{ $lang[$lan]['titleSecond'] }} </h5>
</section>

<section class="position-relative p-3 pt-5 pb-5">
    <div class="bgImage" style="background-image: url({{ asset('/graphics/design2.jpg')}} )"> </div>
    <div class="darkening"> </div>
    <div class="text text-center row justify-content-center">
        <p id="mainText" class="mt-4 col-md-8 col-sm-10 col-12"> {{ $lang[$lan]['mainText'] }} </p>
    </div>
</section>

<section class="container mb-5" id="projects">
    <div class="row justify-content-center pt-5 m-0 text-center">
        <div class="row pl-5 pr-5 w-100" role="group" class="programs">
            <button type="submit" data-filter="all" class="filter-btn btn btn-primary col-md-3 col-sm-6 col-12 border mb-2" style="font-size: 17px"> {{ $lang[$lan]['Button1'] }} </button>
            <button type="submit" data-filter=".logo" class="filter-btn btn btn-primary col-md-3 col-sm-6 col-12 border mb-2" style="font-size: 17px"> {{ $lang[$lan]['Button2'] }} </button>
            <button type="submit" data-filter=".webPage" class="filter-btn btn btn-primary col-md-3 col-sm-6 col-12 border mb-2" style="font-size: 17px"> {{ $lang[$lan]['Button3'] }} </button>
            <button type="submit" data-filter=".advertisement" class="filter-btn btn btn-primary col-md-3 col-sm-6 col-12 border mb-2" style="font-size: 17px"> {{ $lang[$lan]['Button4'] }} </button>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 pt-3 m-0 justify-content-center text-center" id="mix-wrapper">
    </div>

        <script>
            let array = <?php echo json_encode($products); ?>;
            let addArray = [...array];
            let lang = <?php echo json_encode($lang); ?>;
            let lan = <?php echo json_encode($lan); ?>;

            for (let i = 0; i < addArray.length; i++) {
                if(addArray[i]['type'] == "logo" || addArray[i]['type'] == "baner"){
                    document.getElementById('mix-wrapper').innerHTML += 
                    '<div class=" mb-4 col mix-target logo show-on-scroll" data-order="'+i+'">'+
                        '<div class="card h-100">'+
                            '<img src="graphics/'+addArray[i]['image']+'" alt="'+addArray[i]['name']+'" class="card-img-top">'+
                            '<div class="card-body">'+
                                '<h5 class="card-title"> '+addArray[i]['name']+' </h5>'+
                                '<hr>'+
                                '<p class="card-text"> '+lang[lan][addArray[i]['type']]+' </p>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                } else if(addArray[i]['type'] == "webpage" || addArray[i]['type'] == "presentation"){
                    document.getElementById('mix-wrapper').innerHTML += 
                    '<div class="mb-4 col mix-target webPage show-on-scroll" data-order="'+i+'">'+
                        '<div class="card h-100">'+
                            '<img src="graphics/'+addArray[i]['image']+'" alt="'+addArray[i]['name']+'" class="card-img-top">'+
                            '<div class="card-body">'+
                                '<h5 class="card-title"> '+addArray[i]['name']+' </h5>'+
                                '<hr>'+
                                '<p class="card-text"> '+lang[lan][addArray[i]['type']]+' </p>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                } else if(addArray[i]['type'] == "advertisement" || addArray[i]['type'] == "businessCard"){
                    document.getElementById('mix-wrapper').innerHTML += 
                    '<div class="mb-4 col mix-target advertisement show-on-scroll" data-order="'+i+'">'+
                        '<div class="card h-100">'+
                            '<img src="graphics/'+addArray[i]['image']+'" alt="'+addArray[i]['name']+'" class="card-img-top">'+
                            '<div class="card-body">'+
                                '<h5 class="card-title"> '+addArray[i]['name']+' </h5>'+
                                '<hr>'+
                                '<p class="card-text"> '+lang[lan][addArray[i]['type']]+' </p>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                }
            }
           
    
            if(window.innerWidth > 576){

            mixitup('#mix-wrapper', {
                load: {
                    sort: 'order:asc'
                },
                    animation: {
                    effects: 'fade rotateZ(-180deg)',
                    duration: 700
                },
                classNames: {
                    block: 'programs',
                    elementFilter: 'filter-btn'
                },
                selectors: {
                    target: '.mix-target'
                }
                });

            } else {

            mixitup('#mix-wrapper', {
                load: {
                    sort: 'order:asc'
                },
                classNames: {
                    block: 'programs',
                    elementFilter: 'filter-btn'
                },
                selectors: {
                    target: '.mix-target'
                }
                });

            }
  

        </script>

</section>

<div id="goTop">
    <i class="far fa-caret-square-up"></i>
</div>

<script>
    document.getElementById('goTop').addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            left: 0,
            behaviot: 'smooth'
        });
    });

    document.getElementById('goTop').addEventListener('mouseover', () => {
        document.getElementById('goTop').style.opacity = '1';
    });
    document.getElementById('goTop').addEventListener('mouseleave', () => {
        document.getElementById('goTop').style.opacity = '0.6';
    });

</script>

@endsection