<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProducts
 */
class Products extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(ShopCategory::class);
    }
}
