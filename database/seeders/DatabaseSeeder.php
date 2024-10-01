<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Transaction;
use App\Models\User;
use App\Services\RankService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $profiles = Profile::factory(25)->create();
        Transaction::factory(100)->create();

        $rankService = new RankService;

        foreach ($profiles as $profile) {
            $profile->user->update([
                'balance' => $profile->user->getBalance(),
            ]);

            $rankService->recalculateRank($profile->user);
        }
    }
}
