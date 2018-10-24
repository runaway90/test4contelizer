@extends('layout.up')

<div class=" text-center pb-5">
    <div class="  container">
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

            <main role="main" class=" pt-5 inner cover">
                    <h1 class="cover-heading">Test application for CONTELIZER</h1>
                    <p class="lead text-info">Application that imports beer data from remote API
                        (http://ontariobeerapi.ca/) and also is a REST API for authentication users.
                    </p>
                    <p class="lead">Stages for local use:
                    </p>
                    <p class="lead">
                        <ul class="list-group">
                        <li class="list-group-item">Create directory in You local computer. Enter in this directory.</li>
                        <li class="list-group-item">Clone project from git. Enter in this directory. .</li>
                        <li class="list-group-item">Run commands "composer install" and "cp .env.example .env"(for make file .env).</li>
                        <li class="list-group-item">Change permission to all repository and files in project for You local user(chown)</li>
                        <li class="list-group-item">Create new database(for example in MySQL). Add database info in file ".env", like as:
                            <h6 class="alert-success"><br>DB_CONNECTION=mysql
                                    <br>DB_HOST=127.0.0.1
                                    <br>DB_PORT=3306
                                    <br>DB_DATABASE={db_name}
                                    <br>DB_USERNAME={user}
                                    <br>DB_PASSWORD={password}</h6>
                                </li>
                        <li class="list-group-item">Run command "php artisan key:generate"</li>
                        <li class="list-group-item">Run commands " php artisan migration"(for create tables) and "php artisan db:seed"(for import data from API beer to tables)</li>
                        <li class="list-group-item">Run application "php artisan serve" and open browser on route "http://127.0.0.1:8000/"</li>
                        </ul>
                    </p>

                <p class="lead">Routes and functional controllers
                </p>
                <p class="lead">
                <ul class="list-group">
                    <li class="list-group-item">get('/')</li>

                    <li class="list-group-item">get('login', 'Auth\LoginController@showLoginForm')</li>
                    <li class="list-group-item">post('login', 'Auth\LoginController@login')</li>
                    <li class="list-group-item">post('logout', 'Auth\LoginController@logout')</li>

                    <li class="list-group-item">get('register', 'Auth\RegisterController@create')</li>
                    <li class="list-group-item">post('register', 'Auth\RegisterController@store')</li>

                    <li class="list-group-item">get('beer', 'BeerPageController@get')->name('beer')</li>
                    <li class="list-group-item">get('beer/{beer_id}', 'BeerPageController@beerInfo')</li>

                    <li class="list-group-item">post('beer', 'BeerPageController@post')</li>
                    <li class="list-group-item">post('beer/{beer_id}', 'BeerPageController@postBeerInfo')</li>


                    <li class="list-group-item">get('brewer', 'BrewerPageController@get')</li>
                    <li class="list-group-item">get('brewer/{brewer_id}', 'BrewerPageController@showBrewerBeer')</li>

                    <li class="list-group-item">post('brewer', 'BrewerPageController@post')</li>
                    <li class="list-group-item">post('brewer/{brewer_id}', 'BrewerPageController@postShowBrewerBeer')</li>

                </ul>
                </p>
            </main>

        </div>
    </div>
</div>

@extends('layout.down')

