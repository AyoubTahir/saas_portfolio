<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('assets/admin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('assets/admin/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets/admin/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN SWEETALERT SCRIPTS -->
<script src="{{ asset('assets/admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
@include('admin.messages._success_message')
@include('admin.messages._errors_message')
<!-- END SWEETALERT SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@stack('page_scripts')
<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
