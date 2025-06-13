<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOutTag extends Model
{
    /** @use HasFactory<\Database\Factories\CashOutTagFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function cashOuts()
    {
        return $this->hasMany(CashOut::class);
    }
}
