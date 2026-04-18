<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool Directory - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .tool-card:hover { transform: translateY(-5px); }
        .badge-new { background: linear-gradient(90deg, #3b82f6, #2563eb); }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="index.php" class="text-2xl font-bold tracking-tight">Tool<span class="text-blue-600">Hub</span></a>
            <div class="relative w-1/3 hidden md:block">
                <input type="text" id="toolSearch" placeholder="Search across all utilities..." class="w-full bg-gray-100 border-none rounded-full py-2.5 px-10 focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.5 text-gray-400"></i>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <header class="mb-16">
            <h1 class="text-5xl font-extrabold tracking-tight mb-4">Ultimate Toolset</h1>
            <p class="text-xl text-gray-500">A massive collection of free, high-speed online utilities.</p>
        </header>

        <section class="mb-16">
            <h2 class="text-sm font-bold uppercase tracking-[0.2em] text-blue-600 mb-8 flex items-center gap-3">
                <span class="w-8 h-[2px] bg-blue-600"></span> Social Media Downloaders
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $socialTools = [
                    ['name' => 'TikTok Downloader', 'desc' => 'No watermark MP4 downloads', 'icon' => 'fa-brands fa-tiktok', 'color' => 'pink', 'link' => 'tiktok-downloader.php', 'status' => 'Live'],
                    ['name' => 'Instagram Saver', 'desc' => 'Download Reels, Posts & Stories', 'icon' => 'fa-brands fa-instagram', 'color' => 'rose', 'link' => 'instagram-downloader.php', 'status' => 'Live'],
                    ['name' => 'YouTube Thumbnails', 'desc' => 'Get HD video cover images', 'icon' => 'fa-brands fa-youtube', 'color' => 'red', 'link' => 'yt-thumbnail.php', 'status' => 'Live'],
                    ['name' => 'Twitter Video', 'desc' => 'Save videos from X / Twitter', 'icon' => 'fa-brands fa-x-twitter', 'color' => 'slate', 'link' => 'twitter-down.php'],
                    ['name' => 'Facebook Video', 'desc' => 'Public video downloader', 'icon' => 'fa-brands fa-facebook', 'color' => 'blue', 'link' => 'fb-down.php'],
                ];
                foreach ($socialTools as $t) renderTool($t);
                ?>
            </div>
        </section>

        <section class="mb-16">
            <h2 class="text-sm font-bold uppercase tracking-[0.2em] text-orange-600 mb-8 flex items-center gap-3">
                <span class="w-8 h-[2px] bg-orange-600"></span> Documents & PDF
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $docTools = [
                    ['name' => 'PDF to Word', 'desc' => 'Editable .docx conversion', 'icon' => 'fa-solid fa-file-word', 'color' => 'blue', 'link' => 'pdf-to-word.php', 'status' => 'Live'],
                    ['name' => 'PDF Merger', 'desc' => 'Combine multiple files into one', 'icon' => 'fa-solid fa-layer-group', 'color' => 'orange', 'link' => 'pdf-merger.php'],
                    ['name' => 'PDF Splitter', 'desc' => 'Extract specific pages', 'icon' => 'fa-solid fa-scissors', 'color' => 'red', 'link' => 'pdf-split.php'],
                    ['name' => 'Word to PDF', 'desc' => 'Create secure PDF docs', 'icon' => 'fa-solid fa-file-pdf', 'color' => 'emerald', 'link' => 'word-to-pdf.php'],
                    ['name' => 'Image to PDF', 'desc' => 'Convert JPG/PNG to PDF', 'icon' => 'fa-solid fa-images', 'color' => 'indigo', 'link' => 'img-to-pdf.php'],
                ];
                foreach ($docTools as $t) renderTool($t);
                ?>
            </div>
        </section>

        <section class="mb-16">
            <h2 class="text-sm font-bold uppercase tracking-[0.2em] text-purple-600 mb-8 flex items-center gap-3">
                <span class="w-8 h-[2px] bg-purple-600"></span> Image & Design
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $imgTools = [
                    ['name' => 'QR Generator', 'desc' => 'Branded QR code creator', 'icon' => 'fa-solid fa-qrcode', 'color' => 'blue', 'link' => 'qr-generator.php', 'status' => 'Live'],
                    ['name' => 'Color Extractor', 'desc' => 'Get HEX from any image', 'icon' => 'fa-solid fa-palette', 'color' => 'rose', 'link' => 'color-extractor.php'],
                    ['name' => 'Image Hosting', 'desc' => 'Temporary secure file links', 'icon' => 'fa-solid fa-cloud-arrow-up', 'color' => 'sky', 'link' => 'image-hosting.php'],
                    ['name' => 'BG Remover', 'desc' => 'AI background removal', 'icon' => 'fa-solid fa-wand-magic-sparkles', 'color' => 'purple', 'link' => 'bg-remover.php'],
                    ['name' => 'Photo Resizer', 'desc' => 'Quick dimension scaling', 'icon' => 'fa-solid fa-expand', 'color' => 'green', 'link' => 'photo-resize.php'],
                ];
                foreach ($imgTools as $t) renderTool($t);
                ?>
            </div>
        </section>

        <section class="mb-16">
            <h2 class="text-sm font-bold uppercase tracking-[0.2em] text-emerald-600 mb-8 flex items-center gap-3">
                <span class="w-8 h-[2px] bg-emerald-600"></span> Developer Essentials
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $devTools = [
                    ['name' => 'Password Gen', 'desc' => 'High-security passwords', 'icon' => 'fa-solid fa-key', 'color' => 'purple', 'link' => 'password-gen.php', 'status' => 'Live'],
                    ['name' => 'JSON Beautifier', 'desc' => 'Format messy code', 'icon' => 'fa-solid fa-brackets-curly', 'color' => 'amber', 'link' => 'json-format.php'],
                    ['name' => 'Base64 Tool', 'desc' => 'Encode/Decode data strings', 'icon' => 'fa-solid fa-code', 'color' => 'cyan', 'link' => 'base64.php'],
                    ['name' => 'Unit Converter', 'desc' => 'Length, Weight, Temp', 'icon' => 'fa-solid fa-ruler-combined', 'color' => 'green', 'link' => 'unit-converter.php'],
                    ['name' => 'MD5 Generator', 'desc' => 'Create secure file hashes', 'icon' => 'fa-solid fa-fingerprint', 'color' => 'slate', 'link' => 'md5.php'],
                ];
                foreach ($devTools as $t) renderTool($t);
                ?>
            </div>
        </section>
    </main>

    <?php
    function renderTool($tool) {
        $colors = [
            'blue' => 'bg-blue-50 text-blue-600',
            'rose' => 'bg-rose-50 text-rose-600',
            'pink' => 'bg-pink-50 text-pink-600',
            'red' => 'bg-red-50 text-red-600',
            'orange' => 'bg-orange-50 text-orange-600',
            'purple' => 'bg-purple-50 text-purple-600',
            'emerald' => 'bg-emerald-50 text-emerald-600',
            'green' => 'bg-green-50 text-green-600',
            'amber' => 'bg-amber-50 text-amber-600',
            'cyan' => 'bg-cyan-50 text-cyan-600',
            'sky' => 'bg-sky-50 text-sky-600',
            'indigo' => 'bg-indigo-50 text-indigo-600',
            'slate' => 'bg-slate-100 text-slate-600',
        ];
        $colorClass = $colors[$tool['color']] ?? $colors['blue'];
        ?>
        <a href="tools/<?php echo $tool['link']; ?>" class="tool-card group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-2xl hover:border-blue-200 transition-all flex flex-col items-start gap-4">
            <div class="<?php echo $colorClass; ?> w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                <i class="<?php echo $tool['icon']; ?> text-2xl"></i>
            </div>
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors"><?php echo $tool['name']; ?></h3>
                    <?php if (isset($tool['status'])): ?>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-bold bg-green-100 text-green-700 uppercase">Live</span>
                    <?php endif; ?>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed"><?php echo $tool['desc']; ?></p>
            </div>
        </a>
        <?php
    }
    ?>

    <script>
        document.getElementById('toolSearch').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.tool-card').forEach(card => {
                const title = card.querySelector('h3').innerText.toLowerCase();
                const desc = card.querySelector('p').innerText.toLowerCase();
                card.style.display = (title.includes(term) || desc.includes(term)) ? 'flex' : 'none';
            });
        });
    </script>
</body>
</html>