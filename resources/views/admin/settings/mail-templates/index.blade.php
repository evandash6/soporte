@extends('admin.layouts.grid')
@section('title', admin_trans('Mail Templates'))
@section('section', admin_trans('Settings'))
@section('content')
    <div class="card">
        <table class="table datatable2 w-100">
            <thead>
                <tr>
                    <th class="tb-w-2x">#</th>
                    <th class="tb-w-3x">{{ admin_trans('Name') }}</th>
                    <th class="tb-w-7x">{{ admin_trans('Subject') }}</th>
                    <th class="tb-w-3x">{{ admin_trans('Status') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailTemplates as $mailTemplate)
                    <tr class="item">
                        <td>{{ $mailTemplate->id }}</td>
                        <td>
                            <a href="{{ route('admin.settings.mail-templates.edit', $mailTemplate->id) }}"
                                class="text-dark"><i class="fas fa-envelope me-2"></i>{{ admin_trans($mailTemplate->name) }}</a>
                        </td>
                        <td>{{ $mailTemplate->subject }}</td>
                        <td>
                            @if ($mailTemplate->status)
                                <span class="badge bg-success">{{ admin_trans('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ admin_trans('Disabled') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                    aria-expanded="true">
                                    <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-sm-end" data-popper-placement="bottom-end">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.settings.mail-templates.edit', $mailTemplate->id) }}"><i
                                                class="fa fa-edit me-2"></i>{{ admin_trans('Edit') }}</a>
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
