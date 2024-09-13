<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = $this->data();

        foreach ($data as $value) {
            Role::create([
                'guard_name' => $value['guard_name'],
                'name' => $value['name'],
            ]);
        }
    }

    public function data(): array
    {
        return [
            ['guard_name' => 'web', 'name' => 'Super-Admin'],
            ['guard_name' => 'web', 'name' => 'admin'],
            ['guard_name' => 'web', 'name' => 'dubai'],
            ['guard_name' => 'web', 'name' => 'abudhabi'],
            ['guard_name' => 'web', 'name' => 'callcenter'],
            ['guard_name' => 'web', 'name' => 'user'],
        ];
    }
}
