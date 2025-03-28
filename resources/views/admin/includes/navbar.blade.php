<header class="vironeer-page-header">
    <div class="vironeer-sibebar-icon me-auto">
        <i class="fa fa-bars fa-lg"></i>
    </div>
    <div class="row row-cols-auto g-3">
        <div class="col">
            <a href="{{ route('admin.system.info.cache') }}" class="btn btn-outline-danger rounded-3 action-confirm">
                <i class="fa-solid fa-broom"></i>
                <span class="d-none d-lg-inline ms-1">{{ admin_trans('Clear Cache') }}</span>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-dark rounded-3">
                <i class="fa-solid fa-eye"></i>
                <span class="d-none d-lg-inline ms-1">{{ admin_trans('Preview') }}</span>
            </a>
        </div>
    </div>
    <div class="vironeer-notifications ms-2" data-dropdown-v2>
        <div class="vironeer-notifications-title">
            <i class="far fa-bell"></i>
            @if ($notifications['unread'])
                <div class="counter">{{ $notifications['unread'] > 9 ? '9+' : $notifications['unread'] }}</div>
            @endif
        </div>
        <div class="vironeer-notifications-menu">
            <div class="vironeer-notifications-header">
                <p class="vironeer-notifications-header-title mb-0">
                    {{ admin_trans('Notifications') }} ({{ $notifications['unread'] }})</p>
                @if ($notifications['unread'] > 0)
                    <a href="{{ route('admin.notifications.read.all') }}"
                        class="ms-auto action-confirm">{{ admin_trans('Mark All as Read') }}</a>
                @else
                    <span class="ms-auto text-muted">{{ admin_trans('Mark All as Read') }}</span>
                @endif
            </div>
            <div class="vironeer-notifications-body">
                @forelse ($notifications['list'] as $notification)
                    @if ($notification->link)
                        <a class="vironeer-notification"
                            href="{{ route('admin.notifications.view', $notification->id) }}">
                            <div class="vironeer-notification-image">
                                <img src="{{ $notification->image }}" alt="{{ $notification->title }}">
                            </div>
                            <div class="vironeer-notification-info">
                                <p
                                    class="vironeer-notification-title mb-0 d-flex justify-content-between align-items-center">
                                    <span>{{ shorterText($notification->title, 30) }}</span>
                                    @if (!$notification->status)
                                        <span class="unread flashit"><i class="fas fa-circle"></i></span>
                                    @endif
                                </p>
                                <p class="vironeer-notification-text mb-0">
                                    {{ $notification->created_at->diffforhumans() }}
                                </p>
                            </div>
                        </a>
                    @else
                        <div class="vironeer-notification">
                            <div class="vironeer-notification-image">
                                <img src="{{ $notification->image }}" alt="{{ $notification->title }}">
                            </div>
                            <div class="vironeer-notification-info">
                                <p
                                    class="vironeer-notification-title mb-0 d-flex justify-content-between align-items-center">
                                    <span>{{ shorterText($notification->title, 30) }}</span>
                                    @if (!$notification->status)
                                        <span class="unread flashit"><i class="fas fa-circle"></i></span>
                                    @endif
                                </p>
                                <p class="vironeer-notification-text mb-0">
                                    {{ $notification->created_at->diffforhumans() }}
                                </p>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="empty">
                        <small class="text-muted mb-0">{{ admin_trans('No notifications found') }}</small>
                    </div>
                @endforelse
            </div>
            <a class="vironeer-notifications-footer" href="{{ route('admin.notifications.index') }}">
                {{ admin_trans('View All') }}
            </a>
        </div>
    </div>

    <div class="vironeer-user-menu">
        <div class="vironeer-user" id="dropdownMenuButton" data-bs-toggle="dropdown">
            <div class="vironeer-user-avatar">
                <img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->getName() }}" />
            </div>
            <div class="vironeer-user-info d-none d-md-block">
                <p class="vironeer-user-title mb-0">{{ auth()->user()->getName() }}</p>
                <p class="vironeer-user-text mb-0">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('admin.account.index') }}">
                    <i class="fa-solid fa-user-pen me-1"></i>
                    {{ admin_trans('Account') }}
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger"><i
                            class="fas fa-sign-out-alt me-2"></i>{{ admin_trans('Logout') }}</button>
                </form>
            </li>
        </ul>
    </div>
</header>
