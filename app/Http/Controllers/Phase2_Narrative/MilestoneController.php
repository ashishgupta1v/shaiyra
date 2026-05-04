<?php

namespace App\Http\Controllers\Phase2_Narrative;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $category = $request->query('category');
        $items = HeirloomStore::list('phase2.milestones', $this->seedMilestones());

        if ($category) {
            $items = array_values(array_filter(
                $items,
                static fn ($item) => strcasecmp((string) ($item['category'] ?? ''), (string) $category) === 0
            ));
        }

        return response()->json([
            'status' => 'success',
            'count' => count($items),
            'data' => $items,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $items = HeirloomStore::list('phase2.milestones', $this->seedMilestones());
        $item = HeirloomStore::findById($items, $id);

        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Milestone not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $item,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'event_date' => 'required|date',
            'is_public' => 'sometimes|boolean',
            'featured' => 'sometimes|boolean',
        ]);

        $items = HeirloomStore::list('phase2.milestones', $this->seedMilestones());
        $id = HeirloomStore::nextId($items);

        $payload = array_merge($validated, [
            'id' => $id,
            'is_public' => (bool) ($validated['is_public'] ?? true),
            'featured' => (bool) ($validated['featured'] ?? false),
            'created_by' => $request->user()?->id,
        ]);

        $items[] = $payload;
        HeirloomStore::put('phase2.milestones', $items);

        return response()->json([
            'status' => 'success',
            'message' => 'Milestone created successfully.',
            'data' => $payload,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category' => 'sometimes|string|max:100',
            'event_date' => 'sometimes|date',
            'is_public' => 'sometimes|boolean',
            'featured' => 'sometimes|boolean',
        ]);

        $items = HeirloomStore::list('phase2.milestones', $this->seedMilestones());
        $existing = HeirloomStore::findById($items, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Milestone not found.',
            ], 404);
        }

        $items = HeirloomStore::upsertById($items, $id, $validated);
        HeirloomStore::put('phase2.milestones', $items);

        return response()->json([
            'status' => 'success',
            'message' => 'Milestone updated successfully.',
            'data' => HeirloomStore::findById($items, $id),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $items = HeirloomStore::list('phase2.milestones', $this->seedMilestones());
        $existing = HeirloomStore::findById($items, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Milestone not found.',
            ], 404);
        }

        $items = HeirloomStore::deleteById($items, $id);
        HeirloomStore::put('phase2.milestones', $items);

        return response()->json([
            'status' => 'success',
            'message' => 'Milestone deleted successfully.',
        ]);
    }

    private function seedMilestones(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'The Beginning',
                'description' => 'The first sparks of curiosity in a world of primary colors.',
                'category' => 'origin',
                'event_date' => '2004-01-01',
                'is_public' => true,
                'featured' => true,
            ],
            [
                'id' => 2,
                'title' => 'School Days',
                'description' => 'Long afternoons in the library and the birth of a voice.',
                'category' => 'education',
                'event_date' => '2016-06-15',
                'is_public' => true,
                'featured' => true,
            ],
            [
                'id' => 3,
                'title' => 'Professional Growth',
                'description' => 'Transforming passion into impact across the global stage.',
                'category' => 'career',
                'event_date' => '2023-09-10',
                'is_public' => true,
                'featured' => true,
            ],
        ];
    }
}
