<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Nome' => $this->name,
            'Cpf' => $this->cpf,
            'Endereço' => $this->address,
            'Criado em' => $this->created_at,
        ];
    }
}
