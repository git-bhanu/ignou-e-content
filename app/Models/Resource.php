<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Resource extends Model
{
    use HasFactory;

    public function publisher()
    {
        return $this->belongsTo(\App\Models\Publisher::class);
    }

    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    public function contributor()
    {
        return $this->contributor(\App\Models\Course::class);
    }
}
