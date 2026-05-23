<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Worker;
use App\Models\Enterprise;

class WorkerResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return array(
			"name" => $this->name,
			"email" => $this->email,
			"sector" => $this->sector
		);
    }
}
