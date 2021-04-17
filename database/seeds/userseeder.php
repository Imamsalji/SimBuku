<?php

use Illuminate\Database\Seeder;
use App\User;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Imam Admin',   
            'akses' => 'admin',
            'telpon' => '1',
            'jk' => 'laki-laki',
            'alamat' => 'bogor',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
            ]);
    }
}
