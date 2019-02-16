<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property int $harga
 * @property int $satuan_id
 * @property string $created_at
 * @property string $updated_at
 */
class Barang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang';

    /**
     * @var array
     */
    protected $fillable = ['kode', 'nama', 'harga_modal', 'harga_jual', 'satuan_id', 'created_at', 'updated_at'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

}
