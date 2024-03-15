<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn (string $value) => [
                'title' => $value,
                'slug' => Str::of($value)->slug('-')
            ],
        );
    }

    protected function body(): Attribute
    {
        return Attribute::make(
            set: fn (array $value) => implode("\n\n", $value)
            // set: fn (array $value) => $value
        );
    }

    protected function summary(): Attribute
    {
        return Attribute::make(
            set: fn (array $value) => implode("\n\n", $value)
        );
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
