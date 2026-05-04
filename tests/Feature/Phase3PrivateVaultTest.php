<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class Phase3PrivateVaultTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush();
    }

    public function test_phase3_and_family_portal_endpoints_require_authentication(): void
    {
        $this->getJson('/api/v1/archive')->assertUnauthorized();
        $this->getJson('/api/v1/family-tree')->assertUnauthorized();
        $this->getJson('/api/v1/growth')->assertUnauthorized();
        $this->getJson('/api/v1/wellness')->assertUnauthorized();
        $this->getJson('/api/v1/family')->assertUnauthorized();
    }

    public function test_authenticated_user_can_access_private_vault_and_family_portal_data(): void
    {
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        Sanctum::actingAs($user);

        $this->getJson('/api/v1/archive')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['count', 'data']);

        $this->getJson('/api/v1/archive/1/items')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['archive', 'count', 'data']);

        $this->getJson('/api/v1/growth')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['latest_milestone', 'milestone_count', 'completion_rate']]);

        $this->getJson('/api/v1/growth/charts')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['series', 'units']]);

        $this->getJson('/api/v1/wellness')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['latest_record', 'record_count', 'confidentiality']]);

        $this->getJson('/api/v1/wellness/dashboard')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['next_checkup', 'vaccination_compliance', 'sleep_consistency', 'activity_goal_progress']]);

        $this->getJson('/api/v1/family/members')
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['count', 'data']);
    }
}
