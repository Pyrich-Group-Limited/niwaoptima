<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commonModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>


<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"> </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<script>
    // Function to handle link click
 function saveData(linkUrl) {
     var userId = "{{ auth()->id() }}"; // Assuming Laravel's auth()->id() returns the user ID
     var csrfToken = "{{ csrf_token() }}"; // Get the CSRF token
     var fullUrl = "{{ asset('') }}" + linkUrl; // Full URL using the asset() function

     
     // Send an AJAX request to store the clicked link for the user
     $.ajax({
         url: "{{ route('store_clicked_link') }}",
         method: "POST",
         data: {
             _token: csrfToken, // Include CSRF token in the data payload
             userId: userId,
             linkUrl: linkUrl
         },
         success: function(response) {
             // Do something after successfully storing the clicked link
             console.log("Link clicked and stored for user " + userId);
             // Optionally, you can add a class to the clicked link
             //$(this).addClass("clicked-link");
             $(".document-link[href='" + fullUrl + "']").addClass("clicked-link");
         },
         error: function(xhr, status, error) {
             console.error("Error storing clicked link: " + error);
         }
     });
 };
     
 </script>   
 
 <script>
     $(document).ready(function() {
         // Assuming you have some way to identify the user, like user ID
         var userId = "{{ auth()->id() }}"; // Assuming Laravel's auth()->id() returns the user ID
         
 
         // Fetch existing clicked links for the user
         $.ajax({
             url: "{{ route('fetch_clicked_links') }}",
             method: "GET",
             data: {userId: userId},
             success: function(response) {
                 //alert(JSON.stringify(response));
                 // Add the 'clicked-link' class to clicked links
                 response.forEach(function(link) {
                    var fullUrl = "{{ asset('') }}" + link.link_url; // Full URL using the asset() function

                     $(".document-link[href='" + fullUrl + "']").addClass("clicked-link");
                 });
             },
             error: function(xhr, status, error) {
                 console.error("Error fetching clicked links: " + error);
             }
         });
     });
 </script>
 
<script>
    "use strict";

    function show_toastr(type, message) {

        var f = document.getElementById('liveToast');
        var a = new bootstrap.Toast(f).show();
        if (type == 'success') {
            $('#liveToast').addClass('bg-primary');
        } else {
            $('#liveToast').addClass('bg-danger');
        }
        $('#liveToast .toast-body').html(message);
    }
    $(document).on('click', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]',
        function() {

            var data = {};
            var title1 = $(this).data("title");

            var title2 = $(this).data("bs-original-title");
            var title3 = $(this).data("original-title");
            var title = (title1 != undefined) ? title1 : title2;
            var title = (title != undefined) ? title : title3;

            $('.modal-dialog').removeClass('modal-xl');
            var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');

            var url = $(this).data('url');
            $("#commonModal .modal-title").html(title);
            $("#commonModal .modal-dialog").addClass('modal-' + size);

            if ($('#vc_name_hidden').length > 0) {
                data['vc_name'] = $('#vc_name_hidden').val();
            }
            if ($('#warehouse_name_hidden').length > 0) {
                data['warehouse_name'] = $('#warehouse_name_hidden').val();
            }
            if ($('#discount_hidden').length > 0) {
                data['discount'] = $('#discount_hidden').val();
            }
            $.ajax({
                url: url,
                data: data,
                success: function(data) {
                    $('#commonModal .body').html(data);
                    $("#commonModal").modal('show');
                    // daterange_set();
                    taskCheckbox();
                    common_bind("#commonModal");
                    commonLoader();

                },
                error: function(data) {
                    data = data.responseJSON;
                    show_toastr('Error', data.error, 'error')
                }
            });

        });

    $(document).on("click", '.bs-pass-para', function() {
        var form = $(this).closest("form");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "This action can not be undone. Do you want to continue?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                form.submit();

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {}
        })
    });
</script>

<script>
    function addCommas(num) {
        var number = parseFloat(num).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        return ((site_currency_symbol_position == "pre") ? site_currency_symbol : '') + number + ((
            site_currency_symbol_position == "post") ? site_currency_symbol : '');
    }



    // PLUS MINUS QUANTITY JS
    function wcqib_refresh_quantity_increments() {
        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
            var c = jQuery(b);
            c.addClass("buttons_added"),
                c.children().first().before('<input type="button" value="-" class="minus" />'),
                c.children().last().after('<input type="button" value="+" class="plus" />')
        })
    }

    String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).ready(function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("updated_wc_div", function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("click", ".plus, .minus", function() {
        var a = jQuery(this).closest(".quantity").find('input[name="quantity"], input[name="quantity[]"]'),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d ||
            (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this)
            .is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d &&
            b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger(
                "change")
    });

    $(document).on('click', 'input[name="quantity"], input[name="quantity[]"]', function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });




    /* function select2() {
        if ($(".select2").length > 0) {
            $($(".select2")).each(function (index, element) {
                var id = $(element).attr('id');
                var multipleCancelButton = new Choices(
                    '#' + id, {
                        removeItemButton: true,
                    }
                );
            });

        }

    } */
    function postAjax(url, data, cb) {
        var token = $('meta[name="csrf-token"]').attr('content');
        var jdata = {
            _token: token
        };

        for (var k in data) {
            jdata[k] = data[k];
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: jdata,
            success: function(data) {
                if (typeof(data) === 'object') {
                    cb(data);
                } else {
                    cb(data);
                }
            },
        });
    }

    function deleteAjax(url, data, cb) {
        var token = $('meta[name="csrf-token"]').attr('content');
        var jdata = {
            _token: token
        };

        for (var k in data) {
            jdata[k] = data[k];
        }

        $.ajax({
            type: 'DELETE',
            url: url,
            data: jdata,
            success: function(data) {
                if (typeof(data) === 'object') {
                    cb(data);
                } else {
                    cb(data);
                }
            },
        });
    }
</script>

@if ($message = Session::get('success'))
    <script>
        show_toastr('success', '{!! $message !!}');
    </script>
@endif
@if ($message = Session::get('error'))
    <script>
        show_toastr('error', '{!! $message !!}');
    </script>
@endif

<!--begin::Footer-->
<div id="kt_app_footer" class="app-footer fixed-bottom">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">{{ now()->format('Y') }}&copy;</span>
            <a href="{{ route('home') }}" class="text-gray-800 text-hover-primary">NIWA</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="{{ route('home') }}" class="menu-link px-2">About</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Footer container-->
</div>
<!--end::Footer-->
