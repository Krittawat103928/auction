<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - eNno Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <?= $this->include('template/cssview') ?>
    <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        /* .select2 {
            width: 95%;
        } */

        .select2-selection__rendered {
            padding-top: 3px;
        }
    </style>
</head>

<body class="index-page">
    <main class="main">

        <!-- Hero Section -->
        <?= $this->include('template/header') ?>

        <!-- Featured Services Section -->
        <section id="" class="section" style="    background-color: #e9ebf4;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <h5>หัวข้อ</h5>
                            <!-- <label for="basic-url" class="form-label">หัวข้อ</label> -->
                            <div class="input-group">

                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                            </div>
                            <!-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <h5>ประเภท</h5>
                        <div class="mb-3">
                            <!-- <label for="basic-url" class="form-label">วันที่ลงประกาศ</label> -->
                            <div class="input-group">

                                <select class="form-select" id="exampleSelect" data-placeholder="Choose one thing" aria-describedby="basic-addon3">
                                    <option></option>
                                    <option>Reactive</option>
                                    <option>Solution</option>
                                    <option>Conglomeration</option>
                                    <option>Algoritm</option>
                                    <option>Holistic</option>
                                </select>
                            </div>
                            <!-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <h5>เลือกวันที่</h5>
                        <div class="input-group">

                            <input type="text" class="form-control" id="datepicker" aria-describedby="basic-addon3">
                        </div>
                    </div>
                    <div class="clearfix">
                        <br>
                    </div>

                    <div class="col-12">
                        <h5>รายละเอียด</h5>
                        <!-- <div id="editor"> -->
                        <!-- <p>Core build with no theme, formatting, non-essential modules</p> -->
                        <!-- </div> -->

                        <textarea></textarea>
                    </div>
                    <div class="clearfix">
                        <br>
                    </div>
                    <div class="mb-3">
                        <div id="file-upload-container" class="file-list">
                            <!-- ไฟล์แรกที่แสดง (จะถูกลบเมื่อเพิ่มไฟล์ใหม่) -->
                            <div class="input-group file-input-wrapper" draggable="true">
                                <span class="drag-icon">⇅</span> <!-- ไอคอนลาก -->
                                <span class="file-order">1.</span>
                                <input class="form-control file-input" type="file" name="files[]" accept="application/pdf">
                                <button type="button" class="btn btn-danger remove-btn">Remove</button>
                            </div>
                            <p class="error-message" style="color: red; display: none;">Only PDF files are allowed.</p>
                        </div>

                        <!-- ปุ่มเพิ่มไฟล์ -->
                        <button type="button" class="btn btn-primary mt-2" id="addFileButton">Add More Files</button>

                        <!-- ปุ่มส่งไฟล์ -->
                        <button type="button" class="btn btn-success mt-2" id="submitFilesButton">Submit Files</button>

                        <style>
                            /* กำหนดให้ .file-input-wrapper ใช้ flexbox */
                            .file-input-wrapper {
                                display: flex;
                                align-items: center;
                                /* จัดแนวไอคอนและ input ให้อยู่ในแถวเดียวกัน */
                                border: 2px dashed #888;
                                padding: 10px;
                                transition: all 0.3s ease;
                                margin-bottom: 10px;
                                /* ช่องระหว่างไฟล์ */
                            }

                            /* ไอคอนการลาก (drag-icon) */
                            .drag-icon {
                                font-size: 24px;
                                color: #3498db;
                                margin-right: 10px;
                                /* เพิ่มช่องระหว่างไอคอนและ input */
                            }

                            /* เมื่อไฟล์กำลังถูกลาก */
                            .file-input-wrapper.dragging {
                                border: 2px solid #3498db;
                                background-color: #f0f8ff;
                                cursor: move;
                            }

                            /* กำหนดเคอร์เซอร์ให้เหมาะสมเมื่อสามารถลากไฟล์ได้ */
                            .file-input-wrapper {
                                cursor: grab;
                            }

                            /* เมื่อกำลังลากไฟล์ */
                            .file-input-wrapper.dragging {
                                cursor: grabbing;
                            }

                            /* สไตล์ปุ่มลบ */
                            .remove-btn {
                                margin-left: 10px;
                                /* เพิ่มช่องระหว่างปุ่มลบกับไฟล์ */
                            }
                        </style>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // ฟังก์ชันตรวจสอบประเภทไฟล์
                                function validateFileInput(input) {
                                    const file = input.files[0];
                                    const errorMessage = input.closest('.file-input-wrapper').nextElementSibling;

                                    if (file && file.type !== "application/pdf") {
                                        errorMessage.style.display = 'block';
                                        input.value = ''; // รีเซ็ต input field
                                    } else {
                                        errorMessage.style.display = 'none';
                                    }
                                }

                                // ฟังก์ชันเพิ่ม input ไฟล์ใหม่
                                function addFileInput() {
                                    const fileUploadContainer = document.getElementById('file-upload-container');
                                    const allInputs = fileUploadContainer.querySelectorAll('.file-input-wrapper');

                                    const newInputDiv = document.createElement('div');
                                    newInputDiv.classList.add('input-group', 'file-input-wrapper', 'mt-2');
                                    newInputDiv.setAttribute('draggable', 'true'); // เปิดใช้งานการลาก
                                    newInputDiv.innerHTML = `
            <span class="drag-icon">⇅</span>
            <span class="file-order">${allInputs.length + 1}.</span>
            <input class="form-control file-input" type="file" name="files[]" accept="application/pdf">
            <button type="button" class="btn btn-danger remove-btn">Remove</button>
        `;

                                    fileUploadContainer.appendChild(newInputDiv);

                                    // เพิ่มข้อความ error เมื่อไฟล์ไม่ถูกต้อง
                                    const errorMessage = document.createElement('p');
                                    errorMessage.classList.add('error-message');
                                    errorMessage.style.color = 'red';
                                    errorMessage.style.display = 'none';
                                    errorMessage.textContent = 'Only PDF files are allowed.';
                                    fileUploadContainer.appendChild(errorMessage);

                                    // เพิ่ม event listener เพื่อตรวจสอบการเปลี่ยนแปลงไฟล์
                                    newInputDiv.querySelector('.file-input').addEventListener('change', function() {
                                        validateFileInput(this);
                                    });

                                    // เพิ่ม event listener สำหรับปุ่มลบ
                                    newInputDiv.querySelector('.remove-btn').addEventListener('click', function() {
                                        newInputDiv.remove(); // ลบไฟล์ออก
                                        updateFileOrder(); // อัปเดตลำดับหลังจากลบ
                                    });

                                    // อัปเดตลำดับไฟล์ใหม่
                                    updateFileOrder();
                                }

                                // ฟังก์ชันอัปเดตลำดับไฟล์
                                function updateFileOrder() {
                                    const allInputs = document.querySelectorAll('.file-input-wrapper');
                                    allInputs.forEach((input, index) => {
                                        input.querySelector('.file-order').textContent = `${index + 1}.`; // อัปเดตลำดับ
                                    });
                                }

                                // ฟังก์ชันส่งไฟล์
                                document.getElementById('submitFilesButton').addEventListener('click', function() {
                                    const formData = new FormData();

                                    // รับข้อมูลไฟล์จากทุก input และเพิ่มไฟล์ลงใน FormData
                                    const fileInputs = document.querySelectorAll('.file-input');
                                    fileInputs.forEach((input) => {
                                        const file = input.files[0];
                                        if (file) {
                                            formData.append('files[]', file);
                                        }
                                    });

                                    // ส่งข้อมูล FormData ไปยังเซิร์ฟเวอร์ผ่าน AJAX
                                    const xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'upload.php', true);
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            alert('Files uploaded successfully!');
                                            console.log(xhr.responseText); // แสดงผลการตอบกลับจาก PHP
                                        }
                                    };
                                    xhr.send(formData);
                                });

                                // เพิ่ม event listener สำหรับการเพิ่มไฟล์ใหม่
                                document.getElementById('addFileButton').addEventListener('click', function() {
                                    addFileInput();
                                });

                                // ตรวจสอบประเภทไฟล์ของไฟล์แรก
                                document.querySelector('.file-input').addEventListener('change', function() {
                                    validateFileInput(this);
                                });

                                // ฟังก์ชันลากและจัดเรียงไฟล์
                                const fileUploadContainer = document.getElementById('file-upload-container');
                                fileUploadContainer.addEventListener('dragstart', function(e) {
                                    if (e.target && e.target.classList.contains('file-input-wrapper')) {
                                        e.dataTransfer.setData('text/plain', e.target.innerHTML);
                                        e.target.classList.add('dragging');
                                    }
                                });

                                fileUploadContainer.addEventListener('dragover', function(e) {
                                    e.preventDefault();
                                    const draggingElement = document.querySelector('.dragging');
                                    const afterElement = getDragAfterElement(fileUploadContainer, e.clientY);
                                    if (afterElement == null) {
                                        fileUploadContainer.appendChild(draggingElement);
                                    } else {
                                        fileUploadContainer.insertBefore(draggingElement, afterElement);
                                    }
                                    updateFileOrder(); // อัปเดตลำดับเมื่อมีการลาก
                                });

                                fileUploadContainer.addEventListener('dragend', function(e) {
                                    e.target.classList.remove('dragging');
                                });

                                // ฟังก์ชันเพื่อหาตำแหน่งของไฟล์ที่ถูกลาก
                                function getDragAfterElement(container, y) {
                                    const draggableElements = [...container.querySelectorAll('.file-input-wrapper:not(.dragging)')];
                                    return draggableElements.reduce((closest, child) => {
                                        const box = child.getBoundingClientRect();
                                        const offset = y - box.top - box.height / 2;
                                        if (offset < 0 && offset > closest.offset) {
                                            return {
                                                offset: offset,
                                                element: child
                                            };
                                        } else {
                                            return closest;
                                        }
                                    }, {
                                        offset: Number.NEGATIVE_INFINITY
                                    }).element;
                                }

                                // เริ่มต้นอัปเดตลำดับไฟล์
                                updateFileOrder();
                            });
                        </script>


                    </div>
                </div>
            </div>



        </section><!-- /Featured Services Section -->

        <!-- About Section -->


    </main>
    <?= $this->include('template/footer') ?>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <?= $this->include('template/jsview') ?>
    <?= $this->include('template/datatable_js') ?>

</body>

</html>