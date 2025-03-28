@extends('admin.layouts.grid')
@section('section', admin_trans('Knowledge base'))
@section('title', admin_trans('Categories'))
@section('link', route('admin.knowledgebase.categories.create'))
@section('content')
    <div class="card">
        <table class="table datatable w-100">
            <thead>
                <tr>
                    <th class="tb-w-2x">#</th>
                    <th class="tb-w-7x">{{ admin_trans('Category') }}</th>
                    <th class="tb-w-3x">{{ admin_trans('Views') }}</th>
                    <th class="tb-w-7x">{{ admin_trans('Published date') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="item">
                        <td>{{ $category->id }}</td>
                        <td>
                            <div class="vironeer-content-box align-items-center">
                                <a class="vironeer-content-image"
                                    href="{{ route('admin.knowledgebase.categories.edit', $category->id) }}">
                                    <img src="{{ asset($category->icon) }}">
                                </a>
                                <div>
                                    <a class="text-reset"
                                        href="{{ route('admin.knowledgebase.categories.edit', $category->id) }}">
                                        {{ $category->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-dark">{{ $category->views }}</span></td>
                        <td>{{ dateFormat($category->created_at) }}</td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                    aria-expanded="true">
                                    <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-sm-end" data-popper-placement="bottom-end">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('knowledgebase.category', $category->slug) }}"
                                            target="_blank"><i class="fa fa-eye me-2"></i>{{ admin_trans('Preview') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.knowledgebase.categories.edit', $category->id) }}"><i
                                                class="fa fa-edit me-2"></i>{{ admin_trans('Edit') }}</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.knowledgebase.categories.destroy', $category->id) }}"
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
