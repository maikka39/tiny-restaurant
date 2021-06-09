<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // find the project's root dir
        $root_dir = realpath(__DIR__ . '/..') . '/';

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

        // redirect to /install
        header('Location: /install');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiny Restaurant Installatietool</title>
</head>
<body>
    <form action="" method="post">
        <button type="submit">Start</button>
    </form>
</body>
</html>
