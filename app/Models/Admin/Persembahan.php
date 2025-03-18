<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persembahan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'persembahans';

    protected $fillable = [
        'gambar_bunga',
        'deskripsi',
        'sidang',
        'tanggal',
        'is_featured'
    ];


}
