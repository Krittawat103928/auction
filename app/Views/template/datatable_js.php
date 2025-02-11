<script>
    var csrfName = '<?php echo csrf_token(); ?>',
        csrfHash = '<?php echo csrf_hash(); ?>';


    var table = $('#example').DataTable({
        // "lengthMenu": [
        //     [100, "All", 50, 2],
        //     [100, "All", 50, 2]
        // ],
        "oLanguage": {
            "sLengthMenu": "แสดง _MENU_ รายการ", // **dont remove _MENU_ keyword**
            "sEmptyTable": "ไม่พบข้อมูล",
            "sInfoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
            "sInfo": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
        },
        "info": true,
        "searching": false,
        "language": {
            "search": "ค้นหา :",
            "paginate": {
                "previous": "ย้อนกลับ",
                "next": "ถัดไป",
                "first": 'First page'
            }

        },

        ajax: {
            type: "POST",
            url: '<?= base_url("/loadajax") ?>',

            data: function (d) {

                // d.year_search = $('#name_activity').val();
                // d.end_date = $('#end_date').val();
                d.csrf_test_name = csrfHash


            },
            complete: function (response) {
                // console.log("response.responseText.login", response.responseText.login)
                // response.responseText
                csrfName = response.responseJSON.csrfName
                csrfHash = response.responseJSON.csrfHash

            },
            error: function (xhr, error, thrown) {
                console.log("error", error)

            }
        },
        // "bAutoWidth": false,
        // "autoWidth": false,
        processing: true,
        serverMethod: 'post',
        serverSide: true,
        async: false,
        cache: true,
        contentType: false,
        enctype: 'multipart/form-data',
        // processData: false,
        // fixedColumns: true,
        paging: true,
        scrollCollapse: true,
        scrollX: true,
        scrollY: true,
        dataType: 'json',
        // autoWidth: false,
        // responsive: true,
        // fixedHeader: true,
        // responsive: true,
        "sScrollXInner": "100%",
        "columnDefs": [{
            // "targets": 'no-sort',
            // "orderable": false
        },
        {
            "width": "5%",
            "targets": 0
        },
        {
            "width": "10%",
            "targets": 1
        },
        {
            "width": "30%",
            "targets": 2
        },
        {
            "width": "20%",
            "targets": 3
        },
        {
            "width": "10%",
            "targets": 4,
            "className": "dt-center",
        },

        ],

        'columns': [{
            data: 'id',
            orderable: false
        },
        {
            data: 'auction_code'
        },
        {
            data: 'auction_name',
            orderable: false
        },
        {
            data: 'auction_price',
            orderable: false
        },

        {
            data: 'auction_date'
        },
        ],
        order: [
            [1, 'desc']
        ],
        // dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
        //     "<'row'<'col-sm-12'tr>>" +
        //     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        serverSide: true,
        stateSave: true,
        "stateSaveCallback": function (settings, data) {


        },
        "stateLoadCallback": function (settings) {
            // console.log(localStorage.getItem('datepicker1'))
            // console.log(localStorage.getItem('name_activity'))
            return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance));
        }
    });
    // $.fn.dataTable.ext.errMode = 'throw';
    $.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
        console.log("message", message);
    };
</script>