@bootstrap
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/fontawesome/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/simplebar/simplebar.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatable/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/vironeer/counter-cards.min.css') }}">
@stack('styles_libs')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/toggle-master/bootstrap-toggle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/vironeer/toastr/css/vironeer-toastr.min.css') }}">
@adminColors
<link rel="stylesheet" href="{{ asset('assets/vendor/admin/css/app.css') }}">
@if (getDirection() == 'rtl')
<link rel="stylesheet" href="{{ asset('assets/vendor/admin/css/app.rtl.css') }}">
@endif
@adminCustomStyle
@stack('styles')
