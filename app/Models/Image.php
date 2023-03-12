<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 *
 * @property $id
 * @property $path
 * @property $created_at
 * @property $updated_at
 * @property $updated_at
 * 
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Image extends Model
{
    use HasFactory;

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path'
    ];
}
