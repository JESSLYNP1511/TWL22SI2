<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class bukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        buku::create([
            'title' => 'Laravel for Beginners',
            'author' => 'John Doe',
            'publisher' => 'Tech Publisher',
            'year_published' => 2021,
            'stock' => 10,
        ]);

        buku::create([
            'title' => 'Mastering PHP',
            'author' => 'Jane Smith',
            'publisher' => 'Code House',
            'year_published' => 2019,
            'stock' => 8,
        ]);

        buku::create([
            'title' => 'Advanced Web Development',
            'author' => 'Michael Johnson',
            'publisher' => 'Web World',
            'year_published' => 2020,
            'stock' => 15,
        ]);

        buku::create([
            'title' => 'JavaScript Essentials',
            'author' => 'Emily White',
            'publisher' => 'JS Books',
            'year_published' => 2018,
            'stock' => 12,
        ]);

        buku::create([
            'title' => 'Database Design',
            'author' => 'Robert Brown',
            'publisher' => 'Data Press',
            'year_published' => 2022,
            'stock' => 5,
        ]);
    }
}

