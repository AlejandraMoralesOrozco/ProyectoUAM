<!DOCTYPE html>
<html>
<head>
    <title>Accepted Prospect Mail</title>
</head>
<body>
    <h1>Felicidades, has sido aceptado</h1>
    <p>Estimado {{ $user->name }},</p>
    <p>Tu solicitud ha sido aceptada. A continuación se presentan tus detalles de inicio de sesión:</p>
    
    <p>Usuario: {{ $user->email }}</p>
    <p>Contraseña: {{ $password }}</p>
    
    <p>Por favor, inicia sesión con tu nueva cuenta.</p>
    
    <p>¡Gracias!</p>
</body>
</html>