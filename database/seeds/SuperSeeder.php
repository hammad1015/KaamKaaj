<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Event;
use App\Channel;
use App\Post;
use App\Comment;


class SuperSeeder extends Seeder
{
    
    public function run()
    {
        $u = rand(20, 50);      // number of users being created
        $e = rand(40, 80);      // number of events being created

        factory(User::class, $u)->create();

        factory(Event::class, $e)->create();

        // creating channels for each event
        foreach (Event::all() as $event){
            $c = rand(0, 7);   // number of channels being created per event

            $event->channels()->saveMany(
                factory(Channel::class, $c)->make()
            );
        }

        // creating posts for each channel
        foreach (Channel::all() as $channel){
            $p = rand(15, 25);   // number of posts being created per channel

            $channel->posts()->saveMany(
                factory(Post::class, $p)->make()
            );
        }

        // making user-event (many to many) relatinship
        $users = User::all()->random(rand($u/3, $u));
        foreach ($users as $user){
            $events = Event::all()->random(rand(1, $e));

            foreach ($events as $event){
                $user->events()->save($event, array('authorization_level' => rand(0, 4)));
            }
        }
          


    }
}
