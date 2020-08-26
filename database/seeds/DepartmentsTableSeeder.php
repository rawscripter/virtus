<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    const DEPARTMENTS = [
        'cold' => 'Cold',
        'leads' => 'Leads',
        'transactions' => 'Transactions',
        'premarketing' => 'Pre-Marketing',
        'marketing' => 'Marketing',
        'closings' => 'Closings',
        'closed' => 'Closed',
        'dead' => 'Dead',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::DEPARTMENTS as $slug => $department) {
            Department::query()->create([
                'slug' => $slug,
                'name' => $department,
            ]);
        }
    }
}
