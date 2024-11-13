<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    
    protected $table = 'organisasis';

    // Set primary key ke kolom 'id_org'
    protected $primaryKey = 'id_org';

    // Nonaktifkan timestamps jika tidak diperlukan
    public $timestamps = false;
}
