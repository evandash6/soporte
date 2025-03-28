@extends('admin.layouts.form')
@section('section', admin_trans('Navbar menu'))
@section('title', admin_trans('New link'))
@section('container', 'container-max-lg')
@section('back', route('admin.navbar-menu.index'))
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <form id="vironeer-submited-form" action="{{ route('admin.navbar-menu.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ admin_trans('Name') }} </label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">{{ admin_trans('Link') }} </label>
                    <input type="link" name="link" class="form-control" placeholder="/" required>
                </div>
            </form>
        </div>
    </div>
@endsection
