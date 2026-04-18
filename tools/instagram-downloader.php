<?php
$video_url = "";
$error = "";
$download_link = "";
$thumbnail = "";

if (isset($_POST['download'])) {
    $url = $_POST['ig_url'];

    // Basic Validation for Instagram URLs
    if (filter_var($url, FILTER_VALIDATE_URL) && (strpos($url, 'instagram.com') !== false || strpos($url, 'instagr.am') !== false)) {
        
        // We use a public API wrapper for Instagram to bypass login requirements
        // Note: Using a service like 'SnapInsta' or 'savefrom' logic via an API proxy
        $api_url = "https://api.snapinsta.io/api/ajaxSearch"; // This is a conceptual endpoint for public parsers
        
        $ch = curl_init();
        // Using a common third-party helper API for the backend logic
        curl_setopt($ch, CURLOPT_URL, "https://igdownloader.pro/api/parse?url=" . urlencode($url)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        if (isset($result['url'])) {
            $download_link = $result['url'];
            $thumbnail = $result['thumbnail'] ?? '';
        } else {
            $error = "Unable to fetch video. Instagram often blocks automated requests. Try a different link or ensure the account is public.";
        }
    } else {
        $error = "Please enter a valid Instagram URL (e.g., https://www.instagram.com/reels/xyz/)";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Downloader - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .loader { border-top-color: #f43f5e; animation: spinner 1.5s linear infinite; }
        @keyframes spinner { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    <div id="loading-overlay" class="fixed inset-0 bg-white/80 backdrop-blur-sm z-50 flex flex-col items-center justify-center hidden">
        <div class="loader w-16 h-16 border-4 border-gray-200 border-t-rose-600 rounded-full mb-4"></div>
        <h2 class="text-xl font-bold">Fetching Instagram Video...</h2>
    </div>

    <nav class="max-w-7xl mx-auto p-6">
        <a href="../all-tools.php" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-rose-600 transition-colors">
            <i class="fa-solid fa-chevron-left mr-2 text-xs"></i> Back to Directory
        </a>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center bg-rose-100 p-3 rounded-2xl mb-4 text-rose-600">
                <i class="fa-brands fa-instagram text-3xl"></i>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">Instagram Video Downloader</h1>
            <p class="text-gray-500">Save Reels and Videos in high quality instantly.</p>
        </div>

        <div class="bg-white border border-gray-100 p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 mb-8">
            <form id="download-form" method="POST" class="flex flex-col md:flex-row gap-4">
                <div class="relative flex-grow">
                    <input 
                        type="text" 
                        name="ig_url" 
                        required 
                        placeholder="Paste Instagram link here..." 
                        class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 px-6 pl-12 focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 outline-none transition-all"
                    >
                    <i class="fa-solid fa-link absolute left-4 top-5 text-gray-400"></i>
                </div>
                <button type="submit" name="download" class="bg-gradient-to-r from-purple-600 to-rose-500 hover:opacity-90 text-white font-bold px-8 py-4 rounded-2xl transition-all shadow-lg shadow-rose-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-bolt"></i> Get Video
                </button>
            </form>

            <?php if ($error): ?>
                <p class="mt-4 text-red-500 text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if ($download_link): ?>
            <div class="bg-white border border-gray-100 p-8 rounded-[2.5rem] shadow-sm animate-in fade-in slide-in-from-bottom-4 duration-500">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="relative rounded-2xl overflow-hidden bg-gray-100 flex items-center justify-center aspect-video">
                        <?php if($thumbnail): ?>
                            <img src="<?php echo $thumbnail; ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <i class="fa-brands fa-instagram text-6xl text-gray-300"></i>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                             <i class="fa-solid fa-circle-play text-white text-5xl opacity-80"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Video Ready!</h3>
                        <div class="flex flex-col gap-3">
                            <a href="download.php?url=<?php echo urlencode($download_link); ?>" class="flex items-center justify-center gap-2 w-full bg-gray-900 text-white py-4 rounded-xl font-bold hover:bg-gray-800 transition-all">
                                <i class="fa-solid fa-download"></i> Download Video (MP4)
                            </a>
                            <p class="text-center text-xs text-gray-400 font-medium italic">Powered by ToolHub Private Proxy</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script>
        const form = document.getElementById('download-form');
        const overlay = document.getElementById('loading-overlay');

        form.onsubmit = function() {
            overlay.classList.remove('hidden');
        };
    </script>
</body>
</html>