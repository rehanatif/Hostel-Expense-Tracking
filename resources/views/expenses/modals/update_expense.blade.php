<div class="modal fade" id="md_update_expense" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-share-project modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h4 class="mb-2">Update Expense</h4>
                </div>
            </div>
            <form action="{{ route('expense.update') }}" method="post" enctype="multipart/form-data"
                id="form_md_update_expense">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-6 mx-4 mx-md-0">
                        <label for="category" class="form-label">Select category</label>
                        <select id="category_id" name="category_id"
                            class="form-select form-select-lg share-project-select" data-allow-clear="true">
                            <option></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $expense->category_id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="html5-date-input" class="form-label">Select Date</label>
                        <input class="form-control" name="transaction_date" type="date"
                            value="{{ $expense->transaction_date }}" id="html5-date-input">
                    </div>
                </div>
                {{-- <h5 class="ms-4 ms-md-0">Enter Amount</h5> --}}
                <div class="row ">
                    <div class="col-md-6">
                        <label class="form-label">Amount</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="basic-addon1">RS</span>
                            <input type="text" name="amount" value="{{ $expense->amount }}"
                                class="form-control form-control-sm" placeholder="Amount" aria-label="Amount"
                                aria-describedby="basic-addon1" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Enter Note</label>
                        <textarea class="form-control" name="remarks" id="note" rows="1" placeholder="Note">{{ $expense->remarks }}</textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $expense->id }}" />
                    <div class="d-flex align-items-start mt-6 align-items-sm-center mx-4 mx-md-0 mb-4 mb-md-0">
                        <i class="ti ti-users me-2 text-heading"></i>
                        <div class="d-flex justify-content-between flex-grow-1 align-items-center flex-wrap gap-2">

                            <button
                                onclick="formSubmitWithModal(event, this, '#md_update_expense', '#form_md_update_expense','#expenses_table')"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            // ajaxUrl = "{{ route('degree_programs.list') }}";
            // alert(ajaxUrl);

            initSelect2('#student', 'Select Student', false, '100%', null, 2, false)
        });
    </script>
