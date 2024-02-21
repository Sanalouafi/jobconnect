<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable =
    [
        'name',
        'localisation',
        'description'
    ];

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    public function secturs()
    {
        return $this->belongsToMany(Sector::class, 'company_secteur');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
