<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashIn extends Model
{
    /** @use HasFactory<\Database\Factories\CashInFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'date',
        'cash_in_tag_id',
    ];

    public function cashInTag()
    {
        return $this->belongsTo(CashInTag::class);
    }

}
