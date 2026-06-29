<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_laporan_transaksi_shows_saved_transactions(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $category = Category::create([
            'name' => 'Workshop',
            'slug' => 'workshop',
        ]);

        $event = Event::create([
            'category_id' => $category->id,
            'title' => 'Laravel Meetup',
            'description' => 'Meetup testing',
            'date' => now()->addDay(),
            'location' => 'Jakarta',
            'price' => 100000,
            'stock' => 50,
        ]);

        Transaction::create([
            'event_id' => $event->id,
            'order_id' => 'TRX-TEST-001',
            'customer_name' => 'Budi Santoso',
            'customer_email' => 'budi@example.com',
            'customer_phone' => '081234567890',
            'total_price' => 105000,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)->get(route('admin.laporan.index'));

        $response->assertOk();
        $response->assertSee('TRX-TEST-001');
        $response->assertSee('Budi Santoso');
    }
}
