<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body class="font-sans bg-gray-100">

<div class="flex h-full">
    <!-- Section gauche avec le formulaire -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-50 p-8">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
            <h3 class="text-center text-2xl font-semibold text-gray-800 mb-6">Connexion</h3>

            <!-- Message de feedback -->
            @if(session('message'))
                <div class="text-center text-sm mb-4 text-red-500">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Validation des champs -->
            @if ($errors->any())
                <div class="text-center text-sm mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" method="POST" action="{{ route('showLogin') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email :</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full p-3 border border-gray-300 rounded-md" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-md" required>
                </div>

                <button
                    type="submit"
                    id="submitBtn"
                    class="w-full py-3 bg-black text-white rounded-md hover:bg-[#ffcb05] hover:text-black transition duration-300"
                >
                    Se connecter
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="#" class="text-black hover:underline">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>

    <!-- Section droite avec l'image -->
    <div class="hidden md:block w-1/2 bg-[#ffcb05] bg-contain bg-center bg-no-repeat " style="background-image: url('{{asset('assets/uploads/images/MTN_cover (1).png')}}');"></div>
</div>

</body>
</html>
