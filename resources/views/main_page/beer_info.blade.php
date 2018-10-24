@extends('layout.up')

<div class="container mt-5">


    <div class="container justify-content-center d-flex align-items-center ">

        <div class="content mt-5">

            @if (count($errors) > 0)
                <div class="mt-5 alert alert-danger col-lg-12">
                    YOU HAVE ERROR

                    <ul>
                        @foreach ($errors->messages() as $key => $error)
                            @if(is_array($error))
                                @foreach ($error as $k => $e)
                                    <li> {{ $e }} </li>
                                @endforeach
                            @else
                                <li> {{ $error }} </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class=" container title">
                    <div class="col-md-12">
                        <a class="btn btn-info mb-3" href={{ url('beer') }} role="button">Return to list of beers</a>
                        {{--<a class="btn btn-secondary offset-md-0 mb-3" href={{ url('beer/'.$prev) }} role="button">previous beer</a>--}}
                        <a class="btn btn-secondary mb-3" href={{ url('beer/'.$next) }} role="button">next beer</a>
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-info display-3">{{$name}}</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark mb-5">{{$brewer}}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{$country}}</div>
                                <p class="card-text mb-auto">You can buy {{$quantity}} bottle(s)/bank(s) of beer with {{$volume}}ml volume for {{$price}}$.</p>
                                <div class="mb-1 text-muted  display-4">Price: {{$price_per_litre}}$ per litre</div>
                                <form class="form-inline my-2 my-md-0" method="post" action={{url('/beer/'.$id)}} >
                                    {{ csrf_field() }}
                                    <input type="submit" value="TEST REST API for this Beer">
                                </form>
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block" src="{{$image}}" alt="Card image cap">
                        </div>
                    </div>
    </div>
    </div>
</div>

@extends('layout.down')

