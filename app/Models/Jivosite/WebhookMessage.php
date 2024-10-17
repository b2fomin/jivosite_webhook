<?php

namespace App\Models\Jivosite;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jivosite\Webhook;

class WebhookMessage extends Model
{
    protected $guarded = False;
    protected $table='jivosite_webhook_message';
    
    public function webhook()
    {
        return $this->belongsTo(Webhook::class, 'jivosite_webhook_id', 'id');
    }
}
