<?php
require 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] ===  "POST") 
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "INSERT INTO usuarios (nome, email) VALUES 
            (:nome, :email)";
    $stmt = $pdo->prepare($sql); // Proteção contra possíveis invasões
    $stmt->bindParam(':nome' , $nome); // o Bind aloca as variáveis a seus devidos espaços
    $stmt->bindParam(':email' , $email);
    if ($stmt->execute()) //se a função for executada corretamente vai exbir cadastro com sucesso
    {
        echo "Usuário cadastrado com sucesso!";
    } 
    else 
    {
        echo "Erro ao cadastrar.";
    }
}
?>

<p> PASTOR REZOU LENTINHO </p>
<form method= "POST" action= "create.php">

<label>Nome:</label>
<br>
<input type="text" name= "nome" required>
<br><br>
<label>Email:</label>
<br>
<input type= "email" name= "email" required>
<br><br>
<button type= "submit"> Cadastrar </button>
</form>