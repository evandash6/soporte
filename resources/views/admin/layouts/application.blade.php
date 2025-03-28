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
        <div class="container">
            <div class="vironeer-page-body">
                <div class="py-4 g-4">
                    <div class="row align-items-center">
                        <div class="col">
                            @include('admin.partials.breadcrumb')
                        </div>
                        <div class="col-auto">
                            @hasSection('back')
                                <a href="@yield('back')" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left fa-rtl me-2"></i>{{ admin_trans('Back') }}</a>
                            @endif
                            @if (request()->routeIs('admin.dashboard'))
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ admin_trans('Quick Access') }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.settings.general') }}">{{ admin_trans('General Settings') }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.settings.pages.index') }}">{{ admin_trans('Pages') }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.settings.translates.index') }}">{{ admin_trans('Translates') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
    @include('admin.includes.scripts')
</body>

</html>
