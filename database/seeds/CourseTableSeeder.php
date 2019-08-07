<?php

use Illuminate\Database\Seeder;

//for eloquent Model Course
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder table courses
        // cara pertama - Eloquent
        Course::create([
            'code' => 'CS230',
            'name' => 'SARJANA MUDA SAINS KOMPUTER (KEPUJIAN)'
        ]);

        Course::create([
            'code' => 'CS240',
            'name' => 'SARJANA MUDA TEKNOLOGI MAKLUMAT (KEPUJIAN)'
        ]);

        Course::create([
            'code' => 'CS241',
            'name' => 'SARJANA MUDA SAINS (KEPUJIAN) STATISTIK'
        ]);

        Course::create([
            'code' => 'CS245',
            'name' => 'SARJANA MUDA SAINS KOMPUTER (KEPUJIAN) KOMUNIKASI DATA DAN PERANGKAIAN'
        ]);

        // cara kedua - Query builder
        DB::table('courses')->insert([
            [
                'code' => 'CS247',
                'name' => 'SARJANA MUDA SAINS (KEPUJIAN) MATEMATIK PENGKOMPUTERAN',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'code' => 'CS251',
                'name' => 'SARJANA MUDA SAINS KOMPUTER (KEPUJIAN) PENGKOMPUTERAN NETSENTRIK',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'code' => 'CS253',
                'name' => 'SARJANA MUDA SAINS KOMPUTER (KEPUJIAN) PENGKOMPUTERAN MULTIMEDIA',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],            
        ]);

    }
}
