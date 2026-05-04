<?php

namespace App\Http\Controllers\Phase4_Legacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LegacySettingsController extends Controller
{
    public function __call($name, $arguments): JsonResponse
    {
        $request = null;

        foreach ($arguments as $argument) {
            if ($argument instanceof Request) {
                $request = $argument;
                break;
            }
        }

        return response()->json([
            'status' => 'not_implemented',
            'controller' => static::class,
            'method' => $name,
            'message' => 'This endpoint is a temporary stub for upcoming implementation.',
            'path' => $request?->path(),
        ], 501);
    }
}
