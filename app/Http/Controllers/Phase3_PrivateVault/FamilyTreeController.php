<?php

namespace App\Http\Controllers\Phase3_PrivateVault;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FamilyTreeController extends Controller
{
    public function index(): JsonResponse
    {
        $members = HeirloomStore::list('phase3.family_tree.members', $this->seedMembers());

        return response()->json([
            'status' => 'success',
            'count' => count($members),
            'data' => $members,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'relation' => 'required|string|max:100',
            'generation' => 'required|integer|min:1|max:10',
        ]);

        $members = HeirloomStore::list('phase3.family_tree.members', $this->seedMembers());
        $id = HeirloomStore::nextId($members);
        $payload = array_merge($validated, ['id' => $id]);

        $members[] = $payload;
        HeirloomStore::put('phase3.family_tree.members', $members);

        return response()->json([
            'status' => 'success',
            'message' => 'Family member added successfully.',
            'data' => $payload,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'role' => 'sometimes|string|max:100',
            'relation' => 'sometimes|string|max:100',
            'generation' => 'sometimes|integer|min:1|max:10',
        ]);

        $members = HeirloomStore::list('phase3.family_tree.members', $this->seedMembers());
        $existing = HeirloomStore::findById($members, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Family member not found.',
            ], 404);
        }

        $members = HeirloomStore::upsertById($members, $id, $validated);
        HeirloomStore::put('phase3.family_tree.members', $members);

        return response()->json([
            'status' => 'success',
            'message' => 'Family member updated successfully.',
            'data' => HeirloomStore::findById($members, $id),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $members = HeirloomStore::list('phase3.family_tree.members', $this->seedMembers());
        $existing = HeirloomStore::findById($members, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Family member not found.',
            ], 404);
        }

        $members = HeirloomStore::deleteById($members, $id);
        HeirloomStore::put('phase3.family_tree.members', $members);

        return response()->json([
            'status' => 'success',
            'message' => 'Family member removed successfully.',
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:2|max:100',
        ]);

        $query = mb_strtolower((string) $request->query('q'));
        $members = HeirloomStore::list('phase3.family_tree.members', $this->seedMembers());
        $filtered = array_values(array_filter($members, static function ($member) use ($query) {
            $name = mb_strtolower((string) ($member['name'] ?? ''));
            $relation = mb_strtolower((string) ($member['relation'] ?? ''));
            $role = mb_strtolower((string) ($member['role'] ?? ''));

            return str_contains($name, $query)
                || str_contains($relation, $query)
                || str_contains($role, $query);
        }));

        return response()->json([
            'status' => 'success',
            'query' => $query,
            'count' => count($filtered),
            'data' => $filtered,
        ]);
    }

    private function seedMembers(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Sarah Henderson',
                'role' => 'Matriarch',
                'relation' => 'Mother',
                'generation' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Julian Henderson',
                'role' => 'Trustee',
                'relation' => 'Brother',
                'generation' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Clara Henderson',
                'role' => 'Beneficiary',
                'relation' => 'Daughter',
                'generation' => 3,
            ],
        ];
    }
}
