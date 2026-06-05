<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
    ];

    public $sortable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    protected $with = [
        'category',
    ];

    protected $appends = ['image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }

    /**
     * Get a usable image URL (full URL if stored that way, or built from storage disk).
     * This makes the value in the `image` column directly usable by clients (mobile app, etc).
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return Storage::disk('public')->url($this->image);
    }

    /**
     * Get the relative storage path (for internal Storage disk operations like delete/exists).
     */
    public function getImagePathAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            $path = parse_url($this->image, PHP_URL_PATH);
            if ($path && str_starts_with($path, '/storage/')) {
                return ltrim(substr($path, strlen('/storage/')), '/');
            }
            return ltrim($path ?? '', '/');
        }

        return $this->image;
    }
}
