<?php
$password = "";
$length = 16;

if (isset($_POST['generate'])) {
    $length = isset($_POST['length']) ? (int)$_POST['length'] : 16;
    
    // Define character sets
    $sets = [];
    $sets[] = 'abcdefghijklmnopqrstuvwxyz';
    $sets[] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $sets[] = '0123456789';
    $sets[] = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    $allChars = implode('', $sets);
    $password = '';

    // Ensure at least one character from each selected set is included for strength
    foreach ($sets as $set) {
        $password .= $set[random_int(0, strlen($set) - 1)];
    }

    // Fill the rest of the length with random characters
    for ($i = strlen($password); $i < $length; $i++) {
        $password .= $allChars[random_int(0, strlen($allChars) - 1)];
    }

    // Shuffle the result so the first characters aren't predictable
    $password = str_shuffle($password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Password Generator - ToolHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    <nav class="max-w-7xl mx-auto p-6">
        <a href="../all-tools.php" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-purple-600 transition-colors">
            <i class="fa-solid fa-chevron-left mr-2 text-xs"></i> Back to Directory
        </a>
    </nav>

    <div class="max-w-3xl mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center bg-purple-100 p-3 rounded-2xl mb-4 text-purple-600">
                <i class="fa-solid fa-shield-halved text-3xl"></i>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">Password Generator</h1>
            <p class="text-gray-500">Create strong, cryptographically secure passwords instantly.</p>
        </div>

        <div class="bg-white border border-gray-100 p-10 rounded-[2.5rem] shadow-xl shadow-gray-200/50">
            <form method="POST" class="space-y-8">
                <div>
                    <div class="flex justify-between mb-4">
                        <label class="font-bold text-gray-700">Password Length</label>
                        <span id="lengthValue" class="text-purple-600 font-bold text-xl"><?php echo $length; ?></span>
                    </div>
                    <input type="range" name="length" min="8" max="64" value="<?php echo $length; ?>" 
                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-purple-600"
                           oninput="document.getElementById('lengthValue').innerText = this.value">
                    <div class="flex justify-between text-xs text-gray-400 mt-2">
                        <span>Weak (8)</span>
                        <span>Strong (64)</span>
                    </div>
                </div>

                <button type="submit" name="generate" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-purple-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Generate Secure Password
                </button>
            </form>

            <?php if ($password): ?>
                <div class="mt-10 p-2 bg-gray-50 border border-gray-100 rounded-2xl">
                    <div class="flex flex-col md:flex-row items-center gap-4 p-4">
                        <div class="flex-grow font-mono text-xl md:text-2xl font-bold text-gray-800 break-all text-center md:text-left tracking-wider">
                            <?php echo htmlspecialchars($password); ?>
                        </div>
                        <button onclick="copyToClipboard('<?php echo $password; ?>')" 
                                id="copyBtn"
                                class="flex-shrink-0 bg-gray-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-gray-800 transition-all flex items-center gap-2 w-full md:w-auto justify-center">
                            <i class="fa-solid fa-copy"></i> Copy
                        </button>
                    </div>
                </div>
                
                <div class="mt-4 flex items-center gap-2 px-4">
                    <div class="h-2 flex-grow bg-green-500 rounded-full"></div>
                    <div class="h-2 flex-grow bg-green-500 rounded-full"></div>
                    <div class="h-2 flex-grow bg-green-500 rounded-full"></div>
                    <span class="text-xs font-bold text-green-600 uppercase tracking-widest ml-2">Very Strong</span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                const btn = document.getElementById('copyBtn');
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
                btn.classList.replace('bg-gray-900', 'bg-green-600');
                
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.classList.replace('bg-green-600', 'bg-gray-900');
                }, 2000);
            });
        }
    </script>
</body>
</html>