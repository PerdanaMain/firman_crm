<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        "type_id",
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_status',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'type_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }
}