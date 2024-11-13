<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederOrganisasi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organisasis =[
          [
            'id_org' => 1,
            'nama_org' => 'Politeknik Negeri Bandung'
          ],
          [
            'id_org' => 2,
            'nama_org' => 'Universitas Indonesia'
          ],
          [
            'id_org' => 3,
            'nama_org' => 'Institut Teknologi Bandung'
          ]
          ];

          foreach ($organisasis as $data) {
            Organisasi::create($data);
          }
    }
}
