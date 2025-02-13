<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .upload-box {
            width: 400px;
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

<body>
    <div class="upload-box" id="drop-area">
        <p>Drag & Drop PDF files here or click to upload</p>
        <input type="file" id="fileInput" multiple accept="application/pdf" hidden>
        <div class="progress-bar">
            <div id="progress"></div>
        </div>
        <ul class="file-list" id="file-list"></ul>
    </div>

    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileInput");
        const progressBar = document.getElementById("progress");
        const fileList = document.getElementById("file-list");
        let filesArray = [];

        dropArea.addEventListener("click", () => fileInput.click());

        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault();
            dropArea.style.borderColor = "green";
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.style.borderColor = "#007bff";
        });

        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            dropArea.style.borderColor = "#007bff";
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
                li.draggable = true;
                li.dataset.index = index;

                const dragHandle = document.createElement("span");
                dragHandle.textContent = "☰";
                dragHandle.classList.add("drag-handle");
                dragHandle.addEventListener("mousedown", () => {
                    li.classList.add("dragging");
                });

                const fileIcon = document.createElement("img");
                fileIcon.src = "https://cdn-icons-png.flaticon.com/512/337/337946.png";
                fileIcon.classList.add("file-icon");

                const fileInfo = document.createElement("div");
                fileInfo.classList.add("file-info");

                const fileNameContainer = document.createElement("div");
                fileNameContainer.classList.add("file-name");

                const fileName = document.createElement("span");
                fileName.textContent = `${index + 1}. ${file.name}`;

                // Create delete button
                const deleteButton = document.createElement("button");
                deleteButton.textContent = "❌";
                deleteButton.classList.add("delete-button");
                deleteButton.addEventListener("click", () => {
                    filesArray.splice(index, 1);
                    displayFiles();
                });

                fileNameContainer.appendChild(fileName);
                fileNameContainer.appendChild(deleteButton); // Delete button next to file name

                fileInfo.appendChild(fileIcon);
                fileInfo.appendChild(fileNameContainer); // Add file name and delete button as a group

                li.appendChild(dragHandle);
                li.appendChild(fileInfo);
                fileList.appendChild(li);
            });

            addDragAndDropSorting();
        }

        function addDragAndDropSorting() {
            const listItems = document.querySelectorAll(".file-list li");
            listItems.forEach(item => {
                item.addEventListener("dragstart", handleDragStart);
                item.addEventListener("dragover", handleDragOver);
                item.addEventListener("drop", handleDrop);
                item.addEventListener("dragend", handleDragEnd);
            });
        }

        function handleDragStart(event) {
            event.dataTransfer.setData("text/plain", event.target.dataset.index);
            event.target.classList.add("dragging");
        }

        function handleDragOver(event) {
            event.preventDefault();
            const draggingItem = document.querySelector(".dragging");
            const targetItem = event.target.closest("li");
            if (targetItem && draggingItem !== targetItem) {
                const list = [...fileList.children];
                const draggingIndex = list.indexOf(draggingItem);
                const targetIndex = list.indexOf(targetItem);

                filesArray.splice(targetIndex, 0, filesArray.splice(draggingIndex, 1)[0]);
                displayFiles();
            }
        }

        function handleDrop(event) {
            event.preventDefault();
        }

        function handleDragEnd() {
            document.querySelectorAll(".dragging").forEach(el => el.classList.remove("dragging"));
        }
    </script>
</body>

</html>