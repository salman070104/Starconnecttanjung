<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pelanggan;

class ResetBillingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pelanggan:reset-billing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset payment status of all customers to unpaid (belum_bayar) on the 1st of every month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Resetting payment status for all customers to unpaid...');

        $updatedCount = Pelanggan::query()->update([
            'status' => 'belum_bayar',
            'tanggal_bayar' => null,
        ]);

        $this->info("Successfully reset {$updatedCount} customers to unpaid (belum_bayar).");
    }
}
