<?php

namespace App\Http\Resources;

use App\Models\InvoiceItem;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'notes' => $this->notes,
            'subtotal' => $this->subtotal,
            'vatTotal' => $this->vatTotal,
            'total' => $this->total,
            'title' => $this->title,
            'to' => $this->to,
            'toContact' => $this->toContact,
            'address' => $this->address,
            'created' => $this->created_at->format('d/m/Y h:i:s'),
            'items' => InvoiceItem::with('item')->where('invoice_id', $this->id)->get()
        ];
    }
}
