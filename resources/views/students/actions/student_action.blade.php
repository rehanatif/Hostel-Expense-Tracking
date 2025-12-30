<div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="ti ti-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item waves-effect" href="javascript:void(0);"
            onclick="onFetchFormModal(event, '{{ route('students.update', ['id' => $rows->id]) }}', '#md_edit_student', '#bind_modal')"><i
                class="ti ti-pencil me-1"></i> Edit</a>
        <a class="dropdown-item waves-effect" href="javascript:void(0);" title="Change Status"
            content="Are you sure you want to change the status?"
            onclick="changeStatus(event, this, '{{ route('students.change_status', ['id' => $rows->id]) }}', '#students_table')"><i
                class="ti ti-trash me-1"></i> Change
            Status</a>
    </div>
</div>
