<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class HeirloomStore
{
    private const PREFIX = 'heirloom:';

    public static function list(string $key, array $seed = []): array
    {
        return Cache::rememberForever(self::PREFIX . $key, static fn () => $seed);
    }

    public static function put(string $key, array $value): void
    {
        Cache::forever(self::PREFIX . $key, $value);
    }

    public static function nextId(array $items): int
    {
        if (empty($items)) {
            return 1;
        }

        return max(array_map(static fn ($item) => (int) ($item['id'] ?? 0), $items)) + 1;
    }

    public static function findById(array $items, int $id): ?array
    {
        foreach ($items as $item) {
            if ((int) ($item['id'] ?? 0) === $id) {
                return $item;
            }
        }

        return null;
    }

    public static function upsertById(array $items, int $id, array $payload): array
    {
        foreach ($items as $index => $item) {
            if ((int) ($item['id'] ?? 0) === $id) {
                $items[$index] = array_merge($item, $payload, ['id' => $id]);
                return $items;
            }
        }

        $payload['id'] = $id;
        $items[] = $payload;

        return $items;
    }

    public static function deleteById(array $items, int $id): array
    {
        return array_values(array_filter(
            $items,
            static fn ($item) => (int) ($item['id'] ?? 0) !== $id
        ));
    }
}
