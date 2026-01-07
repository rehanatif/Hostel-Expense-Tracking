<div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="ti ti-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item waves-effect" href="javascript:void(0);"
            onclick="onFetchFormModal(event, '{{ route('expense.update', ['id' => $rows->id]) }}', '#md_update_expense', '#bind_modal')"><i
                class="ti ti-pencil me-1"></i> Edit</a>
    </div>
</div>
