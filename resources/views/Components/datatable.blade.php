<script>
    let table = $('#html5-extension').DataTable({
        headerCallback: function (e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML = '<label class="new-control new-checkbox checkbox-outline-info m-auto">' +
                '<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">' +
                '<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        dom: 'lBfrtip',

        buttons: [
            {
                extend: 'copy',
                className: 'btn btn-primary',
                text: 'نسخ',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-primary',
                text: 'اكسيل',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-primary',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-primary',
                text: 'طباعة',
                exportOptions: {
                    columns: ':visible'
                }
            },
        ],
        columnDefs: [{
            orderable: false,
            targets: 0,
            width: "5px",
            render: function () {
                return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">' +
                    '<input type="checkbox" class="new-control-input child-chk select-customers-info">' +
                    '<span class="new-control-indicator"></span>' +
                    '<span style="visibility:hidden">c</span>\n</label>'
            }
        }],
        "scrollX": true,
        select: {
            style: 'multi+shift',
            selector: '.select-customers-info'
        },
        order: [[1, 'asc']],
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>'
            },
            "sInfo": "عرض page _PAGE_ من _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "بحث ...",
            "sLengthMenu": "Results :  _MENU_",
        },
        lengthMenu: [10, 25, 50, 100],
        pageLength: 10
    });
    multiCheck(table);
</script>
