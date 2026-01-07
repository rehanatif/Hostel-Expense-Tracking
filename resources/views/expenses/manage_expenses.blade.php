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
                    <h4 class="card-title mb-0 d-inline-block"><i class="fas fa-users me-2"></i>Manage Expenses</h4>
                    <button class="btn btn-primary d-inline-block text-right" style="float: right"
                        onclick="onFetchFormModal(event, '{{ route('expense.create') }}', '#md_create_expense', '#bind_modal')">Add
                        Expense</button>
                </div>
                <div class="table-responsive text-nowrap p-4">
                    <table class="table table-sm " id="expenses_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Created/Approved</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Remarks</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

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
    @include('expenses.scripts.expense_script')
    <script>
        // Start Page Scripts
    </script>
@endsection
