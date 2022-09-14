<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ServiceTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    echo "\e[32mSeeding:\e[0m ServiceTableSeeder\r\n";

      $newService = User::create(
        [
        'name'              => 'Custom Beat',
        'image'             => 'image.png',
        'desc'              => '<p>Imagine you’ve come up with the perfect song – it’s got catchy music, great lyrics, and a worth-repeating chorus. There’s only one problem, though. You can’t seem to put your finger on the beats.</p><p>That’s where we come in. regardless of the genre you’re working on – hip-hop, pop, R&amp;B, trap, or dance – we offer a comprehensive collection of original beats at an affordable price.</p>',         
        'slug'              => 'custom_beat',
        'status'            => 1
        ],
        [
        'name'              => 'Drum Kits and Loops',
        'image'             => 'image.png',
        'desc'              => '<p>Do you have dozens of unfinished tracks on your hard drive? If yes, you’re not the only one. We’re all guilty of leaving songs halfway, hoping the incomplete loops would just magically complete themselves.</p><p>But you don’t have to worry about it anymore, as we’ve got your back. We layer each sample and piece it with others to create a loop that flows smoothly like beautiful poetry.</p>',          
        'slug'              => 'drum_kits_loops',
        'status'            => 1
        ],
         [
        'name'              => 'Mixing & Mastering',
        'image'             => 'image.png',
        'desc'              => '<p>Mixing and mastering are two different components of the audio production process that people often interchange. And the fine line between them can only be identified by professionals – just like GotDemBeatz.</p><p>Our team consists of talented mixing and mastering engineers whose primary aim is to help self-producing musicians reach the top spot in the music industry. So, talk to us today to see what we’ve got in store for you.</p>',         
        'slug'              => 'mix_mastering',
        'status'            => 1
        ]
    );

      echo "\e[32mSeeding:\e[0m ServicesTableSeeder\r\n";
    }

  }
}
