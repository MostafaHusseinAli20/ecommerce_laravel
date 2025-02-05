<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeStripeServiceCommend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service-stripe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = app_path('Services/StripeService.php');
        if (!File::exists(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        $content = <<<PHP
        <?php

        namespace App\Services;

        class StripeService
        {
            public function processPayment(\$amount, \$currency = 'USD')
            {
                // تنفيذ الدفع عبر Stripe
            }
        }
        PHP;

        if (!File::exists($path)) {
            File::put($path, $content);
            $this->info('StripeService.php has been created successfully.');
        } else {
            $this->error('StripeService.php already exists!');
        }
    }
}
