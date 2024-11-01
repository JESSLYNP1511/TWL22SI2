<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = ['member_id','book_id','borrow_date','return_date','dipinjam',];


    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'member_id');
    }


    public function buku()
    {
        return $this->belongsTo(Buku::class, 'book_id');
    }
}
