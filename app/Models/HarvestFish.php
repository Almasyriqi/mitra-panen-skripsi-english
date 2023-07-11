<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarvestFish extends Model
{
    use HasFactory;

    protected $table='harvest_fish';

    protected $fillable=[
        'fish_type_id',
        'sow_date',
        'seed_amount',
        'seed_weight',
        'survival_rate',
        'average_weight',
        'fish_amount',
        'pond_volume',
        'total_feed_spent',
        'harvest_date',
        'harvest_amount',
    ];

    public function fish() {
        return $this->belongsTo(FishType::class, 'fish_type_id');
    }
}
