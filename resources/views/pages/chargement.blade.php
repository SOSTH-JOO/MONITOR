<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chargement - MTN Monitor</title>
  <script>
    // Redirection après 30 secondes
    setTimeout(function () {
      window.location.href = "login";
    }, 5000);
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">

  <div class="flex flex-col items-center">
    <!-- Logo ou icône de chargement -->
    <div class="relative mb-8">
      <div class="w-32 h-32 rounded-full border-8 border-yellow-400 border-t-transparent animate-spin"></div>
      <div class="absolute inset-0 flex items-center justify-center text-yellow-400 font-bold text-xl">
        MTN
      </div>
    </div>

    <!-- Texte de chargement -->
    <h1 class="text-2xl font-semibold text-yellow-400 mb-4">Chargement en cours...</h1>
    <p class="text-sm text-gray-300">Veuillez patienter pendant que nous préparons votre session.</p>
  </div>

</body>
</html>
