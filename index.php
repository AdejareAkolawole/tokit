<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToolHub | Professional Multi-Tool Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .tool-card:hover { transform: translateY(-5px); }
        .gradient-bg { background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 100%); }
    </style>
</head>
<body class="bg-white text-gray-900">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <i class="fa-solid fa-screwdriver-wrench text-white text-xl"></i>
                </div>
                <span class="text-2xl font-bold tracking-tight">Tool<span class="text-blue-600">Hub</span></span>
            </div>
            <div class="hidden md:flex items-center gap-8 font-medium text-gray-600 text-sm">
                <a href="#tools" class="hover:text-blue-600 transition-colors">Tools</a>
                <a href="#how-it-works" class="hover:text-blue-600 transition-colors">How it Works</a>
                <a href="#features" class="hover:text-blue-600 transition-colors">Features</a>
                <a href="https://github.com" class="bg-gray-900 text-white px-5 py-2.5 rounded-full hover:bg-gray-800 transition-all">Get Started</a>
            </div>
        </div>
    </nav>

    <header class="max-w-7xl mx-auto px-6 pt-24 pb-20 text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 tracking-tight">
            One platform.<br><span class="text-blue-600">Infinite possibilities.</span>
        </h1>
        <p class="text-xl text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">
            The ultimate toolkit for creators. Fast, secure, and completely free. No registration required.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#tools" class="bg-blue-600 text-white px-10 py-4 rounded-full font-bold shadow-xl shadow-blue-100 hover:bg-blue-700 hover:scale-105 transition-all">
                Start Using Tools
            </a>
        </div>
    </header>

    <section id="tools" class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Popular Utilities</h2>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="tools/qr-generator.php" class="tool-card bg-gray-50 border border-transparent p-8 rounded-3xl hover:bg-white hover:border-blue-100 hover:shadow-2xl transition-all group">
                <div class="bg-blue-600 w-12 h-12 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-qrcode text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">QR Generator</h3>
                <p class="text-gray-500 mb-6">Create custom QR codes with adjustable colors and sizes instantly.</p>
                <span class="text-blue-600 font-bold text-sm">Launch Tool <i class="fa-solid fa-chevron-right ml-1"></i></span>
            </a>

            <a href="tools/tiktok-downloader.php" class="tool-card bg-gray-50 border border-transparent p-8 rounded-3xl hover:bg-white hover:border-blue-100 hover:shadow-2xl transition-all group">
                <div class="bg-pink-500 w-12 h-12 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-pink-200">
                    <i class="fa-brands fa-tiktok text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">TikTok Downloader</h3>
                <p class="text-gray-500 mb-6">Save videos without watermarks in high definition (HD).</p>
                <span class="text-pink-500 font-bold text-sm">Launch Tool <i class="fa-solid fa-chevron-right ml-1"></i></span>
            </a>

            <a href="tools/pdf-to-word.php" class="tool-card bg-gray-50 border border-transparent p-8 rounded-3xl hover:bg-white hover:border-blue-100 hover:shadow-2xl transition-all group">
                <div class="bg-orange-500 w-12 h-12 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-orange-200">
                    <i class="fa-solid fa-file-pdf text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">PDF-to-WORD</h3>
                <p class="text-gray-500 mb-6">Edit, merge, and modify PDF files directly in your browser.</p>
                <span class="text-orange-500 font-bold text-sm">Launch Tool <i class="fa-solid fa-chevron-right ml-1"></i></span>
            </a>
        </div>
    </section>

    <section id="how-it-works" class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-extrabold mb-6 leading-tight">Simple. Fast. <br><span class="text-blue-600">Zero Complications.</span></h2>
                    <p class="text-gray-500 text-lg mb-8">We built ToolHub to solve the annoying problem of visiting 10 different sites to do 10 simple tasks.</p>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">1</div>
                            <div>
                                <h4 class="font-bold text-lg">Choose your tool</h4>
                                <p class="text-gray-500">Select any utility from our growing dashboard.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">2</div>
                            <div>
                                <h4 class="font-bold text-lg">Input your data</h4>
                                <p class="text-gray-500">Upload your file, paste your link, or type your text.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">3</div>
                            <div>
                                <h4 class="font-bold text-lg">Download result</h4>
                                <p class="text-gray-500">Get your processed file instantly with no wait times.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-blue-600 rounded-3xl w-full aspect-square rotate-3 absolute inset-0 opacity-10"></div>
                    <div class="bg-white p-4 rounded-3xl shadow-2xl relative border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800" alt="Dashboard Preview" class="rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center">
                <i class="fa-solid fa-shield-halved text-4xl text-blue-600 mb-6"></i>
                <h3 class="text-xl font-bold mb-3">Privacy First</h3>
                <p class="text-gray-500">Your data is processed locally or deleted immediately after use. We never store your files.</p>
            </div>
            <div class="text-center">
                <i class="fa-solid fa-bolt text-4xl text-yellow-500 mb-6"></i>
                <h3 class="text-xl font-bold mb-3">Lightning Fast</h3>
                <p class="text-gray-500">Powered by PHP 8.x and high-speed optimized libraries for instant results.</p>
            </div>
            <div class="text-center">
                <i class="fa-solid fa-circle-check text-4xl text-green-500 mb-6"></i>
                <h3 class="text-xl font-bold mb-3">Always Free</h3>
                <p class="text-gray-500">No subscriptions, no hidden fees, and no annoying pop-up ads. Just tools.</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 mb-24">
        <div class="bg-gray-900 rounded-[3rem] p-12 md:p-20 text-center text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-blue-600 rounded-full blur-[100px] opacity-20"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to boost your workflow?</h2>
            <p class="text-gray-400 text-lg mb-10 max-w-xl mx-auto">Join thousands of users who use ToolHub every day to simplify their digital tasks.</p>
            <a href="#tools" class="inline-block bg-white text-gray-900 px-10 py-4 rounded-full font-bold hover:bg-blue-50 transition-all">
                Get Started Now
            </a>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center gap-2 mb-4 md:mb-0">
                <div class="bg-gray-100 p-1.5 rounded">
                    <i class="fa-solid fa-screwdriver-wrench text-gray-900"></i>
                </div>
                <span class="font-bold">ToolHub</span>
            </div>
            <p class="text-gray-400 text-sm">© <?php echo date('Y'); ?> ToolHub Platform. Built for the community.</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors text-xl"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors text-xl"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>