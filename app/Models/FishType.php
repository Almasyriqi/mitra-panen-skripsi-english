<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishType extends Model
{
    use HasFactory, Sluggable;

    protected $table='fish_types';

    protected $fillable=[
        'name',
        'slug',
        'latin_name',
        'duration',
        'photo',
        'photo_detail',
        'fcr',
        'feed_price',
        'selling_price',
        'temperature',
        'ph',
        'water_height',
        'water_type',
        'preparation_description',
        'seeding_description',
        'cutivation_description',
        'feed_spent',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function harvestFish() {
        return $this->hasMany(HarvestFish::class, 'fish_type_id');
    }

    public function getPhotoImageAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        } else {
            return asset('assets/images/blank.png');
        }
    }

    public function getDurationTimeAttribute()
    {
        $date = now()->addDay($this->duration+5);
        $duration_time = Carbon::now()->locale('id')->diffForHumans($date, CarbonInterface::DIFF_ABSOLUTE);
        return $duration_time;
    }
}
