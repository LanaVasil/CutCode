<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    protected $signature = 'ducop:refresh';

    protected $description = 'Command refresh';

    public function handle(): int
    {
        if (app()->isProduction()){
          return self::FAILURE;
        }

        // видалення папки з файлами зображань
        // Storage::deleteDirectory('images/products');

        // php artisan migrate:fresh --seed
        $this->call('migrate:fresh', ['--seed'=>true]);

        return self::SUCCESS;
    }
}
