<?php
// 1. Load Composer Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

$qr_image_data = "";

if (isset($_POST['generate'])) {
    $data = $_POST['qr_data'] ?: 'https://google.com';
    $size = (int)$_POST['size'] ?: 300;
    
    // Convert Hex to RGB for the library
    list($r, $g, $b) = sscanf($_POST['color'], "#%02x%02x%02x");

    // 2. Create QR Code logic
    $writer = new PngWriter();
    $qrCode = QrCode::create($data)
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
        ->setSize($size)
        ->setMargin(10)
        ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
        ->setForegroundColor(new Color($r, $g, $b))
        ->setBackgroundColor(new Color(255, 255, 255));

    $result = $writer->write($qrCode);
    
    // 3. Generate Data URI
    $qr_image_data = $result->getDataUri();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Generator - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    <nav class="max-w-7xl mx-auto p-6">
        <a href="../index.php" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fa-solid fa-chevron-left mr-2 text-xs"></i> Back to Dashboard
        </a>
    </nav>

    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="mb-12">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <i class="fa-solid fa-qrcode text-white text-xl"></i>
                </div>
                <h1 class="text-3xl font-extrabold tracking-tight">QR Code Generator</h1>
            </div>
            <p class="text-gray-500 max-w-xl">Create professional, high-resolution QR codes for URLs, text, or business cards. Fully private and processed on-device.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-gray-100 p-8 rounded-[2rem] shadow-sm">
                    <form method="POST" class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Content</label>
                            <textarea 
                                name="qr_data" 
                                rows="4" 
                                required 
                                class="w-full bg-gray-50 border border-gray-200 rounded-2xl p-4 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all resize-none" 
                                placeholder="Paste your link or type text here..."
                            ><?php echo isset($_POST['qr_data']) ? htmlspecialchars($_POST['qr_data']) : ''; ?></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Resolution (px)</label>
                                <div class="relative">
                                    <input type="number" name="size" value="<?php echo $_POST['size'] ?? '300'; ?>" min="100" max="1000" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 pl-10 focus:border-blue-500 outline-none">
                                    <i class="fa-solid fa-expand absolute left-4 top-4 text-gray-400 text-sm"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Brand Color</label>
                                <div class="flex items-center gap-3 bg-gray-50 border border-gray-200 rounded-xl p-2">
                                    <input type="color" name="color" value="<?php echo $_POST['color'] ?? '#2563eb'; ?>" class="h-10 w-14 bg-transparent border-none cursor-pointer">
                                    <span class="text-sm text-gray-500 font-mono uppercase"><?php echo $_POST['color'] ?? '#2563eb'; ?></span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="generate" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-blue-200 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                            Generate QR Code
                        </button>
                    </form>
                </div>
                
                <div class="bg-blue-50 rounded-2xl p-6 flex gap-4 border border-blue-100">
                    <i class="fa-solid fa-circle-info text-blue-600 mt-1"></i>
                    <p class="text-sm text-blue-800 leading-relaxed">
                        <strong>Privacy Note:</strong> Your content is processed directly on our secure server. We do not store any of the data you use to generate these QR codes.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-100 p-8 rounded-[2rem] shadow-sm flex flex-col items-center justify-center min-h-[400px] sticky top-24">
                    <?php if ($qr_image_data): ?>
                        <div class="p-4 bg-white rounded-3xl border-4 border-gray-50 shadow-inner mb-8 group relative">
                            <img src="<?php echo $qr_image_data; ?>" alt="QR Code" class="w-full max-w-[240px] h-auto rounded-xl">
                        </div>
                        
                        <div class="w-full space-y-3">
                            <a href="<?php echo $qr_image_data; ?>" download="qr-code.png" class="flex items-center justify-center gap-2 w-full bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-gray-800 transition-all">
                                <i class="fa-solid fa-download"></i> Download PNG
                            </a>
                            <button onclick="window.print()" class="flex items-center justify-center gap-2 w-full bg-white border border-gray-200 text-gray-700 py-3 rounded-xl font-bold hover:bg-gray-50 transition-all">
                                <i class="fa-solid fa-print"></i> Print QR
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="text-center px-6">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fa-solid fa-qrcode text-3xl text-gray-200"></i>
                            </div>
                            <p class="text-gray-400 text-sm font-medium">Your generated QR code will appear here for preview and download.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>