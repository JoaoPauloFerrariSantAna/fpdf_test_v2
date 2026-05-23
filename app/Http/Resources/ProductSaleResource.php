<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

	// product protected $fillable = array("name", "stock", "price", "created_at", "updated_at");
    // sale protected $fillable = array("amount_sold", "sale_date");

    public function toArray(Request $request): array
    {
        return array(
			"product_name" => $this->product->name,
			"product_price" => $this->product->price,
			"product_sold" => $this->sale->amount_sold,
			"product_sold_date" => $this->sale->created_at
		);
    }
}
