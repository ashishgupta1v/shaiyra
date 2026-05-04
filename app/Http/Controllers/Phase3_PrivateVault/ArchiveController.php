<?php

namespace App\Http\Controllers\Phase3_PrivateVault;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index(): JsonResponse
    {
        $archives = HeirloomStore::list('phase3.archives', $this->seedArchives());

        return response()->json([
            'status' => 'success',
            'count' => count($archives),
            'data' => $archives,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $archives = HeirloomStore::list('phase3.archives', $this->seedArchives());
        $archive = HeirloomStore::findById($archives, $id);

        if (!$archive) {
            return response()->json([
                'status' => 'error',
                'message' => 'Archive not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $archive,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'privacy_level' => 'sometimes|string|in:private,restricted,trusted',
        ]);

        $archives = HeirloomStore::list('phase3.archives', $this->seedArchives());
        $id = HeirloomStore::nextId($archives);

        $payload = array_merge($validated, [
            'id' => $id,
            'privacy_level' => $validated['privacy_level'] ?? 'private',
            'created_by' => $request->user()?->id,
            'created_at' => now()->toIso8601String(),
        ]);

        $archives[] = $payload;
        HeirloomStore::put('phase3.archives', $archives);

        return response()->json([
            'status' => 'success',
            'message' => 'Archive created successfully.',
            'data' => $payload,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:100',
            'description' => 'sometimes|string',
            'privacy_level' => 'sometimes|string|in:private,restricted,trusted',
        ]);

        $archives = HeirloomStore::list('phase3.archives', $this->seedArchives());
        $existing = HeirloomStore::findById($archives, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Archive not found.',
            ], 404);
        }

        $archives = HeirloomStore::upsertById($archives, $id, $validated);
        HeirloomStore::put('phase3.archives', $archives);

        return response()->json([
            'status' => 'success',
            'message' => 'Archive updated successfully.',
            'data' => HeirloomStore::findById($archives, $id),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $archives = HeirloomStore::list('phase3.archives', $this->seedArchives());
        $existing = HeirloomStore::findById($archives, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Archive not found.',
            ], 404);
        }

        $archives = HeirloomStore::deleteById($archives, $id);
        HeirloomStore::put('phase3.archives', $archives);

        return response()->json([
            'status' => 'success',
            'message' => 'Archive deleted successfully.',
        ]);
    }

    public function getItems(int $id): JsonResponse
    {
        $archives = HeirloomStore::list('phase3.archives', $this->seedArchives());
        $archive = HeirloomStore::findById($archives, $id);

        if (!$archive) {
            return response()->json([
                'status' => 'error',
                'message' => 'Archive not found.',
            ], 404);
        }

        $items = HeirloomStore::list('phase3.archive_items', $this->seedArchiveItems());
        $items = array_values(array_filter(
            $items,
            static fn ($item) => (int) ($item['archive_id'] ?? 0) === $id
        ));

        return response()->json([
            'status' => 'success',
            'archive' => $archive,
            'count' => count($items),
            'data' => $items,
        ]);
    }

    private function seedArchives(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Letters to My Daughter',
                'category' => 'letters',
                'description' => 'Future-delivery letters preserved for milestone birthdays.',
                'privacy_level' => 'private',
            ],
            [
                'id' => 2,
                'title' => 'Wellness Heritage',
                'category' => 'wellness',
                'description' => 'Confidential family health context and milestone notes.',
                'privacy_level' => 'restricted',
            ],
        ];
    }

    private function seedArchiveItems(): array
    {
        return [
            [
                'id' => 1,
                'archive_id' => 1,
                'title' => 'Letter for Age 16',
                'type' => 'letter',
                'created_at' => '2024-01-12T10:00:00Z',
            ],
            [
                'id' => 2,
                'archive_id' => 1,
                'title' => 'Letter for Graduation Day',
                'type' => 'letter',
                'created_at' => '2024-02-08T18:00:00Z',
            ],
            [
                'id' => 3,
                'archive_id' => 2,
                'title' => 'Pediatric Baseline Summary',
                'type' => 'record',
                'created_at' => '2024-03-11T13:15:00Z',
            ],
        ];
    }
}
