<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\Step;
use App\Models\Review;
use App\Models\User;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'id' => 'string'
    ];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function ingredients(): HasMany {
        return $this->hasMany(Ingredient::class);
    }

    public function steps(): Hasmany{
        return $this->hasMany(Step::class);
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
