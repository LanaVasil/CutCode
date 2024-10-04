<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'ducop:install-command';

    protected $description = 'Command description';

    public function handle(): int
    {
        // php artisan storage:link
        $this->call('storage:link');

        // php artisan migrate
        $this->call('migrate');
        // php artisan migrate:fresh --seed
        // $this->call('migrate:fresh --seed');


        return self::SUCCESS;
    }
}
