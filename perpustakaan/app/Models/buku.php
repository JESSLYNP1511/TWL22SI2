<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = ['title','author','publisher','year_published','stock',];


    public function loans()
    {
        return $this->hasMany(Loans::class, 'book_id');
    }
}
