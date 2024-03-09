<?php

namespace App\Src\Shared\Infrastructure\Persistences\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pouch extends Model
{
    use SoftDeletes;

    public $table = 'pouches';

    protected $fillable = [
        'pouch_id',
        'second_validation',
        'second_validation_by',
        'checked_by',
        'checked_date_time',
        'pouch_image_url',
        'production_box',
        'dose_time',
        'vision_state',
        'vision_message',
        'roll_id',
    ];

    protected $dates = [
        'checked_date_time',
        'dose_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function roll() : BelongsTo
    {
        return $this->belongsTo(self::class, 'roll_id');
    }

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
