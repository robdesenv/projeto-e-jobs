<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - e-Jobs</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <style>
        body {
            background-color: #f3f2ef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .auth-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .auth-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .auth-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #0a66c2;
            font-weight: 700;
            font-size: 28px;
        }
        .form-control {
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #0a66c2;
            box-shadow: 0 0 8px rgba(10, 102, 194, 0.3);
        }
        .btn-primary {
            background-color: #0a66c2;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #004182;
        }
        .alert {
            margin-bottom: 20px;
            border-radius: 8px;
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
        .user-type-selector {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .user-type-option {
            flex: 1;
            text-align: center;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 5px;
        }
        .user-type-option:hover {
            border-color: #0a66c2;
            background-color: #f0f8ff;
        }
        .user-type-option.active {
            border-color: #0a66c2;
            background-color: #e6f0ff;
        }
        .user-type-option i {
            font-size: 24px;
            margin-bottom: 10px;
            color: #0a66c2;
        }
        .user-type-option span {
            font-size: 16px;
            font-weight: 500;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center p-5">
        <div class="auth-container">
            <h2>Registro e-Jobs</h2>

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

                <!-- Seleção de Tipo de Usuário -->
                <div class="user-type-selector">
                    <div class="user-type-option" onclick="selectUserType('freelancer')">
                        <i class="fas fa-user-tie"></i>
                        <span>Freelancer</span>
                        <input type="radio" name="user_type" id="freelancer" value="freelancer" required hidden>
                    </div>
                    <div class="user-type-option" onclick="selectUserType('contratante')">
                        <i class="fas fa-briefcase"></i>
                        <span>Contratante</span>
                        <input type="radio" name="user_type" id="contratante" value="contratante" required hidden>
                    </div>
                </div>

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

    <!-- Script pra selecionar oque e free ou ... -->
    <script>
        function selectUserType(type) {
           
            document.querySelectorAll('.user-type-option').forEach(option => {
                option.classList.remove('active');
            });

            const selectedOption = document.querySelector(`.user-type-option[onclick="selectUserType('${type}')"]`);
            selectedOption.classList.add('active');

            document.getElementById(type).checked = true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= $this->endSection() ?>

