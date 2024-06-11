<?php

namespace Kcompany\CoventusGateway\Commands;

use Illuminate\Console\Command;

class CoventusGatewayCommand extends Command
{
    public $signature = 'coventus-gateway';

    public $description = 'Test command';
    
    /**
     * handle
     *
     * @return int
     */
    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
