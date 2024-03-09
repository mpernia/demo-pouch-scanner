<?php

namespace App\Src\Shared\Infrastructure\Persistences\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roll extends Model
{
    use SoftDeletes;


    public $table = 'rolls';

    protected $fillable = [
        'external_id',
        'batch_id',
        'patient_id',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pouches() : HasMany
    {
        return $this->hasMany(Pouch::class);
    }

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
