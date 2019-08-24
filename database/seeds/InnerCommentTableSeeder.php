<?php

use Illuminate\Database\Seeder;

class InnerCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\InnerComment::class, 20)->create();
    }
}
