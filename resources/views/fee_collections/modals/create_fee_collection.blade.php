<div class="modal fade" id="md_create_fee_collection" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-share-project modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h4 class="mb-2">Add Fee Collection</h4>
                </div>
            </div>
            <form action="{{ route('fee_collections.create') }}" method="post" enctype="multipart/form-data"
                id="md_">
                @csrf
                <div class="mb-6 mx-4 mx-md-0">
                    <label for="student" class="form-label">Select Student</label>
                    <select id="student" name="student" class="form-select form-select-lg share-project-select"
                        data-allow-clear="true">
                        <option></option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <h5 class="ms-4 ms-md-0">Enter Amount</h5> --}}
                <div class="row g-0 mb-4 mx-4 mx-md-0">
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="basic-addon1">RS</span>
                            <input type="text" name="amount" class="form-control form-control-lg"
                                placeholder="Amount" aria-label="Amount" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                    <div class="col-auto align-self-center ps-3">
                        <span class="text-muted">.00</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex align-items-start mt-6 align-items-sm-center mx-4 mx-md-0 mb-4 mb-md-0">
                        <i class="ti ti-users me-2 text-heading"></i>
                        <div class="d-flex justify-content-between flex-grow-1 align-items-center flex-wrap gap-2">
                            <h6 class="mb-0">Public to Vuexy - Pixinvent</h6>
                            <button class="btn btn-primary"><i class="ti ti-link ti-xs me-2"></i>Copy Project
                                Link</button>
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
