<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MembershipTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /**
     * Insert details
     *
     */
    echo "\e[32mSeeding:\e[0m MembershipTableSeeder\r\n";

      $newUser = Membership::create([
        'first_image'              => 'image.png',
        'second_image'             => 'image.png'
      ]);

      echo "\e[32mSeeding:\e[0m MembershipTableSeeder";

  }
}
