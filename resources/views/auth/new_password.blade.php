<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de Mot de Passe</title>
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
    <div class="hidden md:block w-1/2 bg-[#ffcb05] bg-contain bg-center bg-no-repeat " style="background-image: url('{{asset('assets/uploads/images/MTN_cover (1).png')}}');"></div>

    <!-- Section gauche avec le formulaire -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-50 p-8">

        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
            <h1 class="text-2xl font-bold text-center mb-6">Bienvenue {{ $user->name }}</h1>
            <h4 class="text-center text-2xl font-semibold text-gray-800 mb-6">
                    Réinitialisez Votre Mot de Passe
            </h4>


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

            <form id="loginForm" method="POST" action="{{ route('update.password', ['slug' => $slug]) }}">
                @csrf
                <div class="mb-4">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <ul id="passwordConditions" class="mt-2 text-sm">
                        <li id="minLength" class="text-red-500">Doit contenir au moins 8 caractères</li>
                        <li id="hasNumber" class="text-red-500">Doit contenir un chiffre</li>
                        <li id="hasUpperCase" class="text-red-500">Doit contenir une lettre majuscule</li>
                        <li id="hasSpecialChar" class="text-red-500">Doit contenir un caractère spécial (! ,$ ,# et %)</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirmation de Mot de passe :</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-3 border border-gray-300 rounded-md" required disabled>
                </div>
                <!-- ... juste avant la fermeture du formulaire -->

            <div class="mb-4 flex items-center">
                <input type="checkbox" id="togglePassword" class="mr-2">
                <label for="togglePassword" class="text-sm text-gray-600">Afficher les mots de passe</label>
            </div>

            <!-- ... -->

                <button
                    type="submit"
                    id="submitBtn"
                    class="w-full py-3 bg-black text-white rounded-md hover:bg-[#ffcb05] hover:text-black transition duration-300"
                    disabled>
                    Réinitialiser
                </button>

            </form>

        </div>
    </div>

    <!-- Section droite avec l'image -->
</div>

<script>
    // Récupération des éléments HTML
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const submitBtn = document.getElementById('submitBtn');
    const passwordConditions = document.getElementById('passwordConditions');
    const minLength = document.getElementById('minLength');
    const hasNumber = document.getElementById('hasNumber');
    const hasUpperCase = document.getElementById('hasUpperCase');
    const hasSpecialChar = document.getElementById('hasSpecialChar');

    // Fonction de validation du mot de passe
    function validatePassword() {
        const password = passwordInput.value;

        // Vérification des conditions
        const isValidLength = password.length >= 8;
        const hasNum = /\d/.test(password);
        const hasUpper = /[A-Z]/.test(password);
        const hasSpecial = /[!$#%]/.test(password);

        // Appliquer les styles en fonction des conditions
        minLength.classList.toggle('text-green-500', isValidLength);
        minLength.classList.toggle('text-red-500', !isValidLength);
        hasNumber.classList.toggle('text-green-500', hasNum);
        hasNumber.classList.toggle('text-red-500', !hasNum);
        hasUpperCase.classList.toggle('text-green-500', hasUpper);
        hasUpperCase.classList.toggle('text-red-500', !hasUpper);
        hasSpecialChar.classList.toggle('text-green-500', hasSpecial);
        hasSpecialChar.classList.toggle('text-red-500', !hasSpecial);

        // Activer le champ de confirmation si toutes les conditions sont remplies
        if (isValidLength && hasNum && hasUpper && hasSpecial) {
            passwordConfirmInput.disabled = false;
        } else {
            passwordConfirmInput.disabled = true;
        }
    }

    // Fonction pour vérifier la correspondance des mots de passe
    function checkPasswordMatch() {
        if (passwordInput.value === passwordConfirmInput.value) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
        }
    }

    // Événements sur les champs de mot de passe
    passwordInput.addEventListener('input', () => {
        validatePassword();
        checkPasswordMatch();
    });

    passwordConfirmInput.addEventListener('input', checkPasswordMatch);


    // Afficher/Masquer les mots de passe
const togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('change', function () {
    const type = this.checked ? 'text' : 'password';
    passwordInput.type = type;
    passwordConfirmInput.type = type;
});


</script>

</body>
</html>
