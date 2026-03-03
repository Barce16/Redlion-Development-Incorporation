<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Message;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\PropertyListing;
use App\Models\User;

class PurgeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:purge {--keep-admin-email=admin@example.com : Email of admin user to retain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all records except the specified admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $adminEmail = $this->option('keep-admin-email');

        $this->info('Purging table data...');

        Message::truncate();
        Transaction::truncate();
        Customer::truncate();
        PropertyListing::truncate();

        // delete all users except admin
        User::where('email', '!=', $adminEmail)->delete();

        $this->info("Data purged. Only user with email {$adminEmail} remains (if exists).");

        return 0;
    }
}
