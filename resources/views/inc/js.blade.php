<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350);
    });

</script>
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PLUGINS -->
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<!-- END PLUGINS -->

<!-- BEGIN CUSTOM SCRIPT -->
@stack('scripts')
<livewire:scripts />
<!-- END CUSTOM SCRIPT -->
