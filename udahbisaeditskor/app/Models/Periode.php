<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periodes';

    // Nonaktifkan auto-incrementing karena kita menggunakan composite key
    public $incrementing = false;

    // Tipe primary key (jika non-integer)
    protected $keyType = 'string';

    // Nonaktifkan timestamps jika tidak diperlukan
    public $timestamps = false;

    // Override metode 'getKey' untuk menangani composite key
    public function getKey()
    {
        return [$this->tahun, $this->bulan];
    }

    // Override metode 'getKeyName' untuk mendukung array
    public function getKeyName()
    {
        return ['tahun', 'bulan'];
    }
}

