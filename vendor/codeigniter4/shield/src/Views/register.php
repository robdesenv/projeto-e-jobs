<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f3f2ef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .auth-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            width: 100%;
            max-width: 400px;
        }
        .auth-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0a66c2; 
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #0a66c2;
            box-shadow: 0 0 5px rgba(10, 102, 194, 0.5);
        }
        .btn-primary {
            background-color: #0a66c2; 
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #004182; 
        }
        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .footer a {
            color: #0a66c2;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            text-decoration: underline;
            color: #004182;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center p-5">
        <div class="auth-container">
            <h2>iJobs</h2>

            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                    <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                </div>

                <!-- Username -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                    <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
                </div>

                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                    <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                </div>

                <!-- Password (Again) -->
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                    <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                </div>

                <!-- Botão de Registro -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><?= lang('Auth.register') ?></button>
                </div>

                <!-- Link para Login -->
                <p class="text-center mt-3"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= $this->endSection() ?>