<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $satuan
 * @property string $created_at
 * @property string $updated_at
 */
class Satuan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'satuan';

    /**
     * @var array
     */
    protected $fillable = ['satuan', 'created_at', 'updated_at'];

}
