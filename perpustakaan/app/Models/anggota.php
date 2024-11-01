<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';

    protected $fillable = ['name','address','email','phone',];


    public function loans()
    {
        return $this->hasMany(Loans::class, 'member_id');
    }
}
