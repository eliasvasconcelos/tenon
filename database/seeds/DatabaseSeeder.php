<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasTableSeeder::class);
        $this->call(UfsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserTiposTableSeeder::class);
        factory(App\User::class, 9)->create();
        factory(App\Models\Categoria::class, 100)->create();
        factory(App\Models\Anuncio::class, 1000)->create();
    }
}
