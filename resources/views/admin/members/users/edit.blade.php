@extends('admin.layouts.form')
@section('section', admin_trans('Members'))
@section('title', admin_trans('User') . ' | ' . $user->getName())
@section('back', route('admin.members.users.index'))
@section('container', 'container-max-lg')
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.members.users.update', $user->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card custom-card mb-3">
            <div class="card-header">{{ admin_trans('Actions') }}</div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <label class="form-label">{{ admin_trans('Account status') }} </label>
                        <input type="checkbox" name="status" data-toggle="toggle" data-on="{{ admin_trans('Active') }}"
                            data-off="{{ admin_trans('Banned') }}" {{ $user->isActive() ? 'checked' : '' }}>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">{{ admin_trans('Email status') }} </label>
                        <input type="checkbox" name="email_status" data-toggle="toggle"
                            data-on="{{ admin_trans('Verified') }}" data-off="{{ admin_trans('Unverified') }}"
                            {{ $user->isVerified() ? 'checked' : '' }}>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">{{ admin_trans('Two-Factor Authentication') }} </label>
                        <input id="2faCheckbox" type="checkbox" name="google2fa_status" data-toggle="toggle"
                            data-on="{{ admin_trans('Active') }}" data-off="{{ admin_trans('Disabled') }}"
                            {{ $user->has2fa() ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="card custom-card">
            <div class="card-header">{{ admin_trans('Account details') }}</div>
            <div class="card-body p-4">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <img id="filePreview" src="{{ $user->getAvatar() }}" alt="{{ $user->getName() }}"
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
                            value="{{ $user->firstname }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Last Name') }} </label>
                        <input type="lastname" name="lastname" class="form-control form-control-lg"
                            value="{{ $user->lastname }}">
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('E-mail Address') }} </label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control form-control-lg"
                                value="{{ $user->email }}" required>
                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                data-bs-target="#sendMailModal"><i
                                    class="far fa-paper-plane me-2"></i>{{ admin_trans('Send Email') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="sendMailModal" tabindex="-1" aria-labelledby="sendMailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMailModalLabel">{{ admin_trans('Send Mail to ') }}{{ $user->email }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.members.users.sendmail', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ admin_trans('Subject') }} </label>
                                    <input type="subject" name="subject" class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ admin_trans('Reply to') }} </label>
                                    <input type="email" name="reply_to" class="form-control form-control-lg"
                                        value="{{ auth()->user()->email }}" required>
                                </div>
                            </div>
                        </div>
                        <textarea name="message" rows="10" class="ckeditor"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-lg">{{ admin_trans('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.includes.ckeditor')
@endsection
