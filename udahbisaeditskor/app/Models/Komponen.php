<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;

    protected $table = 'komponens';

    // Set primary key ke kolom 'id_org'
    protected $primaryKey = 'id_komponen';

    // Nonaktifkan timestamps jika tidak diperlukan
    public $timestamps = false;

    // Komponen.php
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
