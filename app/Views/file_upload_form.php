<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h2>Upload File</h2>

    <?php if (session()->getFlashdata('message')) : ?>
        <p style="color:green;"><?php echo session()->getFlashdata('message'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color:red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
