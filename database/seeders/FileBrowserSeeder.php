<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class FileBrowserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $folder = $user->folders()->create(['name' => config('app.name')]);

        $object = $user->objects()->make(['parent_id' => null]);
        $object->objectable()->associate($folder);

        $object->save();
    }
}