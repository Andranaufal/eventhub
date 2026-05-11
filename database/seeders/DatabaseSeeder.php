<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $category = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);
        $category2 = \App\Models\Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);
        $category3 = \App\Models\Category::create([
            'name' => 'Bimtek',
            'slug' => 'bimtek',
        ]);
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'poster/event-1.png'
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI Summit & Expo 2026',
            'description' => 'Jelajahi tren terkini dalam bidang Artificial Intelligence',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 45000,
            'stock' => 150,
            'poster_path' => 'poster/event-2.png'
        ]);

        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Penerapan sistem untuk efisiensi kerja.',
            'description' => 'Bimtek Implementasi Sistem Informasi Terintegrasi',
            'date' => '2026-10-01 09:00:00',
            'location' => 'Ruang Cinema',
            'price' => 65000,
            'stock' => 110,
            'poster_path' => 'poster/event-3.png'
        ]);
        
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Fun & Chill Night',
            'description' => 'Acara hiburan seru untuk melepas penat.',
            'date' => '2026-07-03 20:00:00',
            'location' => 'Amikom Baru',
            'price' => 150000,
            'stock' => 200,
            'poster_path' => 'poster/event-4.png'
        ]);

        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Let’s Have Fun 2026',
            'description' => 'Momen kebersamaan penuh keseruan.',
            'date' => '2026-09-10 10:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 150,
            'poster_path' => 'poster/event-5.png'
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'IT Insight Seminar',
            'description' => 'Wawasan seputar dunia teknologi modern.',
            'date' => '2026-11-01 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 70000,
            'stock' => 100,
            'poster_path' => 'poster/event-6.png'
        ]);
    }
}
