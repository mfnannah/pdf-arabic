<?php

namespace Mfnannah\PdfArabic\Commands;

use Illuminate\Console\Command;

class PdfArabicCommand extends Command
{
    public $signature = 'pdf-arabic';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
