@extends('layouts.auth')
@section('title', translate('Verify Your Email Address', 'auth'))
@section('sign-size', 'sign-card-lg')
@section('content')
    <div class="sign sign-lg">
        <div class="card-v">
            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="170" height="170" viewBox="0 0 570 511.67482"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                        d="M879.99927,389.83741a.99678.99678,0,0,1-.5708-.1792L602.86963,197.05469a5.01548,5.01548,0,0,0-5.72852.00977L322.57434,389.65626a1.00019,1.00019,0,0,1-1.14868-1.6377l274.567-192.5918a7.02216,7.02216,0,0,1,8.02-.01318l276.55883,192.603a1.00019,1.00019,0,0,1-.57226,1.8208Z"
                        transform="translate(-315 -194.16259)" fill="#3f3d56" />
                    <polygon
                        points="23.264 202.502 285.276 8.319 549.276 216.319 298.776 364.819 162.776 333.819 23.264 202.502"
                        fill="#e6e6e6" />
                    <path
                        d="M489.25553,650.70367H359.81522a6.04737,6.04737,0,1,1,0-12.09473H489.25553a6.04737,6.04737,0,1,1,0,12.09473Z"
                        transform="translate(-315 -194.16259)" fill="{{ $settings->colors->primary_color }}" />
                    <path
                        d="M406.25553,624.70367H359.81522a6.04737,6.04737,0,1,1,0-12.09473h46.44031a6.04737,6.04737,0,1,1,0,12.09473Z"
                        transform="translate(-315 -194.16259)" fill="{{ $settings->colors->primary_color }}" />
                    <path
                        d="M603.96016,504.82207a7.56366,7.56366,0,0,1-2.86914-.562L439.5002,437.21123v-209.874a7.00817,7.00817,0,0,1,7-7h310a7.00818,7.00818,0,0,1,7,7v210.0205l-.30371.12989L606.91622,504.22734A7.61624,7.61624,0,0,1,603.96016,504.82207Z"
                        transform="translate(-315 -194.16259)" fill="#fff" />
                    <path
                        d="M603.96016,505.32158a8.07177,8.07177,0,0,1-3.05957-.59863L439.0002,437.54521v-210.208a7.50851,7.50851,0,0,1,7.5-7.5h310a7.50851,7.50851,0,0,1,7.5,7.5V437.68779l-156.8877,66.999A8.10957,8.10957,0,0,1,603.96016,505.32158Zm-162.96-69.1123,160.66309,66.66455a6.1182,6.1182,0,0,0,4.668-.02784l155.669-66.47851V227.33721a5.50653,5.50653,0,0,0-5.5-5.5h-310a5.50653,5.50653,0,0,0-5.5,5.5Z"
                        transform="translate(-315 -194.16259)" fill="#3f3d56" />
                    <path
                        d="M878,387.83741h-.2002L763,436.85743l-157.06982,67.07a5.06614,5.06614,0,0,1-3.88038.02L440,436.71741l-117.62012-48.8-.17968-.08H322a7.00778,7.00778,0,0,0-7,7v304a7.00779,7.00779,0,0,0,7,7H878a7.00779,7.00779,0,0,0,7-7v-304A7.00778,7.00778,0,0,0,878,387.83741Zm5,311a5.002,5.002,0,0,1-5,5H322a5.002,5.002,0,0,1-5-5v-304a5.01106,5.01106,0,0,1,4.81006-5L440,438.87739l161.28027,66.92a7.12081,7.12081,0,0,0,5.43994-.03L763,439.02741l115.2002-49.19a5.01621,5.01621,0,0,1,4.7998,5Z"
                        transform="translate(-315 -194.16259)" fill="#3f3d56" />
                    <path
                        d="M602.345,445.30958a27.49862,27.49862,0,0,1-16.5459-5.4961l-.2959-.22217-62.311-47.70752a27.68337,27.68337,0,1,1,33.67407-43.94921l40.36035,30.94775,95.37793-124.38672a27.68235,27.68235,0,0,1,38.81323-5.12353l-.593.80517.6084-.79346a27.71447,27.71447,0,0,1,5.12353,38.81348L624.36938,434.50586A27.69447,27.69447,0,0,1,602.345,445.30958Z"
                        transform="translate(-315 -194.16259)" fill="{{ $settings->colors->primary_color }}" />
                </svg>
            </div>
            <div>
                <p class="h3 mb-3">{{ translate('Verify Your Email Address', 'auth') }}</p>
                <p class="mb-3">
                    {{ translate('email verification description', 'auth') }}
                </p>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-md me-2">{{ translate('Resend', 'auth') }}</button>
                </form>
                <button class="btn btn-outline-primary btn-md" data-bs-toggle="modal"
                    data-bs-target="#emailModal">{{ translate('Change Email', 'auth') }}</button>
            </div>
        </div>
        <div class="modal fade" id="emailModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="modal-header border-0 p-0 mb-3">
                        <h5 class="modal-title" id="createFolderModalLabel">{{ translate('Email address', 'forms') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('change.email') }}" method="POST">
                        @csrf
                        <div class="modal-body p-0">
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control form-control-md"
                                    placeholder="{{ translate('Email address', 'forms') }}"
                                    value="{{ auth()->user()->email }}" required>
                            </div>
                            <div class="row justify-content-center g-3">
                                <div class="col-12 col-lg">
                                    <button type="button" class="btn btn-outline-primary btn-md w-100"
                                        data-bs-dismiss="modal">{{ translate('Close') }}</button>
                                </div>
                                <div class="col-12 col-lg">
                                    <button type="submit"
                                        class="btn btn-primary btn-md w-100 me-2">{{ translate('Save', 'auth') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
