@extends('layout.up')

<div class="container mt-5">


    <div class="container justify-content-center d-flex align-items-center ">

        <div class="content mt-5">

            @if (count($errors) > 0)
                <div class=" alert alert-danger col-lg-12">
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
            <div class=" container title ">
                <a class="btn btn-info mb-3" href={{ url('brewer') }} role="button">Return to list of brewer</a>
                <div class="col-md-12">
                    <strong class="d-inline-block mb-2 text-secondary display-4">Brewer:</strong>
                    <strong class="d-inline-block mb-2 text-info display-3">{{$brewers->name}}</strong>
                    <form class="form-inline my-2 my-md-0 pb-3" method="post" action={{url('/brewer/'.$id)}} >
                        {{ csrf_field() }}
                        <input type="submit" value="TEST REST API for this Brewer">
                    </form>
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">

                        <table id="Beer" class="order-table table table-striped table-sm">
                            <thead>
                            <tr class="header">
                                <th>Name of beer</th>
                                <th>Type</th>
                                <th>Country</th>
                                <th>Price per litre</th>
                                <th>Link</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($beers as $beer): ?>

                            <tr id='<?php echo $beer->id; ?>' data-type="standard">
                                <td><?php echo $beer->name; ?></td>
                                <td ><?php echo $beer->type; ?>&nbsp;</td>
                                <td><?php echo $beer->country; ?></td>
                                <td><?php echo $beer->price_per_litre; ?></td>

                                <td>                     <a href={{url('/beer/'.$beer->id.'')}}>Show more...</a>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@extends('layout.down')

