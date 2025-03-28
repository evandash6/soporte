@extends('admin.layouts.form')
@section('title', admin_trans('Custom CSS'))
@section('content')
    <div class="card">
        <div class="card-header">
            {{ admin_trans('Custom CSS') }}
        </div>
        <div class="card-body p-0">
            <form id="vironeer-submited-form" action="{{ route('admin.extra.css') }}" method="POST">
                @csrf
                <textarea name="custom_css" id="css-editor" class="form-control" rows="20">{{ $customCssFile }}</textarea>
            </form>
        </div>
    </div>
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/codemirror/codemirror.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/codemirror/monokai.min.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/codemirror/codemirror.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/codemirror/css.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/codemirror/sublime.min.js') }}"></script>
    @endpush
@endsection
