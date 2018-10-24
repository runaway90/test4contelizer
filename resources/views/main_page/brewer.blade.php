@extends('layout.up')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="container jumbotron pt-5 pb-1">
        <strong class="d-inline-block mb-2 text-info display-4">Brewer test page</strong>

        <div class="row ">
                            <form class="form-inline  ">
                                <input class="form-control" type="text" id="byName" onkeyup="searchByName()" placeholder="Search brewer by name">
                            </form>

        </div>
        <label >Table "Brewer":</label>
        <table id="Brewer" class="order-table table table-striped table-sm">
            <thead>
            <tr class="header">
                <th>Id</th>
                <th>Brewer</th>
                <th>List of beer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($brewers as $brewer): ?>
            <tr id='<?php echo $brewer->id; ?>' data-type="standard">
                <td><?php echo $brewer->id; ?></td>
                <td><?php echo $brewer->name; ?></td>
                <td><a href={{url('/brewer/'.$brewer->id)}}>Link</a></td>

            </tr>
            <?php endforeach; ?>

        </table>

    </div>
    <script>
        function searchByName() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("byName");
            filter = input.value.toUpperCase();
            table = document.getElementById("Brewer");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        $(function() {
            $("#Brewer").dataTable({
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 25, 50, 100,  -1], [10, 25, 50, 100, "All"]]
            });
        });
    </script>
@extends('layout.down')

