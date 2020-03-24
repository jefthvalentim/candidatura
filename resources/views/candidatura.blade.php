<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Candidatura</title>
</head>
<body>
    <form action="{{ route('candidatura.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nome" id="" placeholder="nome">
    <input type="text" name="sobrenome" id="" placeholder="sobrenome">
    <input type="email" name="email" id="" placeholder="email">
    <input type="text" name="telefone" id="" placeholder="telefone">
    <input type="date" name="data_nascimento" id="" placeholder="data_nascimento">
    <input type="text" name="descricacao" id="">
    <input type="file" name="cv" id="">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>