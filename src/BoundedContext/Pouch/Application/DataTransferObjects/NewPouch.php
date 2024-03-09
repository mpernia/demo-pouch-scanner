<?php

namespace App\Src\BoundedContext\Pouch\Application\DataTransferObjects;

use DateTime;

class NewPouch
{
    public function __construct(
        private readonly ?string $pouchId,
        private readonly bool $secondValidation,
        private readonly ?string $secondValidationBy,
        private readonly ?string $checkedBy,
        private readonly ?DateTime $checkedDateTime,
        private readonly ?string $pouchImageUrl,
        private readonly ?string $productionBox,
        private readonly ?DateTime $doseTime,
        private readonly ?string $visionState,
        private readonly ?string $visionMessage,
        private readonly ?int $rollId,
        private readonly ?DateTime $createdAt
    )
    {

    }

    public function getPouchId(): ?string
    {
        return $this->pouchId;
    }

    public function isSecondValidation(): bool
    {
        return $this->secondValidation;
    }

    public function getSecondValidationBy(): ?string
    {
        return $this->secondValidationBy;
    }

    public function getCheckedBy(): ?string
    {
        return $this->checkedBy;
    }

    public function getCheckedDateTime(): ?DateTime
    {
        return $this->checkedDateTime;
    }

    public function getPouchImageUrl(): ?string
    {
        return $this->pouchImageUrl;
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

    public function getVisionMessage(): ?string
    {
        return $this->visionMessage;
    }

    public function getRollId(): ?int
    {
        return $this->rollId;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }
}
