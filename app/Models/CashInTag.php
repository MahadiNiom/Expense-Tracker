<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashInTag extends Model
{
    /** @use HasFactory<\Database\Factories\CashInTagFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function cashIns()
    {
        return $this->hasMany(CashIn::class);
    }

}
