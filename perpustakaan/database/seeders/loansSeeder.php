<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loans; 
use Carbon\Carbon;

class loansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Loans::create([
            'member_id' => 1,
            'book_id' => 1,
            'borrow_date' => Carbon::now(),
            'return_date' => null,
            'dipinjam' => 'dipinjam'
        ]);

        Loans::create([
            'member_id' => 2,
            'book_id' => 2,
            'borrow_date' => Carbon::now()->subDays(5),
            'return_date' => Carbon::now()->subDays(1),
            'dipinjam' => 'kembali'
        ]);

        Loans::create([
            'member_id' => 3,
            'book_id' => 3,
            'borrow_date' => Carbon::now()->subDays(2),
            'return_date' => null,
            'dipinjam' => 'dipinjam'
        ]);

        Loans::create([
            'member_id' => 4,
            'book_id' => 4,
            'borrow_date' => Carbon::now()->subDays(10),
            'return_date' => Carbon::now()->subDays(2),
            'dipinjam' => 'kembali'
        ]);

        Loans::create([
            'member_id' => 5,
            'book_id' => 5,
            'borrow_date' => Carbon::now()->subDays(1),
            'return_date' => null,
            'dipinjam' => 'dipinjam'
        ]);
    }
}
