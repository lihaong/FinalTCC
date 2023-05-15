<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['id_item', 'nama_item', 'harga_item'];
    protected $table = 'item';
    public $timestamps = false;
}
