<?php

namespace App\Http\Controllers\Phase1_Foundation;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(): JsonResponse
    {
        $members = HeirloomStore::list('phase1.family.members', $this->seedMembers());

        return response()->json([
            'status' => 'success',
            'data' => [
                'family_name' => 'Henderson Family',
                'member_count' => count($members),
                'roles' => $this->roles(),
            ],
        ]);
    }

    public function setup(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'family_name' => 'required|string|max:255',
            'primary_contact' => 'required|string|max:255',
        ]);

        HeirloomStore::put('phase1.family.setup', [
            'family_name' => $validated['family_name'],
            'primary_contact' => $validated['primary_contact'],
            'configured_at' => now()->toIso8601String(),
            'configured_by' => $request->user()?->id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Family setup saved successfully.',
        ]);
    }

    public function getMembers(): JsonResponse
    {
        $members = HeirloomStore::list('phase1.family.members', $this->seedMembers());

        return response()->json([
            'status' => 'success',
            'count' => count($members),
            'data' => $members,
        ]);
    }

    public function addMember(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|in:owner,trustee,beneficiary,viewer',
            'email' => 'required|email|max:255',
        ]);

        $members = HeirloomStore::list('phase1.family.members', $this->seedMembers());
        $id = HeirloomStore::nextId($members);

        $payload = array_merge($validated, ['id' => $id]);
        $members[] = $payload;
        HeirloomStore::put('phase1.family.members', $members);

        return response()->json([
            'status' => 'success',
            'message' => 'Family member added.',
            'data' => $payload,
        ], 201);
    }

    public function updateMember(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'role' => 'sometimes|string|in:owner,trustee,beneficiary,viewer',
            'email' => 'sometimes|email|max:255',
        ]);

        $members = HeirloomStore::list('phase1.family.members', $this->seedMembers());
        $existing = HeirloomStore::findById($members, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Family member not found.',
            ], 404);
        }

        $members = HeirloomStore::upsertById($members, $id, $validated);
        HeirloomStore::put('phase1.family.members', $members);

        return response()->json([
            'status' => 'success',
            'message' => 'Family member updated.',
            'data' => HeirloomStore::findById($members, $id),
        ]);
    }

    public function removeMember(int $id): JsonResponse
    {
        $members = HeirloomStore::list('phase1.family.members', $this->seedMembers());
        $existing = HeirloomStore::findById($members, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Family member not found.',
            ], 404);
        }

        $members = HeirloomStore::deleteById($members, $id);
        HeirloomStore::put('phase1.family.members', $members);

        return response()->json([
            'status' => 'success',
            'message' => 'Family member removed.',
        ]);
    }

    public function getRoles(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->roles(),
        ]);
    }

    private function roles(): array
    {
        return [
            ['key' => 'owner', 'label' => 'Owner'],
            ['key' => 'trustee', 'label' => 'Trustee'],
            ['key' => 'beneficiary', 'label' => 'Beneficiary'],
            ['key' => 'viewer', 'label' => 'Viewer'],
        ];
    }

    private function seedMembers(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Sarah Henderson',
                'role' => 'owner',
                'email' => 'sarah@heirloom.local',
            ],
            [
                'id' => 2,
                'name' => 'Julian Henderson',
                'role' => 'trustee',
                'email' => 'julian@heirloom.local',
            ],
        ];
    }
}
