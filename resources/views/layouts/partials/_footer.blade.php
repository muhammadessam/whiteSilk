<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admins/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('admins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('admins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admins/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admins/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<script src="{{asset('admins/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('admins/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admins/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
<script src="{{asset('admins/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('admins/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
<script src="{{asset('admins/plugins/dataTables.select.min.js')}}"></script>
<script src="{{asset('admins/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('admins/plugins/sweetalerts/custom-sweetalert.js')}}"></script>

<script src="{{asset('admins/assets/js/custom.js')}}"></script>

@yield('javascript')
