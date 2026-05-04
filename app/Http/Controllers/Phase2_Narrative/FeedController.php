<?php

namespace App\Http\Controllers\Phase2_Narrative;

use App\Http\Controllers\Controller;
use App\Support\HeirloomStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(): JsonResponse
    {
        $items = HeirloomStore::list('phase2.feed', $this->seedFeed());

        return response()->json([
            'status' => 'success',
            'count' => count($items),
            'data' => $items,
        ]);
    }

    public function byCategory(string $category): JsonResponse
    {
        $items = HeirloomStore::list('phase2.feed', $this->seedFeed());
        $filtered = array_values(array_filter(
            $items,
            static fn ($item) => strcasecmp((string) ($item['category'] ?? ''), $category) === 0
        ));

        return response()->json([
            'status' => 'success',
            'category' => $category,
            'count' => count($filtered),
            'data' => $filtered,
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:2|max:100',
        ]);

        $term = mb_strtolower((string) $request->query('q', ''));
        $items = HeirloomStore::list('phase2.feed', $this->seedFeed());

        $filtered = array_values(array_filter($items, static function ($item) use ($term) {
            $title = mb_strtolower((string) ($item['title'] ?? ''));
            $excerpt = mb_strtolower((string) ($item['excerpt'] ?? ''));
            $tags = implode(' ', (array) ($item['tags'] ?? []));
            $tags = mb_strtolower($tags);

            return str_contains($title, $term)
                || str_contains($excerpt, $term)
                || str_contains($tags, $term);
        }));

        return response()->json([
            'status' => 'success',
            'query' => $term,
            'count' => count($filtered),
            'data' => $filtered,
        ]);
    }

    private function seedFeed(): array
    {
        return [
            [
                'id' => 1,
                'type' => 'milestone',
                'category' => 'origin',
                'title' => 'The Beginning',
                'excerpt' => 'The first sparks of curiosity in a world of primary colors.',
                'published_at' => '2004-01-01',
                'tags' => ['early-life', 'family'],
            ],
            [
                'id' => 2,
                'type' => 'milestone',
                'category' => 'education',
                'title' => 'School Days',
                'excerpt' => 'Long afternoons in the library and the birth of a voice.',
                'published_at' => '2016-06-15',
                'tags' => ['learning', 'library'],
            ],
            [
                'id' => 3,
                'type' => 'milestone',
                'category' => 'career',
                'title' => 'Professional Growth',
                'excerpt' => 'Transforming passion into impact across the global stage.',
                'published_at' => '2023-09-10',
                'tags' => ['career', 'awards'],
            ],
        ];
    }
}
