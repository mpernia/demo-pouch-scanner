<?php

namespace App\Src\BoundedContext\Pouch\Infrastructure\Controllers;

use App\Http\Controllers\Controller;

use App\Src\BoundedContext\Pouch\Application\Actions\PouchSynchronizer;
use Illuminate\Http\JsonResponse;
use PouchScanner\Infrastructure\Facades\PouchScanner;

class PouchSynchronizeApiController extends Controller
{
    public function __invoke(
        PouchSynchronizer $pouchSynchronizer
    ): JsonResponse
    {
        $pouchSynchronizer->__invoke('');
        return response()->json(['message' => 'hello']);
    }
}
