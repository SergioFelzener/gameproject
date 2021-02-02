<!-- <h1>TESTE DE SISTEMA</h1> -->

<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));


if($uri === '/' || $uri === '' || $uri === '/index.php') { 
    $uri = '/day_records.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");




// require_once(CONTROLLER_PATH . '/login.php');
// loadView('login', ['texto' => 'abc1234']);
// require_once(MODEL_PATH . '/Login.php');
// require_once(CONTROLLER_PATH . '/day_records.php');

// //TESTE PARA VERIFICAR SE ESTA LOGANDO ****
// $login = new Login([
//     'email' => 'quico@cod3r.com.br',
//     'password' => 'a'
// ]);

// try {
//     $login->checkLogin();
//     echo 'Deu certo';
// } catch (Exception $e) {
//     echo "problemas ao conectar";
// } 

//testes de herança ok
// $user = new User(['name' => 'Sergio', 'email' => 'sergio@teste.com']);
// echo $user->get();
// echo '<br>'; 
// print_r($user->get(['id' => 1], 'id, name, email'));
// echo '<br>'; 
// print_r($user->get(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br']));
// echo '<br>'; 

// foreach(User::get([], 'id, name, email') as $user) { 
//     echo "$user->id - $user->name , email => $user->email "; 
//     echo '<br>';
// }
// print_r($user);
// echo "<br>";
// //nova forma
// $user->email = 'novoemail@alterado.com';
// print_r($user->email);


//forma sem metodos magicos set get 
// $user->__set('email', 'novoemail@teste.com');
// print_r($user->__get('email'));
// echo "fim";

// $sql = "SELECT * FROM users";

// $result = Database::getResultFromQuery($sql);

// while($row = $result->fetch_assoc()) { 
//     print_r($row);
//     echo '<br>';
// }


?>