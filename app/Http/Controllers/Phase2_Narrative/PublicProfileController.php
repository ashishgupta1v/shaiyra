<?php

namespace App\Http\Controllers\Phase2_Narrative;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicProfileController extends Controller
{
    public function index(): JsonResponse
    {
        $profile = HeirloomStore::list('phase2.public_profile', $this->seedPublicProfile());

        return response()->json([
            'status' => 'success',
            'data' => $profile,
        ]);
    }

    public function favorites(): JsonResponse
    {
        $favorites = HeirloomStore::list('phase2.favorites', $this->seedFavorites());

        return response()->json([
            'status' => 'success',
            'count' => count($favorites),
            'data' => $favorites,
        ]);
    }

    public function createShare(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'expires_in_hours' => 'sometimes|integer|min:1|max:720',
            'scope' => 'sometimes|string|in:profile,favorites,full',
        ]);

        $shares = HeirloomStore::list('phase2.shares', []);
        $token = Str::uuid()->toString();
        $expiresAt = now()->addHours((int) ($validated['expires_in_hours'] ?? 48))->toIso8601String();

        $share = [
            'token' => $token,
            'scope' => $validated['scope'] ?? 'full',
            'created_by' => $request->user()?->id,
            'created_at' => now()->toIso8601String(),
            'expires_at' => $expiresAt,
        ];

        $shares[] = $share;
        HeirloomStore::put('phase2.shares', $shares);

        return response()->json([
            'status' => 'success',
            'message' => 'Share link generated.',
            'data' => [
                'token' => $token,
                'scope' => $share['scope'],
                'expires_at' => $expiresAt,
                'share_url' => url('/share/' . $token),
            ],
        ], 201);
    }

    public function validateShare(string $token): JsonResponse
    {
        $shares = HeirloomStore::list('phase2.shares', []);
        $match = null;

        foreach ($shares as $share) {
            if (($share['token'] ?? null) === $token) {
                $match = $share;
                break;
            }
        }

        if (!$match) {
            return response()->json([
                'status' => 'error',
                'message' => 'Share link not found.',
            ], 404);
        }

        $isExpired = now()->greaterThan($match['expires_at']);
        if ($isExpired) {
            return response()->json([
                'status' => 'error',
                'message' => 'Share link expired.',
            ], 410);
        }

        $profile = HeirloomStore::list('phase2.public_profile', $this->seedPublicProfile());
        $favorites = HeirloomStore::list('phase2.favorites', $this->seedFavorites());

        $payload = match ($match['scope']) {
            'profile' => ['profile' => $profile],
            'favorites' => ['favorites' => $favorites],
            default => ['profile' => $profile, 'favorites' => $favorites],
        };

        return response()->json([
            'status' => 'success',
            'message' => 'Share link is valid.',
            'scope' => $match['scope'],
            'data' => $payload,
        ]);
    }

    private function seedPublicProfile(): array
    {
        return [
            'display_name' => 'Shaiyra Gupta',
            'headline' => 'Twenty-Five Years of Curation',
            'bio' => 'A non-linear odyssey through the milestones, quiet moments, and professional leaps that define a life in progress.',
            'location' => 'London',
            'avatar_url' => 'https://images.example.com/shaiyra/avatar.jpg',
            'highlights' => [
                'London Design Award',
                'The Solitude of Siena',
                'Mastering the Lens',
            ],
        ];
    }

    private function seedFavorites(): array
    {
        return [
            [
                'id' => 101,
                'type' => 'milestone',
                'title' => 'The Beginning',
                'slug' => 'the-beginning',
            ],
            [
                'id' => 102,
                'type' => 'photo',
                'title' => 'Library Afternoon',
                'slug' => 'library-afternoon',
            ],
        ];
    }
}
