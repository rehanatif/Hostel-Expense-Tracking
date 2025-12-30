<div class="d-flex justify-content-start align-items-center user-name">
    <div class="avatar-wrapper">
        <div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
        </div>
    </div>
    <div class="d-flex flex-column">
        <a href="#" class="text-heading text-truncate">
            <span class="fw-medium">
                {{ $rows->name }}
            </span>
        </a>
        <small>{{ $rows->email }}</small>
        <small>{{ $rows->phone }}</small>
    </div>
</div>
