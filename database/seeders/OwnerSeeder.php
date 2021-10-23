<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = "peter." . mt_rand(1, 2) . "@gmail.com";
        $ownerExists = Owner::where('email', '=', $email)->first();

        if(!$ownerExists) {
            $owner = new Owner();
            $owner->owner_name = "Peter " . mt_rand(1, 2);
            $owner->email = $email;
            $owner->save();
        }
    }
}
