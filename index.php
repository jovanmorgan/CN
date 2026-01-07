<?php
// Folder yang ingin ditampilkan
$folder = "icon-cn/";

// Ambil daftar file dalam folder
$files = array_diff(scandir($folder), ['.', '..']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Media Center C-Net (PHP Version)</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background: #f8f9fa;
        }

        .media-card {
            transition: .25s;
        }

        .media-card:hover {
            transform: translateY(-6px);
        }

        .copy-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            opacity: .95;
        }

        .media-wrapper {
            position: relative;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f1f3f5;
        }

        .media-wrapper img,
        .media-wrapper video {
            max-height: 100%;
            max-width: 100%;
        }

        .filename {
            word-break: break-all;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-4">📦 Semua Media C-Net (PHP Version)</h2>

        <div class="row g-4">

            <?php
            foreach ($files as $file):

                $filePath = $folder . $file;
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $safeUrl = htmlspecialchars($filePath);

                // Tentukan preview file
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif'])) {
                    $preview = "<img src='$safeUrl' class='img-fluid'>";
                } elseif (in_array($ext, ['mp4', 'mov', 'webm'])) {
                    $preview = "<video src='$safeUrl' controls></video>";
                } elseif (in_array($ext, ['mp3', 'wav', 'ogg'])) {
                    $preview = "<audio src='$safeUrl' controls></audio>";
                } elseif ($ext === "pdf") {
                    $preview = "<i class='bi bi-file-earmark-pdf fs-1 text-danger'></i>";
                } else {
                    $preview = "<i class='bi bi-file-earmark fs-1'></i>";
                }
            ?>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm media-card">
                        <div class="media-wrapper">
                            <button class="btn btn-primary btn-sm copy-btn"
                                onclick="copyLink('<?php echo $safeUrl ?>')">Copy Link</button>

                            <?= $preview ?>
                        </div>
                        <div class="card-body text-center">
                            <small class="filename"><?= htmlspecialchars($file) ?></small>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <script>
        function copyLink(path) {
            const full = window.location.origin + "/" + path;
            navigator.clipboard.writeText(full);
            alert("Link disalin:\n" + full);
        }
    </script>

</body>

</html>