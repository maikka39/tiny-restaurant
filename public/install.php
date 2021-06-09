<?php
    // find the project's root dir
    $root_dir = realpath(__DIR__ . '/..') . '/';

    // check if there already is an env file
    if (file_exists($root_dir . '.env')) {
        header('Location: /install');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // generate an encryption key
        $key = 'base64:' . base64_encode(random_bytes(32));

        // copy the example env to a new env file
        copy($root_dir . '.env.example', $root_dir . '.env');

        // enter the encryption key
        file_put_contents($root_dir . '.env', preg_replace(
            '/^APP_KEY=/m',
            "APP_KEY=$key",
            file_get_contents($root_dir . '.env')
        ));

        shell_exec('composer install');
        shell_exec('npm install');
        shell_exec('npm run prod');
        shell_exec('php artisan twill:build');
        shell_exec('php artisan lang:publish');
        shell_exec('php artisan storage:link');

        // redirect to /install
        header('Location: /install');
    }
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tiny Restaurant Installatietool</title>

    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            padding: 0;
            margin: 0;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            width: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        div {
            margin-bottom: 1rem;
            text-align: center;
        }

        button {
            padding: .5rem 1rem;
            border: none;
            background: rgba(50, 114, 49, 1);
            color: white;
            border-radius: 3px;
        }

        button:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <h1>Tiny Restaurant Installatiewizard</h1>
        <p>Klik op Start om te beginnen. Let op: dit kan even duren.</p>
    </div>

    <form action="" method="post">
        <button type="submit">Start</button>
    </form>
</body>
</html>
