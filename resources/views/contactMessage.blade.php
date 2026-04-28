<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
</head>

<body>
    
    <h3>Nouveau message</h3>

    <p>Nom : {{ $donner['name'] }}</p>
    <p>Email : {{ $donner['email'] }}</p>
    <p>Sujet : {{ $donner['subject'] }}</p>

    <p>Message :</p>
    <p>{{ $donner['message'] }}</p>
</body>

</html>