<?php

namespace App\Src\BoundedContext\Pouch\Application\DataTransferObjects;

use DateTime;

class FindPouch
{
    public function __construct(
        private readonly int|string $id,
        private readonly ?string $pouchId,
        private readonly ?DateTime $checkedDateTime,
        private readonly ?string $productionBox,
        private readonly ?DateTime $doseTime,
        private readonly ?string $visionState,
        private readonly ?int $rollId
    )
    {

    }

    public function getId(): int|string
    {
        return $this->id;
    }

    public function getPouchId(): ?string
    {
        return $this->pouchId;
    }

    public function getCheckedDateTime(): ?DateTime
    {
        return $this->checkedDateTime;
    }

    public function getProductionBox(): ?string
    {
        return $this->productionBox;
    }

    public function getDoseTime(): ?DateTime
    {
        return $this->doseTime;
    }

    public function getVisionState(): ?string
    {
        return $this->visionState;
    }

    public function getRollId(): ?int
    {
        return $this->rollId;
    }
}
