<?php
    // use the Composer classes
    use Composer\Console\Application;
    use Symfony\Component\Console\Input\ArrayInput;

    function install($file) {
        $argv = array();
        include_once($file);
    }

    function composer_install() {
        $installerFilename = "composer-installer.php";
        $composer_installer_content  = file_get_contents('https://getcomposer.org/installer');
        
        $find = array('#!/usr/bin/env php', 'exit(');
        $replace = array('', 'return(');
        $new_composer_installer_content = str_replace($find,$replace, $composer_installer_content);
    
        file_put_contents($installerFilename, $new_composer_installer_content);
        install($installerFilename);
    
        define('EXTRACT_DIRECTORY', "extractedComposer");
    
        if (file_exists(EXTRACT_DIRECTORY . '/vendor/autoload.php') == false) {
            $composerPhar = new Phar("composer.phar");
            // php.ini setting phar.readonly must be set to 0
            $composerPhar->extractTo(EXTRACT_DIRECTORY);
        }
    
        // this requires the phar to have been extracted successfully.
        require_once(EXTRACT_DIRECTORY . '/vendor/autoload.php');
    
        // change out of the webroot so that the vendors file is not created in
        // a place that will be visible to the intahwebz
        chdir('../');
    
        // create the command
        $input = new ArrayInput(array('command' => 'install'));
    
        // create the application and run it with the commands
        $application = new Application();
        $application->setAutoExit(false);
        $application->run($input);

        // delete crap
        echo unlink('public/composer.phar');
        echo unlink('public/composer-installer.php');
        echo deleteDirectory('public/extractedComposer');
    }

    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
    
        return rmdir($dir);
    }

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

        composer_install();
        shell_exec('npm install');
        shell_exec('npm run prod');
        shell_exec('php artisan twill:build');
        shell_exec('php artisan lang:publish');
        shell_exec('php artisan storage:link');

        // redirect to the installer
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
        <p>Klik op Start om te beginnen.</p>
        <p>Let op: dit kan even duren. Sluit de pagina niet.</p>
    </div>

    <form action="" method="post">
        <button type="submit">Start</button>
    </form>
</body>
</html>
