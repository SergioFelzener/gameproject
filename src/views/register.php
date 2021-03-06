<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Game RPG</title>
</head>

<body>
    <form class="form-login" action="#" method="POST">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-focus mr-2"></i>
                <span class="title">Cadastro</span>
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php') ?>
                <div class="form-group">
                    <label for="name">Nome</label>                                                      <!-- Passando o caminho correto caso nao passe o $_POST no metodo loadView('name da view', $_POST['email']) para manter o valor do email salvo na tela com o Value-->
                    <input type="name" id="name" name="name" class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>" value="<?= $name ?> " placeholder="Informe o nome" autofocus>
                    <div class="invalid-feedback"><?= $errors['name']?></div>
                </div>
                <div class="form-group">
                    <label for="email">E-MAIL</label>                                                      <!-- Passando o caminho correto caso nao passe o $_POST no metodo loadView('name da view', $_POST['email']) para manter o valor do email salvo na tela com o Value-->
                    <input type="email" id="email" name="email" class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>" value="<?= $email ?> " placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback"><?= $errors['email']?></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>" placeholder="Informe a senha" autofocus>
                    <div class="invalid-feedback"><?= $errors['password']?></div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary float-right">Enviar</button>
            </div>
        </div>
    </form>
    <?= $texto ?>
</body>

</html>