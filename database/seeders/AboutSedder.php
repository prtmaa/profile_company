<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'nama' => 'Gas',
            'logo' => 'img/logo.jpg',
            'deskripsi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, beatae?',
            'tentang' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, placeat id. Quam delectus saepe vitae facere veritatis quod, assumenda totam dignissimos perspiciatis dicta ipsa inventore voluptatum ut nesciunt ullam officia?',
            'alamat' => 'Surakarta',
        ]);
    }
}
