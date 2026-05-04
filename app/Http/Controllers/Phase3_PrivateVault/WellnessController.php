<?php

namespace App\Http\Controllers\Phase3_PrivateVault;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WellnessController extends Controller
{
    public function index(): JsonResponse
    {
        $records = HeirloomStore::list('phase3.wellness.records', $this->seedRecords());
        $latest = end($records) ?: null;

        return response()->json([
            'status' => 'success',
            'data' => [
                'latest_record' => $latest,
                'record_count' => count($records),
                'confidentiality' => 'private-vault',
            ],
        ]);
    }

    public function recordData(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'recorded_on' => 'required|date',
            'type' => 'required|string|max:100',
            'summary' => 'required|string|max:500',
            'notes' => 'sometimes|string',
            'provider' => 'sometimes|string|max:255',
        ]);

        $records = HeirloomStore::list('phase3.wellness.records', $this->seedRecords());
        $id = HeirloomStore::nextId($records);
        $payload = array_merge($validated, [
            'id' => $id,
            'recorded_by' => $request->user()?->id,
        ]);

        $records[] = $payload;
        HeirloomStore::put('phase3.wellness.records', $records);

        return response()->json([
            'status' => 'success',
            'message' => 'Wellness record saved.',
            'data' => $payload,
        ], 201);
    }

    public function getRecords(): JsonResponse
    {
        $records = HeirloomStore::list('phase3.wellness.records', $this->seedRecords());

        return response()->json([
            'status' => 'success',
            'count' => count($records),
            'data' => $records,
        ]);
    }

    public function getDashboard(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => [
                'next_checkup' => '2026-02-15',
                'vaccination_compliance' => 0.92,
                'sleep_consistency' => 0.88,
                'activity_goal_progress' => 0.88,
            ],
        ]);
    }

    public function getInsights(): JsonResponse
    {
        $insights = [
            [
                'id' => 1,
                'severity' => 'info',
                'title' => 'Sleep hygiene improving',
                'detail' => 'Average REM cycles have improved by 15% across the last quarter.',
            ],
            [
                'id' => 2,
                'severity' => 'watch',
                'title' => 'Vitamin D follow-up due',
                'detail' => 'Schedule quarterly Vitamin D review before winter period.',
            ],
        ];

        return response()->json([
            'status' => 'success',
            'count' => count($insights),
            'data' => $insights,
        ]);
    }

    public function updateRecord(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'recorded_on' => 'sometimes|date',
            'type' => 'sometimes|string|max:100',
            'summary' => 'sometimes|string|max:500',
            'notes' => 'sometimes|string',
            'provider' => 'sometimes|string|max:255',
        ]);

        $records = HeirloomStore::list('phase3.wellness.records', $this->seedRecords());
        $existing = HeirloomStore::findById($records, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wellness record not found.',
            ], 404);
        }

        $records = HeirloomStore::upsertById($records, $id, $validated);
        HeirloomStore::put('phase3.wellness.records', $records);

        return response()->json([
            'status' => 'success',
            'message' => 'Wellness record updated.',
            'data' => HeirloomStore::findById($records, $id),
        ]);
    }

    public function deleteRecord(int $id): JsonResponse
    {
        $records = HeirloomStore::list('phase3.wellness.records', $this->seedRecords());
        $existing = HeirloomStore::findById($records, $id);

        if (!$existing) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wellness record not found.',
            ], 404);
        }

        $records = HeirloomStore::deleteById($records, $id);
        HeirloomStore::put('phase3.wellness.records', $records);

        return response()->json([
            'status' => 'success',
            'message' => 'Wellness record deleted.',
        ]);
    }

    private function seedRecords(): array
    {
        return [
            [
                'id' => 1,
                'recorded_on' => '2023-10-15',
                'type' => 'comprehensive_screening',
                'summary' => 'Annual comprehensive screening with normal vitals.',
                'provider' => 'Dr. Helena Vance',
                'notes' => 'Recommended Vitamin D supplementation for winter quarter.',
            ],
            [
                'id' => 2,
                'recorded_on' => '2023-05-22',
                'type' => 'dental_prophylaxis',
                'summary' => 'Bi-annual dental prophylaxis with no cavities.',
                'provider' => 'Dr. Marcus Chen',
                'notes' => 'Next appointment scheduled for November.',
            ],
        ];
    }
}
