@extends('admin.layouts.form')
@section('section', admin_trans('Departments'))
@section('title', $department->name)
@section('container', 'container-max-lg')
@section('back', route('admin.departments.index'))
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card p-2">
            <div class="card-body">
                <div class="col-lg-4 mb-3">
                    <label class="form-label">{{ admin_trans('Status') }} </label>
                    <input type="checkbox" name="status" data-toggle="toggle" {{ $department->status ? 'checked' : '' }}>
                </div>
                <div class="mb-0">
                    <label class="form-label">{{ admin_trans('Name') }} </label>
                    <input type="text" name="name" class="form-control form-control-lg"
                        value="{{ $department->name }}" placeholder="{{ admin_trans('Enter department name') }}" required />
                </div>
            </div>
        </div>
    </form>
@endsection
