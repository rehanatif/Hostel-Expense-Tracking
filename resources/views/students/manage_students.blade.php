@extends('layouts.master')
@php($path = asset('/'))

@section('title', 'Dashboard')

@section('styles')

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <style>
        .dt-buttons.btn-group .btn {
            padding: 6px 12px;
            /* inner padding */
            border-radius: 4px;
            /* optional: rounded corners */
            margin: 5px;
        }

        /* Target DataTables buttons inside the btn-group */
        .dt-buttons.btn-group .btn {
            margin-right: 5px;
            /* space between buttons */
        }

        /* Remove margin on last button */
        .dt-buttons.btn-group .btn:last-child {
            margin-right: 0;
        }
    </style>

    <!-- Tech Stack Overview -->
    <div class="row g-6 mb-6">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block"><i class="fas fa-users me-2"></i>Manage Students</h4>
                    <button class="btn btn-primary d-inline-block text-right" style="float: right"
                        onclick="onFetchFormModal(event, '{{ route('students.create') }}', '#md_create_student', '#bind_modal')">Add
                        Student</button>
                </div>
                <div class="table-responsive text-nowrap p-4">
                    <table class="table table-sm " id="students_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Student</th>
                                <th>Father</th>
                                <th>Address</th>
                                <th>Referred By</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            {{-- @foreach ($student_list as $key => $student)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/2.png"
                                                        alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="app-user-view-account.html" class="text-heading text-truncate">
                                                    <span class="fw-medium">
                                                        {{ $student->name }}
                                                    </span>
                                                </a>
                                                <small>{{ $student->email }}</small>
                                                <small>{{ $student->phone }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center user-name">

                                            <div class="d-flex flex-column">
                                                <a href="app-user-view-account.html" class="text-heading text-truncate">
                                                    <span class="fw-medium">
                                                        {{ $student->father_name }}
                                                    </span>
                                                </a>
                                                <small>FC : {{ $student->father_contact }}</small>
                                                <small>EC : {{ $student->emergency_contact }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->referredBy->name }}</td>
                                    <td><span class="badge bg-label-warning me-1">{{ $student->status }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item waves-effect" href="javascript:void(0);"><i
                                                        class="ti ti-pencil me-1"></i> Edit</a>
                                                <a class="dropdown-item waves-effect" href="javascript:void(0);"><i
                                                        class="ti ti-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('modals')
    <!-- Include Bootstrap Modals Here -->
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    @include('students.scripts.student_script')
    <script>
        // Start Page Scripts
    </script>
@endsection
