<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warung extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'jenis', 'nama'];
    protected $table = 'warung';
    public $timestamps = false;
}
