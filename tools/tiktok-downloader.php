<?php
$video_url = "";
$error = "";
$download_link = "";

if (isset($_POST['download'])) {
    $url = $_POST['tiktok_url'];

    // Basic Validation
    if (filter_var($url, FILTER_VALIDATE_URL) && strpos($url, 'tiktok.com') !== false) {
        
        // TikTok Scraping Logic (Using a common headers approach)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.tikwm.com/api/?url=" . urlencode($url)); // Using a reliable free public parser API
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        if (isset($result['data']['play'])) {
            $download_link = $result['data']['play']; // No watermark version
            $video_title = $result['data']['title'];
            $cover = $result['data']['cover'];
        } else {
            $error = "Could not fetch the video. Please check if the link is correct and public.";
        }
    } else {
        $error = "Please enter a valid TikTok URL.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok Downloader - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    <nav class="max-w-7xl mx-auto p-6">
        <a href="../index.php" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-pink-600 transition-colors">
            <i class="fa-solid fa-chevron-left mr-2 text-xs"></i> Back to Dashboard
        </a>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center bg-pink-100 p-3 rounded-2xl mb-4">
                <i class="fa-brands fa-tiktok text-pink-600 text-3xl"></i>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">TikTok Video Downloader</h1>
            <p class="text-gray-500">Download high-quality videos without watermarks instantly.</p>
        </div>

        <div class="bg-white border border-gray-100 p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 mb-8">
            <form method="POST" class="flex flex-col md:flex-row gap-4">
                <div class="relative flex-grow">
                    <input 
                        type="text" 
                        name="tiktok_url" 
                        required 
                        placeholder="Paste TikTok link here (e.g., https://vm.tiktok.com/...)" 
                        class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 px-6 pl-12 focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 outline-none transition-all"
                    >
                    <i class="fa-solid fa-link absolute left-4 top-5 text-gray-400"></i>
                </div>
                <button type="submit" name="download" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-8 py-4 rounded-2xl transition-all shadow-lg shadow-pink-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-download"></i> Fetch Video
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
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="<?php echo $cover; ?>" class="w-full h-auto blur-sm opacity-50 scale-110">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fa-solid fa-circle-check text-green-500 text-6xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2 line-clamp-2"><?php echo htmlspecialchars($video_title); ?></h3>
                        <p class="text-gray-500 mb-6 text-sm">Video is ready for download in HD without watermark.</p>
                        
                        <div class="flex flex-col gap-3">
                           <a href="download.php?url=<?php echo urlencode($download_link); ?>" 
   class="flex items-center justify-center gap-2 w-full bg-gray-900 text-white py-4 rounded-xl font-bold hover:bg-gray-800 transition-all">
    <i class="fa-solid fa-download"></i> Download Video Directly
</a>
                            </a>
                            <a href="tiktok-downloader.php" class="text-center text-gray-400 text-sm hover:text-gray-600 transition-colors">Download another video</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 opacity-60">
            <div class="text-center">
                <p class="font-bold text-lg mb-1">1. Copy Link</p>
                <p class="text-xs">Copy the URL from the TikTok app or website.</p>
            </div>
            <div class="text-center">
                <p class="font-bold text-lg mb-1">2. Paste & Fetch</p>
                <p class="text-xs">Paste the link above and let us process it.</p>
            </div>
            <div class="text-center">
                <p class="font-bold text-lg mb-1">3. Save Video</p>
                <p class="text-xs">Click download to save the MP4 to your device.</p>
            </div>
        </div>
    </div>

</body>
</html>