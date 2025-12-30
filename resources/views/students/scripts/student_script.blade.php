<style>
    .dt-buttons .dt-button {
        padding: 0.375rem 0.75rem;
        margin-right: 0.25rem;
    }
</style>
<script>
    $(function() {
        loadStudents();
    });

    function loadStudents() {
        var translations = {
            searchPlaceholder: "{{ __('students.Search Student') }}",
            next: "{{ __('general.Next') }}",
            previous: "{{ __('general.Previous') }}"
        };

        var element = $('#students_table');
        element.DataTable().clear();
        element.DataTable().destroy();
        element.DataTable({
            cache: true,
            responsive: true,
            processing: true,
            serverSide: true,
            deferRender: true,
            select: false,
            stateSave: true,
            pageLength: 25,
            colReorder: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            'ajax': {
                'url': '{{ route('students') }}',
                'type': 'POST',
                'data': {
                    _token: token
                },
            },
            'columns': [{
                    data: 'id',
                    width: '3%'
                },
                {
                    data: 'count',
                    width: '2%'
                },
                {
                    data: 'student',
                    width: '20%'
                },
                {
                    data: 'father',
                    width: '20%'
                },
                {
                    data: 'address',
                    width: '5%'

                },
                {
                    data: 'referred_by',
                    width: '5%'

                },
                {
                    data: 'status',
                    width: '5%'

                },
                {
                    data: 'action',
                    width: '5%'
                },
            ],
            "columnDefs": [{
                    // For Responsive
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 0,
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // Count
                    targets: 1,
                    responsivePriority: 1,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    // Student
                    targets: 2,
                    responsivePriority: 2,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    // Father
                    targets: 3,
                    responsivePriority: 3,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    // Address
                    targets: 4,
                    responsivePriority: 4,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    // Referred By
                    targets: 5,
                    responsivePriority: 5,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    // Status
                    targets: 6,
                    responsivePriority: 6,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    // Action
                    targets: 7,
                    responsivePriority: 7,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
            ],
            order: [
                [1, 'desc']
            ],
            language: {
                sLengthMenu: '_MENU_',
                search: '',
                searchPlaceholder: translations.searchPlaceholder,
                paginate: {
                    next: translations.next + '<i class="ti ti-chevron-right ti-sm"></i> ',
                    previous: '<i class="ti ti-chevron-left ti-sm"></i> ' + translations.previous
                }
            },
        });
    }
</script>
