<?php

use Illuminate\Database\Seeder;

use App\Event;
use App\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 100;   // number of random events being created 
        
        factory(Event::class, $n)->create()
            ->each(function($event){
                $event->users()->saveMany(
                    User::all()->random(rand(0, User::all()->count())) 
                );
            })
        ;

        
    }
}
