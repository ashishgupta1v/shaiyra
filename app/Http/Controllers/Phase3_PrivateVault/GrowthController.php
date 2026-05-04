<?php

namespace App\Http\Controllers\Phase3_PrivateVault;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GrowthController extends Controller
{
    public function index(): JsonResponse
    {
        $milestones = HeirloomStore::list('phase3.growth.milestones', $this->seedMilestones());
        $latest = end($milestones) ?: null;

        return response()->json([
            'status' => 'success',
            'data' => [
                'latest_milestone' => $latest,
                'milestone_count' => count($milestones),
                'completion_rate' => 0.65,
            ],
        ]);
    }

    public function getMilestones(): JsonResponse
    {
        $milestones = HeirloomStore::list('phase3.growth.milestones', $this->seedMilestones());

        return response()->json([
            'status' => 'success',
            'count' => count($milestones),
            'data' => $milestones,
        ]);
    }

    public function recordMilestone(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'age_months' => 'required|integer|min:0|max:240',
            'status' => 'sometimes|string|in:planned,active,completed',
            'recorded_at' => 'sometimes|date',
            'notes' => 'sometimes|string',
        ]);

        $milestones = HeirloomStore::list('phase3.growth.milestones', $this->seedMilestones());
        $id = HeirloomStore::nextId($milestones);

        $payload = array_merge($validated, [
            'id' => $id,
            'status' => $validated['status'] ?? 'active',
            'recorded_at' => $validated['recorded_at'] ?? now()->toDateString(),
            'recorded_by' => $request->user()?->id,
        ]);

        $milestones[] = $payload;
        HeirloomStore::put('phase3.growth.milestones', $milestones);

        return response()->json([
            'status' => 'success',
            'message' => 'Growth milestone recorded.',
            'data' => $payload,
        ], 201);
    }

    public function getCharts(): JsonResponse
    {
        $points = [
            ['month' => 4, 'height_cm' => 64.0, 'weight_kg' => 6.5],
            ['month' => 7, 'height_cm' => 70.2, 'weight_kg' => 8.2],
            ['month' => 10, 'height_cm' => 74.0, 'weight_kg' => 9.5],
            ['month' => 13, 'height_cm' => 78.5, 'weight_kg' => 10.9],
            ['month' => 16, 'height_cm' => 82.0, 'weight_kg' => 11.8],
            ['month' => 18, 'height_cm' => 85.0, 'weight_kg' => 12.4],
        ];

        return response()->json([
            'status' => 'success',
            'data' => [
                'series' => $points,
                'units' => ['height' => 'cm', 'weight' => 'kg'],
            ],
        ]);
    }

    public function getTimeline(): JsonResponse
    {
        $timeline = [
            ['id' => 1, 'title' => 'First Smile', 'month' => 2, 'date' => '2022-11-12'],
            ['id' => 2, 'title' => 'First Crawl', 'month' => 7, 'date' => '2023-04-20'],
            ['id' => 3, 'title' => 'First Tooth', 'month' => 8, 'date' => '2023-05-14'],
            ['id' => 4, 'title' => 'Independent Steps', 'month' => 13, 'date' => '2023-10-05'],
        ];

        return response()->json([
            'status' => 'success',
            'count' => count($timeline),
            'data' => $timeline,
        ]);
    }

    public function updateMilestone(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'age_months' => 'sometimes|integer|min:0|max:240',
            'status' => 'sometimes|string|in:planned,active,completed',
            'recorded_at' => 'sometimes|date',
            'notes' => 'sometimes|string',
        ]);

        $milestones = HeirloomStore::list('phase3.growth.milestones', $this->seedMilestones());
        $existing = HeirloomStore::findById($milestones, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Milestone not found.',
            ], 404);
        }

        $milestones = HeirloomStore::upsertById($milestones, $id, $validated);
        HeirloomStore::put('phase3.growth.milestones', $milestones);

        return response()->json([
            'status' => 'success',
            'message' => 'Milestone updated.',
            'data' => HeirloomStore::findById($milestones, $id),
        ]);
    }

    public function deleteMilestone(int $id): JsonResponse
    {
        $milestones = HeirloomStore::list('phase3.growth.milestones', $this->seedMilestones());
        $existing = HeirloomStore::findById($milestones, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Milestone not found.',
            ], 404);
        }

        $milestones = HeirloomStore::deleteById($milestones, $id);
        HeirloomStore::put('phase3.growth.milestones', $milestones);

        return response()->json([
            'status' => 'success',
            'message' => 'Milestone deleted.',
        ]);
    }

    private function seedMilestones(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'First Smile',
                'age_months' => 2,
                'status' => 'completed',
                'recorded_at' => '2022-11-12',
                'notes' => 'Spontaneous social smile observed in morning routine.',
            ],
            [
                'id' => 2,
                'title' => 'First Crawl',
                'age_months' => 7,
                'status' => 'completed',
                'recorded_at' => '2023-04-20',
                'notes' => 'Self-propelled movement across living room carpet.',
            ],
            [
                'id' => 3,
                'title' => 'Independent Steps',
                'age_months' => 13,
                'status' => 'completed',
                'recorded_at' => '2023-10-05',
                'notes' => 'Three unassisted steps recorded on video.',
            ],
        ];
    }
}
