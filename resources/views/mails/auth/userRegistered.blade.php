<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        .message_container, p, ul li {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="message_container">
        <p>Cher(e)  {{ $data["name"] }}</p>
        <p>Nous sommes ravis de vous accueillir parmi nos administrateurs!</p>
        <p>Vous pouvez dès à présent accéder au compte admin FCT ADMINISTRATOR</p>
        <p><strong>Vos identifiants de connexion:</strong></p>
        <ul>
            <li><strong>Adresse e-mail:</strong> {{ $data["email"] }}</li>
            <li><strong>Mot de passe:</strong> {{ $data["password"] }}</li>
        </ul>
        <p>Lien de connexion: {{ route('auth:login:view') }}</p>
        <p>Nous vous recommandons vivement de modifier votre mot de passe dès votre première connexion pour des raisons de sécurité.</p>

        <p>Responsable FCT</p>
    </div>
</body>
</html>
