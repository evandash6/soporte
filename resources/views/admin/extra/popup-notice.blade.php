@extends('admin.layouts.form')
@section('title', admin_trans('PopUp Notice'))
@section('container', 'container-max-lg')
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.extra.notice') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body my-2">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_trans('Status') }} </label>
                            <input type="checkbox" name="popup[status]" data-toggle="toggle"
                                {{ $settings->popup->status ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="mb-0">
                    <label class="form-label">{{ admin_trans('PopUp description') }} </label>
                    <textarea name="popup[body]" rows="10" class="form-control ckeditor">{{ $settings->popup->body }}</textarea>
                </div>
            </div>
        </div>
    </form>
    @include('admin.includes.ckeditor')
@endsection
