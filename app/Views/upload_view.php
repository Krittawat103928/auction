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

    <style>
        body {
            /* font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4; */
        }

        .upload-box {
            width: 100%;
            padding: 20px;
            border: 2px dashed #007bff;
            text-align: center;
            background-color: white;
            cursor: pointer;
        }

        .progress-bar {
            width: 100%;
            background: #ddd;
            height: 10px;
            margin-top: 10px;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar div {
            height: 100%;
            background: #007bff;
            width: 0%;
        }

        .file-list {
            margin-top: 10px;
            text-align: left;
            list-style: none;
            padding: 0;
        }

        .file-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            border: 1px solid #ddd;
            margin: 5px 0;
            background: #fff;
            cursor: grab;
            position: relative;
        }

        .drag-handle {
            cursor: grab;
            margin-right: 10px;
        }

        .file-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .file-info {
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: space-between;
            width: 100%;
        }

        .file-name {
            display: flex;
            /* align-items: center; */
        }

        .delete-button {
            background: transparent;
            border: none;
            color: red;
            font-size: 18px;
            cursor: pointer;
            margin-left: 10px;
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
                <form action="<?= base_url('/upload/uploadFiles') ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <h5>หัวข้อ</h5>
                                <!-- <label for="basic-url" class="form-label">หัวข้อ</label> -->
                                <div class="input-group">
                                    <input type="text" class="form-control" id="topic" name="topic"
                                        aria-describedby="basic-addon3 basic-addon4">
                                </div>
                                <!-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <h5>Code</h5>
                                <!-- <label for="basic-url" class="form-label">หัวข้อ</label> -->
                                <div class="input-group">
                                    <input type="text" class="form-control" id="code" name="code"
                                        aria-describedby="basic-addon3 basic-addon4">
                                </div>
                                <!-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <h5>ประเภท</h5>
                            <div class="mb-3">
                                <!-- <label for="basic-url" class="form-label">วันที่ลงประกาศ</label> -->
                                <div class="input-group">
                                    <select class="form-select" id="exampleSelect" name="exampleSelect">
                                        <option value="">Choose one thing</option> <!-- Placeholder -->
                                        <?php if (!empty($type_action)): ?>
                                            <?php foreach ($type_action as $type): ?>
                                                <option value="<?= esc($type['type_code']) ?>"><?= esc($type['type_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option disabled>No options available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <!-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <h5>เลือกวันที่</h5>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker" name="datepicker"
                                    aria-describedby="basic-addon3">
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
                            <textarea id="editor" name="content"></textarea>
                        </div>
                        <div class="clearfix">
                            <br>
                        </div>
                        <div class="mb-3">
                            <div class="upload-box" id="drop-area">
                                <p>Drag & Drop PDF files here or click to upload</p>
                                <input type="file" id="fileInput" name="fileInput[]" multiple accept="application/pdf"
                                    hidden>
                                <div class="progress-bar">
                                    <div id="progress"></div>
                                </div>
                                <ul class="file-list" id="file-list"></ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="upload-box" id="image-drop-area" style="margin-top: 20px;">
                                <p>Drag & Drop Image files here or click to upload</p>
                                <input type="file" id="imageInput" name="imageInput[]" multiple accept="image/*" hidden>
                                <div class="progress-bar">
                                    <div id="image-progress"></div>
                                </div>
                                <ul class="file-list" id="image-list"></ul>
                            </div>
                        </div>
                        <!-- Hidden inputs to store file orders -->
                        <input type="" id="pdf-file-order" name="pdfFileOrder">
                        <input type="" id="image-file-order" name="imageFileOrder">
                        <div class="col-12">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-primary">Upload Files</button>
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

    <!-- Add Sortable.js for drag-and-drop reordering -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/j9qjklp57bfkjrqjtdhd5ke4v2bmlqxvvbxzrly7dro0ex5e/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // PDF Upload Handling
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('fileInput');
            const fileList = document.getElementById('file-list');

            // Image Upload Handling
            const imageDropArea = document.getElementById('image-drop-area');
            const imageInput = document.getElementById('imageInput');
            const imageList = document.getElementById('image-list');

            function initFileUpload(dropArea, fileInput, fileList) {
                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropArea.addEventListener(eventName, preventDefaults, false);
                    document.body.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop area when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    dropArea.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropArea.addEventListener(eventName, unhighlight, false);
                });

                // Handle dropped files
                dropArea.addEventListener('drop', handleDrop, false);

                // Handle click to select files
                dropArea.addEventListener('dblclick', () => fileInput.click());

                // Handle file selection
                fileInput.addEventListener('change', function (e) {
                    handleFiles(e.target.files, fileList);
                    updateFileOrder(fileList, 'pdf'); // Trigger the order update when files are selected
                });

                // Make file list sortable using Sortable.js
                new Sortable(fileList, {
                    animation: 150,  // Add smooth animation for dragging
                    handle: '.drag-handle',  // Use drag handle for dragging items
                    onEnd(evt) {  // Handle when drag ends
                        updateFileOrder(fileList, 'pdf'); // Update order after drag
                    }
                });
            }

            function initImageUpload(dropArea, imageInput, imageList) {
                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropArea.addEventListener(eventName, preventDefaults, false);
                    document.body.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop area when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    dropArea.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropArea.addEventListener(eventName, unhighlight, false);
                });

                // Handle dropped files
                dropArea.addEventListener('drop', handleDrop, false);

                // Handle click to select files
                dropArea.addEventListener('dblclick', () => imageInput.click());

                // Handle file selection
                imageInput.addEventListener('change', function (e) {
                    handleFiles(e.target.files, imageList);
                    updateFileOrder(imageList, 'image'); // Trigger the order update when files are selected
                });

                // Make file list sortable using Sortable.js
                new Sortable(imageList, {
                    animation: 150,  // Add smooth animation for dragging
                    handle: '.drag-handle',  // Use drag handle for dragging items
                    onEnd(evt) {  // Handle when drag ends
                        updateFileOrder(imageList, 'image'); // Update order after drag
                    }
                });
            }

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            function highlight(e) {
                e.currentTarget.style.backgroundColor = '#f0f8ff';
            }

            function unhighlight(e) {
                e.currentTarget.style.backgroundColor = '#fff';
            }

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files, fileList);
            }

            function handleFiles(files, listElement) {
                [...files].forEach(file => {
                    if (!isFileExist(file, listElement)) {
                        const li = createFileListItem(file);
                        listElement.appendChild(li);
                    }
                });
            }

            function isFileExist(file, listElement) {
                return [...listElement.children].some(li =>
                    li.querySelector('.file-name span').textContent === file.name
                );
            }

            function createFileListItem(file) {
                const li = document.createElement('li');
                li.draggable = true;

                const fileInfo = document.createElement('div');
                fileInfo.className = 'file-info';

                const fileName = document.createElement('div');
                fileName.className = 'file-name';

                const icon = document.createElement('img');
                icon.className = 'file-icon';
                icon.src = file.type.startsWith('image/') ?
                    'assets/img/image-icon.png' :
                    'assets/img/pdf-icon.png';

                const nameSpan = document.createElement('span');
                nameSpan.textContent = file.name;

                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'delete-button';
                deleteBtn.innerHTML = '×';
                deleteBtn.onclick = () => li.remove();

                fileName.appendChild(icon);
                fileName.appendChild(nameSpan);
                fileInfo.appendChild(fileName);
                fileInfo.appendChild(deleteBtn);
                li.appendChild(fileInfo);

                // Add drag handle for reordering
                const dragHandle = document.createElement('span');
                dragHandle.className = 'drag-handle';
                dragHandle.innerHTML = '☰';  // Optional: A symbol for drag handle
                li.insertBefore(dragHandle, fileInfo);

                return li;
            }

            function updateFileOrder(listElement, type) {
                const fileOrder = [];
                [...listElement.children].forEach((li, index) => {
                    const fileName = li.querySelector('.file-name span').textContent;
                    fileOrder.push(fileName);  // Save the name of the file in its new order
                });

                // Send the updated file order to the hidden input field
                if (type === 'pdf') {
                    document.getElementById('pdf-file-order').value = JSON.stringify(fileOrder);
                } else if (type === 'image') {
                    document.getElementById('image-file-order').value = JSON.stringify(fileOrder);
                }
            }

            // Initialize both upload areas
            initFileUpload(dropArea, fileInput, fileList);
            initImageUpload(imageDropArea, imageInput, imageList);
        });

    </script>
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: '#editor',
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


</body>

</html>