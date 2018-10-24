<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
    <div class="container">

        <h6 class="container d-inline-block mb-2 text-info">Beer test page`s down navigation</h6>
        @if (Route::current()->getName() == 'beer')
            <form class="form-inline my-2 my-md-0" method="post" action={{route('beer')}} >
                {{ csrf_field() }}
                <input type="submit" value="TEST REST API for Beer">
            </form>
        @endif
        @if (Route::current()->getName() == 'brewer')
            <form class="form-inline my-2 my-md-0" method="post" action={{route('brewer')}} >
                {{ csrf_field() }}
                <input type="submit" value="TEST REST API for Brewer">
            </form>
        @endif
    </div>

</nav>
</body>
</html>