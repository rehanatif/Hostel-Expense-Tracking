<div class="modal fade" id="md_create_student" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Create Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card m-4">

                <form action="{{ route('students.create') }}" method="post" enctype="multipart/form-data"
                    id="md_form_create_student">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Email <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="email" class="form-control cls_email"
                                id="exampleFormControlInput1" placeholder="Enter Student Email">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">CNIC <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="cnic" class="form-control cls_cnic"
                                id="exampleFormControlInput1" placeholder="Enter Student CNIC">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Name <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="name" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Student Name">
                            <small class="text-danger req" value="*"></small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Phone No. <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="phone" class="form-control cls_contact"
                                id="exampleFormControlInput1" placeholder="Enter Student Phone">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Father Name <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="father_name" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Father Name">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Father Contact <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="father_contact" class="form-control cls_contact"
                                id="exampleFormControlInput1" placeholder="Enter Father Contact">
                            <small class="text-danger req" value="*"></small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Father Occupation <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="father_occupation" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Father Occupation">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Emergency Contact <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="emergency_contact" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Emergency cls_contact">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Address <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="address" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Address">
                            <small class="text-danger req" value="*"></small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">image</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Select Program <i
                                    class="text-danger">*</i></label>
                            <select id="select_program" class="select2 form-select form-select-sm cls_required"
                                data-allow-clear="true">
                                @foreach ($degree_programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Refer By</label>
                            <input type="text" name="refer_by" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Refer By"
                                value="{{ Auth::user()->name }}">

                            <input type="hidden" name="refer_by" value="{{ Auth::user()->id }}">
                        </div>

                    </div>
                    <hr>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary"
                        onclick="formSubmitWithModal(event, this, '#md_create_student', '#md_form_create_student')">Submit</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            // ajaxUrl = "{{ route('degree_programs.list') }}";
            // alert(ajaxUrl);

            initSelect2('#select_program', 'Select Program', false, '100%', null, 2, false)
        });
    </script>
