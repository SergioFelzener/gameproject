<?php 
// fluxo do Registro
loadModel('Register');
session_start();
$exception = null;

if (count($_POST) > 0 ) { 
    $register = new Register($_POST);
    try { 

        $user = $login->checkLogin();
        $_SESSION['user'] = $user;
        header("Location: day_records.php");
        // echo "Logado {$user->name} com sucesso"; 

    } catch(AppException $e) { 

        $exception = $e; 
    }
}

// passando o post podemos pegar o atributo email direto pela variavel na View
loadView('register', $_POST + ['exception' => $exception ]);



?>