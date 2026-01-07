<div class="modal fade" id="md_create_expense" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-share-project modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h4 class="mb-2">Add Expense</h4>
                </div>
            </div>
            <form action="{{ route('expense.create') }}" method="post" enctype="multipart/form-data"
                id="form_md_create_expense">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-6 mx-4 mx-md-0">
                        <label for="category" class="form-label">Select Category</label>
                        <select id="category" name="category_id"
                            class="form-select form-select-lg share-project-select" data-allow-clear="true">
                            <option></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="html5-date-input" class="form-label">Select Date</label>
                        <input class="form-control" name="transaction_date" type="date" value="{{ date('Y-m-d') }}"
                            id="html5-date-input">
                    </div>
                </div>
                {{-- <h5 class="ms-4 ms-md-0">Enter Amount</h5> --}}
                <div class="row ">
                    <div class="col-md-6">
                        <label class="form-label">Amount</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="basic-addon1">RS</span>
                            <input type="text" name="amount" class="form-control form-control-sm"
                                placeholder="Amount" aria-label="Amount" aria-describedby="basic-addon1" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Enter Note</label>
                        <textarea class="form-control" name="remarks" id="note" rows="1" placeholder="Note"></textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <div class="d-flex align-items-start mt-6 align-items-sm-center mx-4 mx-md-0 mb-4 mb-md-0">
                        <i class="ti ti-users me-2 text-heading"></i>
                        <div class="d-flex justify-content-between flex-grow-1 align-items-center flex-wrap gap-2">

                            <button
                                onclick="formSubmitWithModal(event, this, '#md_create_expense', '#form_md_create_expense','#expenses_table')"
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

            initSelect2('#category', 'Select Category', false, '100%', null, 2, false)
        });
    </script>
