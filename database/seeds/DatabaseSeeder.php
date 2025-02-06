<?php

use App\User;
use App\Company;
use App\Employees;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'Direktur',
            'email' => 'direktur@direktur.com',
            'role' => 'direktur',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'role' => 'manager',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Karyawan',
            'email' => 'karyawan@karyawan.com',
            'role' => 'karyawan',
            'password' => bcrypt('password')
        ]);

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Company::create([
                'name' => $faker->company,
                'address' => $faker->address,
                'email' => $faker->unique()->companyEmail,
            ]);
        }

        $companies = Company::all();
        foreach ($companies as $company) {
            foreach (range(1, 5) as $index) {
                Employees::create([
                    'first_nm' => $faker->firstName,
                    'last_nm' => $faker->lastName,
                    'company_id' => $company->id,
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->phoneNumber,
                ]);
            }
        }

    }
}
