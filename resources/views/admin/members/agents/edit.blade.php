@extends('admin.layouts.form')
@section('section', admin_trans('Members'))
@section('title', admin_trans('Agent') . ' | ' . $agent->getName())
@section('back', route('admin.members.agents.index'))
@section('container', 'container-max-lg')
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.members.agents.update', $agent->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card custom-card mb-3">
            <div class="card-header">{{ admin_trans('Actions') }}</div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <label class="form-label">{{ admin_trans('Two-Factor Authentication') }} </label>
                        <input id="2faCheckbox" type="checkbox" name="google2fa_status" data-toggle="toggle"
                            data-on="{{ admin_trans('Active') }}" data-off="{{ admin_trans('Disabled') }}"
                            {{ $agent->has2fa() ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="card custom-card">
            <div class="card-header">{{ admin_trans('Account details') }}</div>
            <div class="card-body p-4">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <img id="filePreview" src="{{ $agent->getAvatar() }}" alt="{{ $agent->getName() }}"
                            class="rounded-circle border" width="80px" height="80px">
                    </div>
                    <div class="col-auto">
                        <button id="selectFileBtn" type="button" class="btn btn-secondary btn-sm"><i
                                class="fas fa-camera me-2"></i>{{ admin_trans('Choose Image') }}</button>
                        <input id="selectedFileInput" type="file" name="avatar"
                            accept="image/png, image/jpg, image/jpeg" hidden>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('First Name') }} </label>
                        <input type="firstname" name="firstname" class="form-control form-control-lg"
                            value="{{ $agent->firstname }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Last Name') }} </label>
                        <input type="lastname" name="lastname" class="form-control form-control-lg"
                            value="{{ $agent->lastname }}">
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('E-mail Address') }} </label>
                        <input type="email" name="email" class="form-control form-control-lg"
                            value="{{ $agent->email }}" required>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('Departments') }} </label>
                        <select name="departments[]" class="form-select form-select-lg selectpicker" data-live-search="true"
                            multiple title="{{ admin_trans('Choose') }}">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ in_array($department->id, $agentDepartmentIds) ? 'selected' : '' }}>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.js') }}"></script>
    @endpush
@endsection
