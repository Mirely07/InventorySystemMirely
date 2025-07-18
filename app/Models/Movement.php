<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'type',
        'origin_sector_id',
        'destination_sector_id',
        'user_id',
        'date',
        'date_return',
    ];

    // app/Models/Prestamo.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function originSector()
    {
        return $this->belongsTo(Sector::class, 'origin_sector_id');
    }

    public function destinationSector()
    {
        return $this->belongsTo(Sector::class, 'destination_sector_id');
    }

    public function movementDetails()
    {
        return $this->hasMany(MovementDetail::class, 'movement_id');
    }

}
