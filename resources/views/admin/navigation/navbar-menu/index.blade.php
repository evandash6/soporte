@extends('admin.layouts.form')
@section('title', admin_trans('Navbar Menu'))
@section('container', 'container-max-lg')
@section('link', route('admin.navbar-menu.create'))
@if ($navbarMenuLinks->count() == 0)
    @section('btn_action', 'disabled')
@endif
@section('content')
    @if ($navbarMenuLinks->count() > 0)
        <form id="vironeer-submited-form" action="{{ route('admin.navbar-menu.nestable') }}" method="POST">
            @csrf
            <input name="ids" id="ids" hidden>
        </form>
        <div class="card border-0">
            <div class="dd nestable">
                <ol class="dd-list">
                    @foreach ($navbarMenuLinks as $navbarMenuLink)
                        <li class="dd-item" data-id="{{ $navbarMenuLink->id }}">
                            <div class="dd-handle">
                                <span class="drag-indicator"></span>
                                <span class="dd-title">{{ $navbarMenuLink->name }}</span>
                                <div class="dd-nodrag ms-auto">
                                    <a href="{{ route('admin.navbar-menu.edit', $navbarMenuLink->id) }}"
                                        class="btn btn-sm btn-blue me-2"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline"
                                        action="{{ route('admin.navbar-menu.destroy', $navbarMenuLink->id) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="action-confirm btn btn-sm btn-danger"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                            @if (count($navbarMenuLink->children))
                                <ol class="dd-list">
                                    @foreach ($navbarMenuLink->children as $child)
                                        <li class="dd-item" data-id="{{ $child->id }}">
                                            <div class="dd-handle">
                                                <span class="drag-indicator"></span>
                                                <span class="dd-title">{{ $child->name }}</span>
                                                <div class="dd-nodrag ms-auto">
                                                    <a href="{{ route('admin.navbar-menu.edit', $child->id) }}"
                                                        class="btn btn-sm btn-blue me-2"><i class="fa fa-edit"></i></a>
                                                    <form class="d-inline"
                                                        action="{{ route('admin.navbar-menu.destroy', $child->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="action-confirm btn btn-sm btn-danger"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                @include('admin.partials.empty', ['size' => 180])
            </div>
        </div>
    @endif
    @if ($navbarMenuLinks->count() > 0)
        @push('styles_libs')
            <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery/nestable/jquery.nestable.min.css') }}">
        @endpush
        @push('scripts_libs')
            <script src="{{ asset('assets/vendor/libs/jquery/nestable/jquery.nestable.min.js') }}"></script>
        @endpush
    @endif
@endsection
