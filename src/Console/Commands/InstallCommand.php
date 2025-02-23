<?php

namespace Cpuch\Flowbite\Console\Commands;

use Illuminate\Console\Command;

// use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flowbite:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Flowbite package';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Installing Flowbite...');

        $this->info('Publishing assets...');
        $this->call('vendor:publish', ['--tag' => 'cpuch-flowbite-assets']);

        $this->info('Publishing views...');
        $this->call('vendor:publish', ['--tag' => 'cpuch-flowbite-views']);

        $this->info('Flowbite installed successfully.');
    }
}
