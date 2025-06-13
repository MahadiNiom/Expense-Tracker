<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    /** @use HasFactory<\Database\Factories\CashOutFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'cash_out_tag_id',
        'date',
    ];
    public function cashOutTag()
    {
        return $this->belongsTo(CashOutTag::class);
    }
}
