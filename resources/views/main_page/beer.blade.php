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




<div class="container jumbotron pt-5 pb-5">
    <strong class="d-inline-block mb-2 text-info display-4">Beer test page</strong>
    <nav>
        <div class="nav nav-pills nav-fill nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About table</a>
            <a class="nav-item nav-link" id="nav-search-tab" data-toggle="tab" href="#nav-search" role="tab" aria-controls="nav-contact" aria-selected="false">Search</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <strong class="d-inline-block text-secondary display-5 mt-3 mb-3">
                Description. This is table consist from six columns: name, brewer, type, country, price per litre and link to beer page`s information.
                If You want to search something, please click on "Search"
            </strong>
        </div>
        <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
            <div class="container ml-2 mb-2">
                <div class="mt-3 container ">
                    <div class="row">
                        <form class="form-inline  col-lg-6">
                            <strong class="d-inline-block text-info display-5">Filter by name</strong>

                            <input class="form-control" type="text" id="byName" onkeyup="searchByName()" placeholder="Search by name of beer">
                        </form>
                        <form class="form-inline col-lg-6">
                            <strong class="d-inline-block text-info display-5">Filter by country</strong>

                            <input class="form-control" type="text" id="byCountry" onkeyup="searchByCountry()" placeholder="Search by country">
                        </form>
                    </div>

                    <div class="row">

                        <strong class="d-inline-block text-info display-5">Dropdown-filter by type of beer</strong>

                        <select  class="dropdown  select-table-filter" data-table="order-table">
                            <option value="">All types of beer</option>
                            <?php foreach($types as $type): ?>
                            <option value="<?php echo $type?>&nbsp;"><?php echo $type; ?>&nbsp;</option>
                            <?php endforeach; ?>
                        </select>

                        {{--<form class="form-inline ">--}}
                        {{--<input class="form-control" type="text" id="byPrice" onkeyup="searchByPrice()" placeholder="Price //TO DO">--}}
                        {{--</form>--}}

                    </div>




                </div>
            </div>
        </div>
    </div>

    <label >Table "Beer":</label>

            <table id="Beer" class="order-table table paginated table-striped table-sm">
        <thead>
        <tr class="header">
            <th>Name of beer</th>
            <th>Brewer</th>
            <th>Type


            </th>
            <th>Country</th>
            <th>Price per litre</th>
            <th>About >></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($beers as $beer): ?>

        <tr id='<?php echo $beer->id; ?>' data-type="standard">
            <td><?php echo $beer->name; ?></td>
            <td><?php echo $beer->brewer->name; ?></td>
            <td ><?php echo $beer->type; ?>&nbsp;</td>
            <td><?php echo $beer->country; ?></td>
            <td><?php echo $beer->price_per_litre; ?></td>

            <td>                     <a href={{url('/beer/'.$beer->id.'')}}>Link</a>
            </td>

        </tr>
        <?php endforeach; ?>

    </table>
    <br />

</div>
<script>
    function searchByName() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("byName");
        filter = input.value.toUpperCase();
        table = document.getElementById("Beer");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchByCountry() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("byCountry");
        filter = input.value.toUpperCase();
        table = document.getElementById("Beer");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchByPrice() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("byPrice");
        filter = input.value.toUpperCase();
        table = document.getElementById("Beer");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    (function(document) {
        'use strict';

        var LightTableFilter = (function(Arr) {
            var _select;

            function _onSelectEvent(e) {
                _select = e.target;
                var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
                Arr.forEach.call(tables, function(table) {
                    Arr.forEach.call(table.tBodies, function(tbody) {
                        Arr.forEach.call(tbody.rows, _filterSelect);
                    });
                });
            }

            // function _filter(row) {
            //
            //     var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            //     row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
            //
            // }

            function _filterSelect(row) {

                var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
                row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

            }

            return {
                init: function() {
                    var selects = document.getElementsByClassName('select-table-filter');
                    Arr.forEach.call(selects, function(select) {
                        select.onchange  = _onSelectEvent;
                    });
                }
            };
        })(Array.prototype);

        document.addEventListener('readystatechange', function() {
            if (document.readyState === 'complete') {
                LightTableFilter.init();
            }
        });

    })(document);
//
//     $('td', 'table').each(function(i) {
//         $(this).text(i+1);
//     });
//
//
//
//     $('table.paginated').each(function() {
//         var currentPage = 0;
//         var numPerPage = 10;
//         var $table = $(this);
//         $table.bind('repaginate', function() {
//             $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
//         });
//         $table.trigger('repaginate');
//         var numRows = $table.find('tbody tr').length;
//         var numPages = Math.ceil(numRows / numPerPage);
//         var $pager = $('<div class="pager"></div>');
//         for (var page = 0; page < numPages; page++) {
//             $('<span class="page-number"></span>').text(page + 1).bind('click', {
//                 newPage: page
//             }, function(event) {
//                 currentPage = event.data['newPage'];
//                 $table.trigger('repaginate');
//                 $(this).addClass('active').siblings().removeClass('active');
//             }).appendTo($pager).addClass('clickable');
//         }
//         $pager.insertBefore($table).find('span.page-number:first').addClass('active');
//     });
//
// $('#Beer').paginate({ limit: 10 });

    $('#Beer').paginate({
        limit: 10, // 10 elements per page
        initialPage: 1, // Start on second page
        previous: true, // Show previous button
        previousText: 'Previous page', // Change previous button text
        next: true, // Show previous button
        nextText: 'Next page', // Change next button text
        first: true, // Show first button
        firstText: 'First', // Change first button text
        last: true, // Show last button
        lastText: 'Last', // Change last button text
        optional: false, // Always show the navigation menu
        onCreate: function(obj) { console.log('Pagination done!'); }, // `onCreate` callback
        onSelect: function(obj, i) { console.log('Page ' + i + ' selected!'); }, // `onSelect` callback
        childrenSelector: 'tbody > tr.ugly', // Paginate the rows with the `ugly` class
        navigationWrapper: $('div#myNavWrapper'), // Append the navigation menu to the `#myNavWrapper` div
        navigationClass: 'my-page-navigation', // New css class added to the navigation menu
        pageToText: function(i) { return (i + 1).toString(16); } // Page numbers will be shown on hexadecimal notation
    });
</script>
@extends('layout.down')

