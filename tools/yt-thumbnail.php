<?php
$video_url = "";
$error = "";
$video_id = "";

if (isset($_POST['fetch'])) {
    $url = $_POST['yt_url'];

    // Regular expression to extract YouTube Video ID
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
    
    if (preg_match($pattern, $url, $matches)) {
        $video_id = $matches[1];
    } else {
        $error = "Invalid YouTube URL. Please make sure the link is correct.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Thumbnail Downloader - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    <nav class="max-w-7xl mx-auto p-6">
        <a href="../all-tools.php" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-red-600 transition-colors">
            <i class="fa-solid fa-chevron-left mr-2 text-xs"></i> Back to Directory
        </a>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center bg-red-100 p-3 rounded-2xl mb-4 text-red-600">
                <i class="fa-brands fa-youtube text-3xl"></i>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">YouTube Thumbnail Downloader</h1>
            <p class="text-gray-500">Grab high-quality thumbnails from any YouTube video instantly.</p>
        </div>

        <div class="bg-white border border-gray-100 p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 mb-8">
            <form method="POST" class="flex flex-col md:flex-row gap-4">
                <div class="relative flex-grow">
                    <input 
                        type="text" 
                        name="yt_url" 
                        required 
                        placeholder="Paste YouTube video link here..." 
                        class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 px-6 pl-12 focus:ring-4 focus:ring-red-500/10 focus:border-red-500 outline-none transition-all"
                        value="<?php echo isset($_POST['yt_url']) ? htmlspecialchars($_POST['yt_url']) : ''; ?>"
                    >
                    <i class="fa-solid fa-link absolute left-4 top-5 text-gray-400"></i>
                </div>
                <button type="submit" name="fetch" class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-2xl transition-all shadow-lg shadow-red-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-image"></i> Fetch Thumbnails
                </button>
            </form>

            <?php if ($error): ?>
                <p class="mt-4 text-red-500 text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if ($video_id): ?>
            <div class="grid grid-cols-1 gap-8 animate-in fade-in slide-in-from-bottom-4 duration-500">
                
                <div class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm">
                    <h3 class="font-bold mb-4 flex items-center justify-between">
                        HD Quality (1280x720)
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-md">Best for Wallpapers</span>
                    </h3>
                    <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" class="w-full rounded-xl mb-4 shadow-md" alt="HD Thumbnail">
                    <a href="download.php?url=<?php echo urlencode("https://img.youtube.com/vi/$video_id/maxresdefault.jpg"); ?>" class="w-full bg-gray-900 text-white py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-gray-800 transition-all">
                        <i class="fa-solid fa-download"></i> Download HD Image
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm">
                        <h3 class="font-bold mb-4">Standard Quality</h3>
                        <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/hqdefault.jpg" class="w-full rounded-xl mb-4" alt="HQ Thumbnail">
                        <a href="download.php?url=<?php echo urlencode("https://img.youtube.com/vi/$video_id/hqdefault.jpg"); ?>" class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-gray-200 transition-all">
                            <i class="fa-solid fa-download"></i> Download SD
                        </a>
                    </div>

                    <div class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm">
                        <h3 class="font-bold mb-4">Small / Preview</h3>
                        <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/mqdefault.jpg" class="w-full rounded-xl mb-4" alt="MQ Thumbnail">
                        <a href="download.php?url=<?php echo urlencode("https://img.youtube.com/vi/$video_id/mqdefault.jpg"); ?>" class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-gray-200 transition-all">
                            <i class="fa-solid fa-download"></i> Download Small
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>