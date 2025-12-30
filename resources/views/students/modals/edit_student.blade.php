<div class="modal fade" id="md_edit_student" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card m-4">

                <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data"
                    id="md_form_edit_student">
                    @csrf
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Email <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="email" class="form-control cls_email"
                                id="exampleFormControlInput1" placeholder="Enter Student Email"
                                value="{{ $student->email }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">CNIC <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="cnic" class="form-control cls_cnic"
                                id="exampleFormControlInput1" placeholder="Enter Student CNIC"
                                value="{{ $student->cnic }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Name <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="name" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Student Name"
                                value="{{ $student->name }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Phone No. <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="phone" class="form-control cls_contact"
                                id="exampleFormControlInput1" placeholder="Enter Student Phone"
                                value="{{ $student->phone }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Father Name <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="father_name" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Father Name"
                                value="{{ $student->father_name }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Father Contact <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="father_contact" class="form-control cls_contact"
                                id="exampleFormControlInput1" placeholder="Enter Father Contact"
                                value="{{ $student->father_contact }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Father Occupation <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="father_occupation" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Father Occupation"
                                value="{{ $student->father_occupation }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Emergency Contact <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="emergency_contact" class="form-control cls_contact"
                                id="exampleFormControlInput1" placeholder="Enter Emergency Contact"
                                value="{{ $student->emergency_contact }}">
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Address <i
                                    class="text-danger">*</i></label>
                            <input type="text" name="address" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Address"
                                value="{{ $student->address }}">
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
                            <select id="select_program" name="degree_program_id"
                                class="select2 form-select form-select-sm cls_required" data-allow-clear="true">
                                @foreach ($degree_programs as $program)
                                    <option value="{{ $program->id }}"
                                        {{ $student->degree_program_id == $program->id ? 'selected' : '' }}>
                                        {{ $program->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger req" value="*"></small>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Refer By</label>
                            <input type="text" name="refer_by" class="form-control cls_required"
                                id="exampleFormControlInput1" placeholder="Enter Refer By"
                                value="{{ $student->referredBy ? $student->referredBy->name : Auth::user()->name }}">

                            <input type="hidden" name="referred_by"
                                value="{{ $student->referred_by ?: Auth::user()->id }}">
                        </div>

                    </div>
                    <hr>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary"
                        onclick="formSubmitWithModal(event, this, '#md_edit_student', '#md_form_edit_student','#students_table')">Update</button>
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
