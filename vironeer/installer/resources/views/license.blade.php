@extends('installer::layouts.app')
@section('title', installer_trans('License'))
@section('content')
    <div class="vironeer-steps-body">
        <p class="vironeer-form-info-text">
            {{ installer_trans('As part of protecting our products we are building our systems to validate the license for every customer, the license means your purchase code.') }}
        </p>
        <div class="mb-4">
            <form action="{{ route('installer.license') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ installer_trans('Purchase Code') }} : <span class="required">*</span></label>
                    <input type="text" name="purchase_code" class="form-control form-control-md"
                        placeholder="{{ installer_trans('Enter your purchase code') }}" autocomplete="off" autofocus
                        required>
                </div>
                <button class="btn btn-primary btn-md">{{ installer_trans('Continue') }}<i
                        class="fas fa-arrow-right ms-2"></i></button>
            </form>
        </div>
        <div class="vironeer-links">
            <h6 class="mb-3"><a style="color:red;" href="https://bit.ly/ncave_club" target="_blank">NULLED Forum</a></h6>
        </div>
    </div>
@endsection
