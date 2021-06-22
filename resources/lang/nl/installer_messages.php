<?php

return [
    /*
     *
     * Shared translations.
     *
     */
    'title' => 'Tiny Restaurant',
    'next' => 'Volgende',
    'back' => 'Vorige',
    'finish' => 'Installeren',
    'forms' => [
        'errorTitle' => 'De volgende fouten zijn opgetreden:',
    ],

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'Welkom',
        'title' => 'Tiny Restaurant',
        'message' => 'Welkom ìn de installatiewizard van de website voor het Tiny Restaurant.',
        'next' => 'Controleer vereisten',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Stap 1 | Serververeisten',
        'title' => 'Serververeisten',
        'next' => 'Controlleer rechten',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Stap 2 | Rechten',
        'title' => 'Rechten',
        'next' => 'Configuratie',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Stap 3 | Configuratie',
            'title' => 'Configuratie',
            'desc' => 'Selecteer hoe u het <code>.env</code>-bestand wilt configureren.',
            'wizard-button' => 'Wizard',
            'classic-button' => 'Handmatig',
        ],
        'wizard' => [
            'templateTitle' => 'Step 3 | Configuratie | Begeleide wizard',
            'title' => 'Configuratiewizard',
            'tabs' => [
                'environment' => 'Configuratie',
                'database' => 'Database',
                'application' => 'Applicatie',
            ],
            'form' => [
                'name_required' => 'Kies een omgeving',
                'app_name_label' => 'Applicatienaam',
                'app_name_placeholder' => 'Mijn website',
                'app_environment_label' => 'Omgevingstype',
                'app_environment_label_local' => 'Lokaal',
                'app_environment_label_developement' => 'Ontwikkeling',
                'app_environment_label_qa' => 'QA',
                'app_environment_label_production' => 'Productie',
                'app_environment_label_other' => 'Anders',
                'app_environment_placeholder_other' => 'Voer uw omgevingstype in...',
                'app_debug_label' => 'Debug-modus',
                'app_debug_label_true' => 'Aan',
                'app_debug_label_false' => 'Uit',
                'app_log_level_label' => 'Log-level',
                'app_log_level_label_debug' => 'debug',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'notice',
                'app_log_level_label_warning' => 'warning',
                'app_log_level_label_error' => 'error',
                'app_log_level_label_critical' => 'critical',
                'app_log_level_label_alert' => 'alert',
                'app_log_level_label_emergency' => 'emergency',
                'app_url_label' => 'Site URL',
                'app_url_placeholder' => 'http://localhost',
                'db_connection_failed' => 'Kan niet verbinden met de database.',
                'db_connection_label' => 'Database-connectie',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Host',
                'db_host_placeholder' => '',
                'db_port_label' => 'Poort',
                'db_port_placeholder' => '',
                'db_name_label' => 'Naam',
                'db_name_placeholder' => '',
                'db_username_label' => 'Gebruikersnaam',
                'db_username_placeholder' => '',
                'db_password_label' => 'Wachtwoord',
                'db_password_placeholder' => '',

                'app_tabs' => [
                    'more_info' => 'More Info',

                    'broadcasting_title' => 'Broadcasting, Cache, Session, & Queue',
                    'broadcasting_label' => 'Broadcast Driver',
                    'broadcasting_placeholder' => '',

                    'cache_label' => 'Cache Driver',
                    'cache_placeholder' => '',

                    'session_label' => 'Session Driver',
                    'session_placeholder' => '',

                    'queue_label' => 'Queue Driver',
                    'queue_placeholder' => '',

                    'redis_label' => 'Redis',
                    'redis_host' => 'Host',
                    'redis_password' => 'Wachtwoord',
                    'redis_port' => 'Poort',

                    'mail_label' => 'Mail',
                    'mail_driver_label' => 'Driver',
                    'mail_driver_placeholder' => '',
                    'mail_host_label' => 'Host',
                    'mail_host_placeholder' => '',
                    'mail_port_label' => 'Poort',
                    'mail_port_placeholder' => '',
                    'mail_username_label' => 'Gebruikersnaam',
                    'mail_username_placeholder' => '',
                    'mail_password_label' => 'Wachtwoord',
                    'mail_password_placeholder' => '',
                    'mail_encryption_label' => 'Encryptie',
                    'mail_encryption_placeholder' => '',

                    'pusher_label' => 'Pusher',
                    'pusher_app_id_label' => 'App Id',
                    'pusher_app_id_palceholder' => '',
                    'pusher_app_key_label' => 'App Key',
                    'pusher_app_key_palceholder' => '',
                    'pusher_app_secret_label' => 'App Secret',
                    'pusher_app_secret_palceholder' => '',
                ],
                'buttons' => [
                    'setup_database' => 'Database',
                    'setup_application' => 'Applicatie',
                    'install' => 'Installeren',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Stap 3 | Configuratie | Handmatig bewerken',
            'title' => 'Handmatige bewerken',
            'save' => 'Opslaan',
            'back' => 'Gebruik wizard',
            'install' => 'Opslaan en installeren',
        ],
        'success' => 'Het .env-bestand is opgeslagen.',
        'errors' => 'Het .env-bestand is niet opgeslagen, maak deze handmatig.',
    ],

    'install' => 'Installeren',

    /*
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => 'Laravel Installer successfully INSTALLED on ',
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Installatie voltooid',
        'templateTitle' => 'Installation voltooid',
        'finished' => 'Applicatie is succesvol geïnstalleerd.',
        'migration' => 'Migratie &amp; Seeding console-output:',
        'console' => 'Applicatie console-output:',
        'log' => 'Installatielog:',
        'env' => 'Uiteindelijk .env-bestand:',
        'exit' => 'Klik hier om af te sluiten',
    ],

    /*
     *
     * Update specific translations
     *
     */
    'updater' => [
        /*
         *
         * Shared translations.
         *
         */
        'title' => 'Laravel Updater',

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title' => 'Welcome To The Updater',
            'message' => 'Welcome to the update wizard.',
        ],

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title' => 'Overview',
            'message' => 'There is 1 update.|There are :number updates.',
            'install_updates' => 'Install Updates',
        ],

        /*
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Finished',
            'finished' => 'Application\'s database has been successfully updated.',
            'exit' => 'Click here to exit',
        ],

        'log' => [
            'success_message' => 'Laravel Installer successfully UPDATED on ',
        ],
    ],
];
