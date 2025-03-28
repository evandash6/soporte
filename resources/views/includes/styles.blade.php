@bootstrap
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/fontawesome/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/vironeer/toastr/css/vironeer-toastr.min.css') }}">
@stack('styles_libs')
@frontendColors
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
@if (getDirection() == 'rtl')
    <link rel="stylesheet" href="{{ asset('assets/css/app.rtl.css') }}">
@endif
@stack('styles')
@frontendCustomStyle
