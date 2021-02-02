<?php
$errors = [];

if ($exception) {
    $message = [

        'type' => 'error',
        'message' => $exception->getMessage()

    ];

    if(get_class($exception) === 'ValidationException') { 
        $errors = $exception->getErrors();
    }
}



// pode fazer assim e passar apenas a variável $alerttype na class 
// da div ou fazer a lógica com operador ternario feita abaido na mesma div 

// $alertType = '';

// if ($message['type'] === 'error') { 
//     $alertType = 'danger';
// } else { 
//     $alertType = 'success';
// }

?>

<?php if ($message) : ?>

    <div class="my-3 alert alert-<?= $message['type'] === 'error' ? 'danger' : 'success'?> role="alert">
        <?= $message['message'] ?>
    </div>

<?php endif ?>