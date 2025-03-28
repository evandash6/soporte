@include('admin.includes.config')
@stack('top_scripts')
<script src="{{ asset('assets/vendor/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/simplebar/simplebar.min.js') }}"></script>
@stack('scripts_libs')
<script src="{{ asset('assets/vendor/libs/toggle-master/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatables.jq.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/vironeer/toastr/js/vironeer-toastr.min.js') }}"></script>
<script src="{{ asset('assets/vendor/admin/js/app.js') }}"></script>
@toastrRender
@stack('scripts')
