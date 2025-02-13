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


<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/j9qjklp57bfkjrqjtdhd5ke4v2bmlqxvvbxzrly7dro0ex5e/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            // Your account includes a free trial of TinyMCE premium features
            // Try the most popular premium features until Feb 25, 2025:
            'checklist', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        menubar: false,
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
</script>

<script>
    $(document).ready(function() {
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

    document.addEventListener("DOMContentLoaded", function() {
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
            onOpen: function(selectedDates, dateStr, instance) {
                const yearInput = instance.calendarContainer.querySelector(".cur-year");
                if (yearInput) {
                    // เปลี่ยนปีที่แสดงใน input ให้เป็นปี พ.ศ.
                    yearInput.value = instance.currentYear + 543;
                }
            },
            onReady: function(selectedDates, dateStr, instance) {
                const yearInput = instance.calendarContainer.querySelector(".cur-year");
                if (yearInput) {
                    // เปลี่ยนปีที่แสดงใน input ให้เป็นปี พ.ศ.
                    yearInput.value = parseInt(yearInput.value, 10) + 543;
                }
            },
            onYearChange: function(selectedDates, dateStr, instance) {
                const yearInput = instance.calendarContainer.querySelector(".cur-year");
                if (yearInput) {
                    // เมื่อปีเปลี่ยน แสดงผลเป็นปี พ.ศ.
                    yearInput.value = instance.currentYear + 543;
                }
            }
        });


    });



    $(document).ready(function() {
        $("#exampleSelect").select2({
            placeholder: "Select an option",
            allowClear: true,
        });
    });
</script>