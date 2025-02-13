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
            align-items: center;
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

                                    <input type="text" class="form-control" id="basic-url"
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

                                    <select class="form-select" id="exampleSelect" data-placeholder="Choose one thing"
                                        aria-describedby="basic-addon3">
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


    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileInput");
        const fileList = document.getElementById("file-list");
        let filesArray = [];

        dropArea.addEventListener("click", () => fileInput.click());
        dropArea.addEventListener("dragover", (event) => event.preventDefault());
        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            handleFiles(event.dataTransfer.files);
        });
        fileInput.addEventListener("change", () => handleFiles(fileInput.files));

        function handleFiles(files) {
            const validFiles = Array.from(files).filter(file => file.type === "application/pdf");
            filesArray = [...filesArray, ...validFiles];
            displayFiles();
        }

        function displayFiles() {
            fileList.innerHTML = "";
            filesArray.forEach((file, index) => {
                const li = document.createElement("li");
                li.textContent = `${index + 1}. ${file.name}`;
                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.classList.add("delete-button");
                deleteButton.onclick = () => deleteFile(index);
                li.appendChild(deleteButton);
                fileList.appendChild(li);
            });
        }

        function deleteFile(index) {
            filesArray.splice(index, 1);
            displayFiles();
        }


        // Handle Image file upload
        const imageDropArea = document.getElementById("image-drop-area");
        const imageInput = document.getElementById("imageInput");
        const imageList = document.getElementById("image-list");
        let imagesArray = [];

        imageDropArea.addEventListener("click", () => imageInput.click());
        imageDropArea.addEventListener("dragover", (event) => event.preventDefault());
        imageDropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            handleImageFiles(event.dataTransfer.files);
        });
        imageInput.addEventListener("change", () => handleImageFiles(imageInput.files));

        function handleImageFiles(files) {
            const validFiles = Array.from(files).filter(file => file.type.startsWith("image/"));
            imagesArray = [...imagesArray, ...validFiles];
            displayImageFiles();
        }

        function displayImageFiles() {
            imageList.innerHTML = "";
            imagesArray.forEach((file, index) => {
                const li = document.createElement("li");
                li.textContent = `${index + 1}. ${file.name}`;
                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.classList.add("delete-button");
                deleteButton.onclick = () => deleteImageFile(index);
                li.appendChild(deleteButton);
                imageList.appendChild(li);
            });
        }

        function deleteImageFile(index) {
            imagesArray.splice(index, 1);
            displayImageFiles();
        }

    </script>
</body>

</html>