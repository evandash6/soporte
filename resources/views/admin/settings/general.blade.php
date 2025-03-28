@extends('admin.layouts.form')
@section('title', admin_trans('General'))
@section('section', admin_trans('Settings'))
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.settings.general.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('General Information') }}
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Site Name') }} </label>
                        <input type="text" name="general[site_name]" class="form-control"
                            value="{{ $settings->general->site_name }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Site URL') }} </label>
                        <input type="text" name="general[site_url]" class="form-control"
                            value="{{ $settings->general->site_url }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Date format') }} </label>
                        <select name="general[date_format]" class="form-select  selectpicker" data-live-search="true"
                            title="{{ admin_trans('Date format') }}">
                            @foreach (\App\Models\Settings::dateFormats() as $formatKey => $formatValue)
                                <option value="{{ $formatKey }}"
                                    {{ $formatKey == $settings->general->date_format ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::now()->format($formatValue) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Timezone') }} </label>
                        <select name="general[timezone]" class="form-select selectpicker" data-live-search="true"
                            title="{{ admin_trans('Timezone') }}">
                            @foreach (\App\Models\Settings::timezones() as $timezoneKey => $timezoneValue)
                                <option value="{{ $timezoneKey }}"
                                    {{ $timezoneKey == $settings->general->timezone ? 'selected' : '' }}>
                                    {{ $timezoneValue }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Contact email') }} </label>
                        <input type="text" name="general[contact_email]" class="form-control"
                            value="{{ $settings->general->contact_email }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Terms of service link') }} </label>
                        <input type="text" name="general[terms_link]" class="form-control"
                            value="{{ $settings->general->terms_link }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('SEO Configuration') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ admin_trans('Home title') }} </label>
                    <input type="text" name="seo[title]" class="form-control"
                        placeholder="{{ admin_trans('Title must be within 70 Characters') }}"
                        value="{{ $settings->seo->title }}">
                </div>
                <div class="row g-3">
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Description') }} </label>
                        <textarea name="seo[description]" class="form-control" rows="6"
                            placeholder="{{ admin_trans('Description must be within 150 Characters') }}">{{ $settings->seo->description }}</textarea>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Site keywords') }} </label>
                        <textarea id="keywords" name="seo[keywords]" class="form-control" rows="6"
                            placeholder="{{ admin_trans('keyword1, keyword2, keyword3') }}">{{ $settings->seo->keywords }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('Tickets') }}
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('Allowed file types') }}</label>
                        <input type="text" name="tickets[file_types]" class="tagsInput form-control"
                            placeholder="{{ admin_trans('Enter the file extension') }}"
                            value="{{ $settings->tickets->file_types }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Max upload files') }}</label>
                        <input type="number" name="tickets[max_files]" class="form-control" placeholder="0"
                            value="{{ $settings->tickets->max_files }}" min="1" max="1000" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Max size per file') }}</label>
                        <div class="input-group">
                            <input type="number" name="tickets[max_file_size]" class="form-control" placeholder="0"
                                value="{{ $settings->tickets->max_file_size }}" min="1" required>
                            <span class="input-group-text"><strong>{{ admin_trans('MB') }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('Colors') }}
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @foreach ($settings->colors as $key => $value)
                        <div class="col-lg-6">
                            <label class="form-label">{{ ucfirst(str($key)->replace('_', ' ')) }} </label>
                            <div class="colorpicker">
                                <input type="text" name="colors[{{ $key }}]" class="form-control coloris"
                                    value="{{ $value }}" required>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('Actions') }}
            </div>
            <div class="card-body">
                <div class="row g-3 mb-2">
                    <div class="col-xl-4">
                        <label class="form-label">{{ admin_trans('Email Verification') }} </label>
                        <input type="checkbox" name="actions[email_verification_status]" data-toggle="toggle"
                            {{ $settings->actions->email_verification_status ? 'checked' : '' }}>
                    </div>
                    <div class="col-xl-4">
                        <label class="form-label">{{ admin_trans('Registration') }} </label>
                        <input type="checkbox" name="actions[registration_status]" data-toggle="toggle"
                            {{ $settings->actions->registration_status ? 'checked' : '' }}>
                    </div>
                    <div class="col-xl-4">
                        <label class="form-label">{{ admin_trans('Home Page') }} </label>
                        <input type="checkbox" name="actions[home_page_status]" data-toggle="toggle"
                            {{ $settings->actions->home_page_status ? 'checked' : '' }}>
                    </div>
                    <div class="col-xl-4">
                        <label class="form-label">{{ admin_trans('Knowledge Base') }} </label>
                        <input type="checkbox" name="actions[knowledgebase_status]" data-toggle="toggle"
                            {{ $settings->actions->knowledgebase_status ? 'checked' : '' }}>
                    </div>
                    <div class="col-xl-4">
                        <label class="form-label">{{ admin_trans('Force SSL') }} </label>
                        <input type="checkbox" name="actions[force_ssl_status]" data-toggle="toggle"
                            {{ $settings->actions->force_ssl_status ? 'checked' : '' }}>
                    </div>
                    <div class="col-xl-4">
                        <label class="form-label">{{ admin_trans('GDPR Cookie') }} </label>
                        <input type="checkbox" name="actions[gdpr_cookie_status]" data-toggle="toggle"
                            {{ $settings->actions->gdpr_cookie_status ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('Logo & Favicon') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="my-3">
                            <div class="vironeer-image-preview bg-light">
                                <img id="vironeer-preview-img-1" src="{{ asset($settings->media->logo_dark) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-1" type="file" name="media[logo_dark]"
                                accept=".jpg, .jpeg, .png, .svg" class="form-control" hidden>
                            <button data-id="1" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2"><i
                                    class="fas fa-camera me-2"></i>{{ admin_trans('Choose Dark Logo') }}</button>
                            <small class="text-muted">{{ admin_trans('Supported (PNG, JPG, JPEG, SVG)') }}</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="my-3">
                            <div class="vironeer-image-preview bg-dark">
                                <img id="vironeer-preview-img-2" src="{{ asset($settings->media->logo_light) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-2" type="file" name="media[logo_light]"
                                accept=".jpg, .jpeg, .png, .svg" class="form-control" hidden>
                            <button data-id="2" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2"><i
                                    class="fas fa-camera me-2"></i>{{ admin_trans('Choose Light Logo') }}</button>
                            <small class="text-muted">{{ admin_trans('Supported (PNG, JPG, JPEG, SVG)') }}</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="my-3">
                            <div class="vironeer-image-preview bg-light">
                                <img id="vironeer-preview-img-3" src="{{ asset($settings->media->favicon) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-3" type="file" name="media[favicon]"
                                accept=".jpg, .jpeg, .png, .ico" class="form-control" hidden>
                            <button data-id="3" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2"><i
                                    class="fas fa-camera me-2"></i>{{ admin_trans('Choose Favicon') }}</button>
                            <small class="text-muted">{{ admin_trans('Supported (PNG, JPG, JPEG, ICO)') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        {{ admin_trans('Social Image') }} <small
                            class="text-muted">{{ admin_trans('(og:image)') }}</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="vironeer-image-preview-box bg-light">
                                <img id="vironeer-preview-img-4" src="{{ asset($settings->media->social_image) }}"
                                    width="100%" height="315px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-4" type="file" name="media[social_image]"
                                accept="image/jpg, image/jpeg" class="form-control" hidden>
                            <button data-id="4" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2"><i
                                    class="fas fa-camera me-2"></i>{{ admin_trans('Choose Social Image') }}</button>
                            <small class="text-muted">
                                {{ admin_trans('Supported (JPEG, JPG) Size') }} <strong>600x315px.</strong>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        {{ admin_trans('Header pattern') }}
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="vironeer-image-preview-box bg-primary">
                                <img id="vironeer-preview-img-5" src="{{ asset($settings->media->header_pattern) }}"
                                    width="100%" height="315px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-5" type="file" name="media[header_pattern]"
                                accept=".svg" class="form-control" hidden>
                            <button data-id="5" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2"><i
                                    class="fas fa-camera me-2"></i>{{ admin_trans('Choose Pattern') }}</button>
                            <small class="text-muted">
                                {{ admin_trans('Supported (SVG)') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/coloris/coloris.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tags-input/bootstrap-tagsinput.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/coloris/coloris.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/tags-input/bootstrap-tagsinput.min.js') }}"></script>
    @endpush
    @push('scripts')
        <script>
            $(function() {
                let tagsInput = $('.tagsInput');
                tagsInput.tagsinput({
                    cancelConfirmKeysOnEmpty: false
                });
                tagsInput.on('beforeItemAdd', function(event) {
                    if (!/^[a-zA-Z-0-9_,]+$/.test(event.item)) {
                        event.cancel = true;
                        toastr.error(
                            "{{ admin_trans('Only letters, numbers, dashes and underscores are allowed.') }}"
                        );
                    }
                });
            });
        </script>
    @endpush
@endsection
