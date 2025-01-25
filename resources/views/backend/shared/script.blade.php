 <!-- jQuery -->
 <script src="{{ asset('admin_template/plugins/jquery/jquery.min.js') }}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('admin_template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('admin_template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- ChartJS -->
 <script src="{{ asset('admin_template/plugins/chart.js/Chart.min.js ') }}"></script>
 <!-- Sparkline -->
 <script src="{{ asset('admin_template/plugins/sparklines/sparkline.js') }}"></script>
 <!-- JQVMap -->
 <script src="{{ asset('admin_template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('admin_template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('admin_template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('admin_template/plugins/moment/moment.min.js') }}"></script>
 <script src="{{ asset('admin_template/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('admin_template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
 <!-- Summernote -->
 <script src="{{ asset('admin_template/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('admin_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('admin_template/dist/js/adminlte.js') }}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('admin_template/dist/js/pages/dashboard.js') }}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('admin_template/dist/js/demo.js') }}"></script>
 {{-- datatable --}}
 <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
 
 {{-- toster --}}
 <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 <!-- datatable -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

 <!-- DataTables Initialization -->
 <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
 </script>
 
 {!! Toastr::message() !!}