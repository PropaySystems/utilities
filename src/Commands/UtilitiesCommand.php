<?php

namespace PropaySystems\Utilities\Commands;

use Illuminate\Console\Command;

class UtilitiesCommand extends Command
{
    public $signature = 'utilities';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
