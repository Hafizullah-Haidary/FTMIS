<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 rtl -->

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!--jQuery-->
<script src="{{ asset('dist/js/persian-date.min.js') }}"></script>
<script src="{{ asset('dist/js/persian-datepicker.min.js') }}"></script>
{{-- <script src="{{ asset('dist/js/select2.min.js') }}"></script>
<script src="{{ asset('dist/js/select2.full.js') }}"></script>
<script src="{{ asset('dist/js/select2.full.min.js') }}"></script> --}}
<script src="{{ asset('bootstraprtl/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('select2/js/select2.min.js') }}"></script>
<script src="{{ asset('select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('select2/js/select2.full.js') }}"></script>
<script src="{{ asset('select2/js/select2.js') }}"></script>
{{-- <script src="{{ asset('resources/js/main.js') }}"></script>--}}

<script>
    $(document).ready(function() {
        $("#datepicker,#datepicker1,#datepicker2,#datepicker3,#datepicker4").persianDatepicker();
    });
</script>
<script type="text/javascript">
    $("#select2, #select, #search, #selectsearch, #selecttwo").select2();
</script>
