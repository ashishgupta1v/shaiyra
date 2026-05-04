<?php

namespace App\Http\Controllers\Phase2_Narrative;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $items = HeirloomStore::list('phase2.photos', $this->seedPhotos());
        $milestoneId = $request->query('milestone_id');

        if ($milestoneId) {
            $items = array_values(array_filter(
                $items,
                static fn ($item) => (int) ($item['milestone_id'] ?? 0) === (int) $milestoneId
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
        $items = HeirloomStore::list('phase2.photos', $this->seedPhotos());
        $item = HeirloomStore::findById($items, $id);

        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Photo not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $item,
        ]);
    }

    public function upload(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'thumbnail_url' => 'nullable|url',
            'milestone_id' => 'nullable|integer|min:1',
            'category' => 'nullable|string|max:100',
            'taken_at' => 'nullable|date',
            'is_public' => 'sometimes|boolean',
        ]);

        $items = HeirloomStore::list('phase2.photos', $this->seedPhotos());
        $id = HeirloomStore::nextId($items);
        $payload = array_merge($validated, [
            'id' => $id,
            'is_public' => (bool) ($validated['is_public'] ?? true),
            'uploaded_by' => $request->user()?->id,
        ]);

        $items[] = $payload;
        HeirloomStore::put('phase2.photos', $items);

        return response()->json([
            'status' => 'success',
            'message' => 'Photo uploaded successfully.',
            'data' => $payload,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'url' => 'sometimes|url',
            'thumbnail_url' => 'sometimes|nullable|url',
            'milestone_id' => 'sometimes|nullable|integer|min:1',
            'category' => 'sometimes|nullable|string|max:100',
            'taken_at' => 'sometimes|nullable|date',
            'is_public' => 'sometimes|boolean',
        ]);

        $items = HeirloomStore::list('phase2.photos', $this->seedPhotos());
        $existing = HeirloomStore::findById($items, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Photo not found.',
            ], 404);
        }

        $items = HeirloomStore::upsertById($items, $id, $validated);
        HeirloomStore::put('phase2.photos', $items);

        return response()->json([
            'status' => 'success',
            'message' => 'Photo updated successfully.',
            'data' => HeirloomStore::findById($items, $id),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $items = HeirloomStore::list('phase2.photos', $this->seedPhotos());
        $existing = HeirloomStore::findById($items, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Photo not found.',
            ], 404);
        }

        $items = HeirloomStore::deleteById($items, $id);
        HeirloomStore::put('phase2.photos', $items);

        return response()->json([
            'status' => 'success',
            'message' => 'Photo deleted successfully.',
        ]);
    }

    private function seedPhotos(): array
    {
        return [
            [
                'id' => 1,
                'milestone_id' => 1,
                'title' => 'First Light',
                'url' => 'https://images.example.com/shaiyra/first-light.jpg',
                'thumbnail_url' => 'https://images.example.com/shaiyra/first-light-thumb.jpg',
                'category' => 'origin',
                'taken_at' => '2004-01-01',
                'is_public' => true,
            ],
            [
                'id' => 2,
                'milestone_id' => 2,
                'title' => 'Library Afternoon',
                'url' => 'https://images.example.com/shaiyra/library-afternoon.jpg',
                'thumbnail_url' => 'https://images.example.com/shaiyra/library-afternoon-thumb.jpg',
                'category' => 'education',
                'taken_at' => '2016-06-15',
                'is_public' => true,
            ],
            [
                'id' => 3,
                'milestone_id' => 3,
                'title' => 'City Lights',
                'url' => 'https://images.example.com/shaiyra/city-lights.jpg',
                'thumbnail_url' => 'https://images.example.com/shaiyra/city-lights-thumb.jpg',
                'category' => 'career',
                'taken_at' => '2023-09-10',
                'is_public' => true,
            ],
        ];
    }
}
