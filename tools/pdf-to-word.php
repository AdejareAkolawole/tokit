<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$error = "";
$success_file = "";

if (isset($_POST['convert_pdf'])) {
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
        $file = $_FILES['pdf_file']['tmp_name'];
        try {
            $parser = new Parser();
            $pdf = $parser->parseFile($file);
            $text = $pdf->getText();
            
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            $lines = explode("\n", $text);
            foreach ($lines as $line) {
                $section->addText(htmlspecialchars($line));
            }

            $outputDir = __DIR__ . '/../uploads/';
            if (!is_dir($outputDir)) mkdir($outputDir, 0777, true);
            
            $fileName = "converted_" . time() . ".docx";
            $outputPath = $outputDir . $fileName;
            
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($outputPath);
            
            $success_file = $fileName;
        } catch (Exception $e) {
            $error = "Conversion failed: " . $e->getMessage();
        }
    } else {
        $error = "Please upload a valid PDF file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF to Word Converter - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Simple Spinner Animation */
        .loader {
            border-top-color: #3b82f6;
            animation: spinner 1.5s linear infinite;
        }
        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    <div id="loading-overlay" class="fixed inset-0 bg-white/80 backdrop-blur-sm z-50 flex flex-col items-center justify-center hidden">
        <div class="loader w-16 h-16 border-4 border-gray-200 border-t-blue-600 rounded-full mb-4"></div>
        <h2 class="text-xl font-bold text-gray-900">Converting your file...</h2>
        <p class="text-gray-500">Please don't close this tab.</p>
    </div>

    <nav class="max-w-7xl mx-auto p-6">
        <a href="../index.php" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fa-solid fa-chevron-left mr-2 text-xs"></i> Back to Dashboard
        </a>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center bg-blue-100 p-3 rounded-2xl mb-4 text-blue-600">
                <i class="fa-solid fa-file-word text-3xl"></i>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">PDF to Word Converter</h1>
            <p class="text-gray-500">Transform your PDF documents into editable Word files instantly.</p>
        </div>

        <div class="bg-white border border-gray-100 p-10 rounded-[2.5rem] shadow-xl shadow-gray-200/50">
            <form id="convert-form" method="POST" enctype="multipart/form-data" class="space-y-8">
                <div class="border-2 border-dashed border-gray-200 rounded-3xl p-12 text-center hover:border-blue-400 transition-all bg-gray-50/50">
                    <i class="fa-solid fa-file-import text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-700">Select PDF file</h3>
                    <p class="text-gray-400 text-sm mb-6">Upload the document you want to convert</p>
                    <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" class="hidden" onchange="updateFileName()" required>
                    <button type="button" onclick="document.getElementById('pdf_file').click()" class="bg-white border border-gray-200 text-gray-700 px-6 py-2.5 rounded-xl font-bold hover:bg-gray-50 transition-all shadow-sm">
                        Browse Files
                    </button>
                    <div id="file-name-display" class="mt-4 text-blue-600 font-medium italic"></div>
                </div>

                <button type="submit" name="convert_pdf" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-blue-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-rotate"></i>
                    Convert to Word (.docx)
                </button>
            </form>

            <?php if ($error): ?>
                <div class="mt-6 p-4 bg-red-50 text-red-600 rounded-xl text-sm font-medium border border-red-100">
                    <i class="fa-solid fa-circle-exclamation mr-2"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if ($success_file): ?>
                <div class="mt-8 p-6 bg-green-50 border border-green-100 rounded-[2rem] animate-in fade-in zoom-in">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-600 text-white p-2 rounded-lg">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-green-900">Conversion Ready!</h4>
                                <p class="text-green-700 text-sm">Your Word document is ready.</p>
                            </div>
                        </div>
                        <a href="../uploads/<?php echo $success_file; ?>" download class="bg-gray-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-gray-800 transition-all flex items-center gap-2">
                            <i class="fa-solid fa-download"></i> Download .docx
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const form = document.getElementById('convert-form');
        const overlay = document.getElementById('loading-overlay');

        // Show loading overlay when form is submitted
        form.onsubmit = function() {
            const fileInput = document.getElementById('pdf_file');
            if(fileInput.files.length > 0) {
                overlay.classList.remove('hidden');
            }
        };

        function updateFileName() {
            const input = document.getElementById('pdf_file');
            const display = document.getElementById('file-name-display');
            if(input.files.length > 0) {
                display.innerHTML = `<i class="fa-solid fa-file-pdf mr-2"></i> ${input.files[0].name}`;
            }
        }
    </script>
</body>
</html>