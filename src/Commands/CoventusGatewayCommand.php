<?php

namespace Kcompany\CoventusGateway\Commands;

use Illuminate\Console\Command;

class CoventusGatewayCommand extends Command
{
    public $signature = 'coventus-gateway';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
