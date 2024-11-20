<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu correo</title>
</head>
<body>
    <h1>Gracias por registrarte</h1>
    <p>Hemos enviado un enlace de verificación a tu correo electrónico. Por favor, verifica tu dirección para continuar.</p>
    <p>¿No recibiste el correo? <a href="{{ route('verification.resend') }}">Reenviar enlace de verificación</a></p>
</body>
</html>