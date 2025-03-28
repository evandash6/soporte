<!DOCTYPE html>
<html lang="{{ getLocale() }}" dir="{{ getDirection() }}">

<head>
    @include('admin.includes.head')
    @include('admin.includes.styles')
</head>

<body>
    @include('admin.includes.sidebar')
    <div class="vironeer-page-content">
        @include('admin.includes.navbar')
        <div class="container @yield('container')">
            <div class="vironeer-page-body px-1 px-sm-2 px-xxl-0">
                <div class="py-4 g-4">
                    <div class="row align-items-center">
                        <div class="col">
                            @include('admin.partials.breadcrumb')
                        </div>
                        <div class="col-auto">
                            @hasSection('back')
                                <a href="@yield('back')" class="btn btn-secondary ms-2"><i
                                        class="fas fa-arrow-left fa-rtl me-2"></i>{{ admin_trans('Back') }}</a>
                            @endif
                            @hasSection('modal')
                                <button type="button" class="btn btn-dark ms-2" data-bs-toggle="modal"
                                    data-bs-target="#viewModal">
                                    @yield('modal')
                                </button>
                            @endif
                            @hasSection('link')
                                <a href="@yield('link')" class="btn btn-primary ms-2"><i class="fa fa-plus"></i></a>
                            @endif
                            @hasSection('add_modal')
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            @endif
                            @hasSection('upload_modal')
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="fa fa-upload me-2"></i>@yield('upload_modal')
                                </button>
                            @endif
                            @if (request()->routeIs('admin.notifications.index'))
                                <a class="action-confirm btn btn-outline-success ms-2"
                                    href="{{ route('admin.notifications.read.all') }}">
                                    <i class="fa-regular fa-bookmark me-1"></i>
                                    {{ admin_trans('Make All as Read') }}
                                </a>
                                <form class="d-inline ms-2" action="{{ route('admin.notifications.destroy.all') }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-confirm btn btn-outline-danger">
                                        <i class="fa-regular fa-trash-can me-1"></i>
                                        {{ admin_trans('Delete All Read') }}
                                    </button>
                                </form>
                            @endif
                            @if (request()->routeIs('admin.system.info.index'))
                                <a href="{{ config('system.author.profile') }}" target="_blank"
                                    class="btn btn-secondary"><i
                                        class="far fa-question-circle me-2"></i>{{ admin_trans('Get Help') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row g-3 g-xl-3">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
    @include('admin.includes.scripts')
</body>

</html>
