<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['name' => 'A fazer'],
            ['name' => 'Em andamento'],
            ['name' => 'Concluído'],
        ];

        foreach ($status as $s) {
           Status::create($s);
        }
    }
}
