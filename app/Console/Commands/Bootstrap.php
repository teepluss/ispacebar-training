<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Bootstrap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bootstrap:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the project.';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Migrate the database...');
        $this->call('migrate', ['--seed' => true]);
        $this->info('Migrate done.');
        $this->info('Install completed.');
    }
}
