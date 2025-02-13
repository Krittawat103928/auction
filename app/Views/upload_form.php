<?php if (!empty($uploadedPdfFiles)): ?>
    <h3>Uploaded PDF Files</h3>
    <ul>
        <?php foreach ($uploadedPdfFiles as $pdfFile): ?>
            <li><?= esc($pdfFile->getBasename()) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!empty($uploadedImageFiles)): ?>
    <h3>Uploaded Image Files</h3>
    <ul>
        <?php foreach ($uploadedImageFiles as $imageFile): ?>
            <li><?= esc($imageFile->getBasename()) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>