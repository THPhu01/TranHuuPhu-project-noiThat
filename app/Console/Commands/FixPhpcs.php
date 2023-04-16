<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class FixPhpcs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpcs {--option=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Code convention Phpcs';

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
        $option = $this->option('option');
        $commandLine = $option === 'fix' ? './vendor/bin/phpcbf' : './vendor/bin/phpcs';
        $process = new Process([$commandLine]);
        $process->run();
        if (!$process->isSuccessful()) {
            return $this->error($process->getOutput());
        }
        $this->info($process->getOutput());
    }
}
