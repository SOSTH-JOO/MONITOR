<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 100px;
            margin-bottom: 20px;
        }

        .error-image {
            max-width: 500px;
            width: 100%;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 48px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 30px;
            background-color: #A7001E;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #d71c3a;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Logo -->
        <img src="path_to_logo.png" alt="Logo" class="logo">

        <!-- Erreur 404 Image -->
        <img src="path_to_404_image.png" alt="Erreur 404" class="error-image">

        <h1>Oups ! Page non trouvée</h1>
        <p>La page que vous recherchez est introuvable. Peut-être qu'elle a été déplacée ou supprimée.</p>

        <!-- Bouton pour rediriger vers le login -->
        <a href="/login" class="btn">Retour à la connexion</a>
    </div>

</body>
</html>
