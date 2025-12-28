<?php

namespace App\Console\Commands;

use App\Models\DailyMob;
use App\Models\Mob;
use Illuminate\Console\Command;

class DailyMobGenerate extends Command
{
    protected $signature = 'daily:mob';
    protected $description = 'Generate daily mob';

    public function handle()
    {
        $previous_daily_mob = DailyMob::latest('id')->first();
        do{
            $mob = Mob::inRandomOrder()->first();
        }while($previous_daily_mob->id == $mob->id);

        DailyMob::create([
                'version' => DailyMob::max('version') + 1,
                'mob_id' => $mob->id,
                'mob_name' => $mob->name,
                'date' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        $this->info('Daily mob generated');
    }
}
