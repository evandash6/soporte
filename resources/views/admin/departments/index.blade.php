@extends('admin.layouts.grid')
@section('title', admin_trans('Departments'))
@section('container', 'container-max-lg')
@section('link', route('admin.departments.create'))
@section('content')
    <div class="card">
        <table class="table datatable w-100">
            <thead>
                <tr>
                    <th class="tb-w-2x">#</th>
                    <th class="tb-w-7x">{{ admin_trans('Name') }}</th>
                    <th class="tb-w-3x">{{ admin_trans('Status') }}</th>
                    <th class="tb-w-7x">{{ admin_trans('Created date') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr class="item">
                        <td>{{ $department->id }}</td>
                        <td>
                            <a href="{{ route('admin.departments.edit', $department->id) }}" class="text-dark">
                                {{ $department->name }}
                            </a>
                        </td>
                        <td>
                            @if ($department->isActive())
                                <span class="badge bg-success">{{ admin_trans('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ admin_trans('Disabled') }}</span>
                            @endif
                        </td>
                        <td>{{ dateFormat($department->created_at) }}</td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                    aria-expanded="true">
                                    <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-sm-end" data-popper-placement="bottom-end">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.departments.edit', $department->id) }}"><i
                                                class="fa fa-edit me-2"></i>{{ admin_trans('Edit') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.tickets.index', 'department=' . $department->id) }}"><i
                                                class="fa-solid fa-inbox me-2"></i>{{ admin_trans('View tickets') }}</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.departments.destroy', $department->id) }}"
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
