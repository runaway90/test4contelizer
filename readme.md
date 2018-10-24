<main role="main" class=" pt-5 inner cover">
                    <h1 class="cover-heading">Test application for STS</h1>
                    <p class="lead text-info">Application that imports beer data from remote API
                        (http://ontariobeerapi.ca/) and also is a REST API for authentication users.
                    </p>
                    <p class="lead">Stages for local use:
                    </p>
                    <p class="lead">
                        <ul class="list-group">
                                <li class="list-group-item">Create directory in You local computer. Enter in this directory.</li>
                                                        <li class="list-group-item">Clone project from git."git clone https://github.com/runaway90/STS_test_app_with_ontariobeerapi.git". Enter in this directory.</li>
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
                    <p class="lead">Testing photos</p>
                                           # <img src="/resources/photo/t1.png" alt="Test">
                                           # <img src="/resources/photo/t2.png" alt="Test">
                                           # <img src="/resources/photo/t3.png" alt="Test">                
                                           # <img src="/resources/photo/t4.png" alt="Test">
                                           # <img src="/resources/photo/t5.png" alt="Test">
                                           # <img src="/resources/photo/t6.png" alt="Test">
                                                                    <p class="lead">Thank You for attention!</p>
                                                      </main>
//TODO 1)filter for price per litre 2)pagination of tables 3)docker 4)TDD 5)more responsive login/register validation