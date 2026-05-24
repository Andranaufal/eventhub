<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'slug'
    ];

    public static function generateSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '<>', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}