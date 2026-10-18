<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'resi_number',
        'customer_name',
        'customer_phone',
        'customer_email',
        'shipping_address',
        'payment_method',
        'courier',
        'total_price',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'total_price' => 'decimal:2',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Helper to get status label and color badge
     */
    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'pending' => ['label' => 'Menunggu Pembayaran', 'color' => 'warning'],
            'paid' => ['label' => 'Sudah Dibayar', 'color' => 'info'],
            'processing' => ['label' => 'Sedang Diproses', 'color' => 'primary'],
            'completed' => ['label' => 'Selesai', 'color' => 'success'],
            'cancelled' => ['label' => 'Dibatalkan', 'color' => 'danger'],
            default => ['label' => ucfirst($this->status), 'color' => 'gray'],
        };
    }
}
