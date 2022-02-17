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
            'uuid' => $this->uuid,
            'reference' => $this->reference,
            'note' => $this->note,
            'subtotal' => $this->subtotal,
            'vatTotal' => $this->vatTotal,
            'total' => $this->total,
            'title' => $this->title,
            'customer' => $this->customer,
            'created' => $this->created_at->format('d/m/Y h:i:s'),
            'items' => InvoiceItem::with('item')->where('invoice_id', $this->id)->get(),
            'user' => $this->user,
            'qrcode' => $this->qrcode
        ];
    }
}
