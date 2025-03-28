<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Olá, {{ $pessoa->apelido }}!</h1>
    <p>Seja bem-vindo ao nosso sistema.</p>
    <p>Seu email de cadastro é: {{ $pessoa->nome }}</p>
    <div>
      <h1>Bem-vindo ao sistema milady</h1>
      <p>Obrigado por se cadastrar no sistema milady</p>
      
      <p>Clique no link abaixo para acessar o sistema</p>
      <a href="#">Acessar sistema</a>
      
      <p>Obrigado</p>
      <p>Sistema Milady</p>
     
    </div>
</body>
</html>