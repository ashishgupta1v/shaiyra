<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class Phase2PublicNarrativeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush();
    }

    public function test_public_narrative_read_endpoints_return_live_payloads(): void
    {
        $this->getJson('/api/v1/milestones')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['count', 'data']);

        $this->getJson('/api/v1/photos')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['count', 'data']);

        $this->getJson('/api/v1/feed')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['count', 'data']);

        $this->getJson('/api/v1/public/profile')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['display_name', 'headline']]);

        $this->getJson('/api/v1/public/favorites')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['count', 'data']);
    }

    public function test_public_narrative_mutation_endpoints_require_auth(): void
    {
        $this->postJson('/api/v1/milestones', [
            'title' => 'Unauth Milestone',
            'description' => 'Should fail without token.',
            'category' => 'test',
            'event_date' => '2025-01-01',
        ])->assertUnauthorized();

        $this->postJson('/api/v1/photos', [
            'title' => 'Unauth Photo',
            'url' => 'https://images.example.com/x.jpg',
        ])->assertUnauthorized();

        $this->postJson('/api/v1/public/share', [
            'scope' => 'full',
        ])->assertUnauthorized();
    }

    public function test_public_narrative_mutation_endpoints_work_with_auth(): void
    {
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        Sanctum::actingAs($user);

        $milestoneResponse = $this->postJson('/api/v1/milestones', [
            'title' => 'New Chapter',
            'description' => 'A meaningful new chapter.',
            'category' => 'career',
            'event_date' => '2025-01-01',
            'featured' => true,
        ]);

        $milestoneResponse
            ->assertCreated()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('data.title', 'New Chapter');

        $photoResponse = $this->postJson('/api/v1/photos', [
            'title' => 'Award Night',
            'url' => 'https://images.example.com/award-night.jpg',
            'milestone_id' => 1,
        ]);

        $photoResponse
            ->assertCreated()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('data.title', 'Award Night');

        $shareResponse = $this->postJson('/api/v1/public/share', [
            'scope' => 'profile',
            'expires_in_hours' => 24,
        ]);

        $shareResponse
            ->assertCreated()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('data.scope', 'profile');

        $token = $shareResponse->json('data.token');

        $this->postJson('/api/v1/public/share/' . $token . '/validate')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['profile']]);
    }
}
