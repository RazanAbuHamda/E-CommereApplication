<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PurchaseTransaction
 *
 * @property int $id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|PurchaseTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PurchaseTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PurchaseTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class PurchaseTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function product () {
        return $this->belongsTo('App\Models\Product');
    }

}
