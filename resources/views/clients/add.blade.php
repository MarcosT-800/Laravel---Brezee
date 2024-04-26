<!-- resources/views/clients/add.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Cliente</title>
</head>
<body>
    <h1>Adicionar Cliente</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <button type="submit">Adicionar Cliente</button>
    </form>
</body>
</html>
