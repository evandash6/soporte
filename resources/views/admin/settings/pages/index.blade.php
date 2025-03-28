@extends('admin.layouts.grid')
@section('section', admin_trans('Settings'))
@section('title', admin_trans('Pages'))
@section('link', route('admin.settings.pages.create'))
@section('content')
    <div class="card">
        <table class="table datatable w-100">
            <thead>
                <tr>
                    <th class="tb-w-2x">#</th>
                    <th class="tb-w-7x">{{ admin_trans('Page Name') }}</th>
                    <th class="tb-w-3x">{{ admin_trans('Views') }}</th>
                    <th class="tb-w-7x">{{ admin_trans('Created date') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr class="item">
                        <td>{{ $page->id }}</td>
                        <td>
                            <a href="{{ route('admin.settings.pages.edit', $page->id) }}"
                                class="text-dark">{{ $page->title }}</a>
                        </td>
                        <td><span class="badge bg-dark">{{ $page->views }}</span></td>
                        <td>{{ dateFormat($page->created_at) }}</td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                    aria-expanded="true">
                                    <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-sm-end" data-popper-placement="bottom-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('page', $page->slug) }}" target="_blank"><i
                                                class="fa fa-eye me-2"></i>{{ admin_trans('Preview') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.settings.pages.edit', $page->id) }}"><i
                                                class="fa fa-edit me-2"></i>{{ admin_trans('Edit') }}</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.settings.pages.destroy', $page->id) }}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                            <button class="action-confirm dropdown-item text-danger"><i
                                                    class="far fa-trash-alt me-2"></i>{{ admin_trans('Delete') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
