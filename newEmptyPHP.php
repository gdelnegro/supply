<?php require "../conexao.php"; ?>
<?php 
if(isset($_POST['email_admin'])){
    $email_admin = $_POST['email_admin'];
    $senha_admin = $_POST['senha_admin'];
    
    if(is_null($email_admin) OR is_null($senha_admin)){
        echo "<br>ERRO DADOS INVÁLIDOS<br>";
    }else{
        $pdo = conectar();
        $sql_admin = "SELECT nome_admin, email_admin, senha_admin FROM ".$db.".admin WHERE email_admin LIKE email_admin AND senha_admin LIKE senha_admin";
        $stmt_admin = $pdo->prepare($sql_admin);
        $stmt_admin->bindValue(":email_admin", $email_admin, PDO::PARAM_STR);
        $stmt_admin->bindValue(":senha_admin", $senha_admin, PDO::PARAM_STR);
        $stmt_admin->execute();
        if($stmt_admin->rowCount() > 0){
                            session_start();
                            $_SESSION['email_admin'] = $email_admin;
                            $_SESSION['senha_admin'] = $senha_admin;
                            header('location:restrita_admin.php');
        }else{			
            echo '<script> window.alert("login ou senha inválidos")</script>';         
        } 
    }
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<title>Login Administrador</title>
<link href="css/estilo_admin.css" rel="stylesheet" type="text/css">
</head>
    <body>
        <br>
        <h2>Login administrador</h2>
        <form id="form_login_admin" name="form_login_admin" method="post" action="">
            <p>
                <label for="email_admin">E-mail:</label>
                <input type="text" name="email_admin" id="email_admin" style="margin-left:2px;" />
            </p>
            <p>
                <label for="senha_admin">Senha:</label>
                <input type="password" name="senha_admin" id="senha_admin" />
            </p>
            <p>
                <input type="submit" name="entrar_admin" id="entrar_admin" value="Entrar" style="margin:6px 0px 0px 166px; " />
            </p>
        </form>
    </body>
</html>