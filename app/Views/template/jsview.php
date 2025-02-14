<!-- Vendor JS Files -->

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<script src="assets/datatable/datatables.js"></script>


<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>

<!-- Select2 JS -->
<script src="assets/select2/js/select2.full.min.js"></script>

<!-- <script src="assets/quill/quill.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>





    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }], // custom button values
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }], // superscript/subscript
        [{ 'indent': '-1' }, { 'indent': '+1' }], // outdent/indent
        [{ 'direction': 'rtl' }], // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }], // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }], // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],
        ['clean']                                         // remove formatting button
    ];
    


    $(document).ready(function () {
        // $('#example').DataTable({
        //     "pageLength": 20,
        //     "lengthMenu": [10, 20, 50, 100],

        //     language: {
        //         lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
        //         zeroRecords: "ไม่พบข้อมูล",
        //         info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
        //         infoEmpty: "ไม่มีข้อมูล",
        //         infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
        //         search: "ค้นหา:",
        //         paginate: {
        //             first: "หน้าแรก",
        //             last: "หน้าสุดท้าย",
        //             next: "ถัดไป",
        //             previous: "ก่อนหน้า"
        //         }
        //     }
        // });
    });

    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#datepicker", {
            locale: "th",
            altInput: true, // ใช้ altInput ในการแสดงผล
            dateFormat: "d/m/Y", // รูปแบบวันที่ใน input
            altFormat: "d/m/Y", // รูปแบบวันที่ใน altInput
            onChange: (selectedDates, dateStr, instance) => {
                if (selectedDates.length > 0) {
                    const date = selectedDates[0];
                    const day = date.getDate();
                    const month = date.getMonth() + 1;
                    const buddhistYear = date.getFullYear() + 543;
                    const formattedDate = `${day}/${month}/${buddhistYear}`;
                    // อัปเดตทั้ง input และ altInput ด้วยวันที่ใน พ.ศ.
                    instance.input.value = formattedDate;
                    instance.altInput.value = formattedDate;
                }
            },
            formatDate: (date) => {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const buddhistYear = date.getFullYear() + 543;
                return `${day}/${month}/${buddhistYear}`;
            },
            onOpen: function (selectedDates, dateStr, instance) {
                const yearInput = instance.calendarContainer.querySelector(".cur-year");
                if (yearInput) {
                    // เปลี่ยนปีที่แสดงใน input ให้เป็นปี พ.ศ.
                    yearInput.value = instance.currentYear + 543;
                }
            },
            onReady: function (selectedDates, dateStr, instance) {
                const yearInput = instance.calendarContainer.querySelector(".cur-year");
                if (yearInput) {
                    // เปลี่ยนปีที่แสดงใน input ให้เป็นปี พ.ศ.
                    yearInput.value = parseInt(yearInput.value, 10) + 543;
                }
            },
            onYearChange: function (selectedDates, dateStr, instance) {
                const yearInput = instance.calendarContainer.querySelector(".cur-year");
                if (yearInput) {
                    // เมื่อปีเปลี่ยน แสดงผลเป็นปี พ.ศ.
                    yearInput.value = instance.currentYear + 543;
                }
            }
        });


    });



    $(document).ready(function () {
        $("#exampleSelect").select2({
            placeholder: "Select an option",
            allowClear: true,
        });
    });
</script>