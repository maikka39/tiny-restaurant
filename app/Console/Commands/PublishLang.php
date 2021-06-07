<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PublishLang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes the Twill lang file to the vendor folder.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Moving lang file to vendor folder...');

        \File::copy(base_path('resources/lang/lang.csv'), base_path('vendor/area17/twill/lang/lang.csv'));

        $this->call('twill:lang');

        return 0;
    }
}
