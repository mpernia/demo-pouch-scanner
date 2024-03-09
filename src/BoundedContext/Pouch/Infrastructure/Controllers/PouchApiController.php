<?php

namespace App\Src\BoundedContext\Pouch\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use App\Src\BoundedContext\Pouch\Application\Actions\PouchCreator;
use App\Src\BoundedContext\Pouch\Application\Actions\PouchDestroyer;
use App\Src\BoundedContext\Pouch\Application\Actions\PouchFinder;
use App\Src\BoundedContext\Pouch\Application\Actions\PouchUpdater;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\EditPouch;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\FindPouch;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\NewPouch;
use App\Src\BoundedContext\Pouch\Infrastructure\Requests\PouchRequest;
use App\Src\BoundedContext\Pouch\Infrastructure\Requests\PouchStoreRequest;
use App\Src\BoundedContext\Pouch\Infrastructure\Requests\PouchUpdateRequest;
use App\Src\BoundedContext\Pouch\Infrastructure\Resources\PouchResource;
use DateTime;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PouchApiController extends Controller
{
    public function index(
        PouchFinder $finder,
        PouchRequest $request
    ): JsonResponse
    {
        $pouches = $finder->findWithParams(
            new FindPouch(
                id: $request->get('') ?? null,
                pouchId: $request->get('') ?? null,
                checkedDateTime: $request->get('') ?? null,
                productionBox: $request->get('') ?? null,
                doseTime: $request->get('') ?? null,
                visionState: $request->get('') ?? null,
                rollId: $request->get('') ?? null
            )
        );
        //return PouchResource::collection([]);
        return response()->json([], Response::HTTP_OK);
    }

    public function store(
        PouchCreator $creator,
        PouchStoreRequest $request
    ): JsonResponse
    {
        $pouch =$creator->__invoke(
            new NewPouch(
                pouchId: $request->get('pouch_id') ?? null,
                secondValidation: $request->get('second_validation') ?? null,
                secondValidationBy: $request->get('second_validation_by') ?? null,
                checkedBy: $request->get('checked_by') ?? null,
                checkedDateTime: new DateTime($request->get('checked_date_time')) ?? null,
                pouchImageUrl: $request->get('pouch_image_url') ?? null,
                productionBox: $request->get('production_box') ?? null,
                doseTime: new DateTime($request->get('dose_time')) ?? null,
                visionState: $request->get('vision_state') ?? null,
                visionMessage: $request->get('vision_message') ?? null,
                rollId: $request->get('rollId') ?? null,
                createdAt: new DateTime('now')
            )
        );
        //return new PouchResource(Pouch::create($request->validated()));
        return response()->json([], Response::HTTP_CREATED);
    }

    public function show(PouchFinder $finder, int|string $id)
    {
        $pouch = $finder->find($id);
        //return new PouchResource($pouch);
        return response()->json([], Response::HTTP_OK);
    }

    public function update(
        PouchUpdater $updater,
        PouchUpdateRequest $request,
        $id
    ): JsonResponse
    {
        $updater->__invoke(
            new EditPouch(
                id: $id,
                pouchId: $request->get('pouch_id') ?? null,
                secondValidation: $request->get('second_validation') ?? null,
                secondValidationBy: $request->get('second_validation_by') ?? null,
                checkedBy: $request->get('checked_by') ?? null,
                checkedDateTime: new DateTime($request->get('checked_date_time')) ?? null,
                pouchImageUrl: $request->get('pouch_image_url') ?? null,
                productionBox: $request->get('production_box') ?? null,
                doseTime: new DateTime($request->get('dose_time')) ?? null,
                visionState: $request->get('vision_state') ?? null,
                visionMessage: $request->get('vision_message') ?? null,
                updatedAt: new DateTime('now')
            )
        );
        return response()->json([], Response::HTTP_ACCEPTED);
    }

    public function destroy(PouchDestroyer $destroyer, int|string $id): JsonResponse
    {
        $destroyer->__invoke($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
