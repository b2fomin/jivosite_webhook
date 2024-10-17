<?php

namespace App\Models\Jivosite;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jivosite\WebhookMessage;

class Webhook extends Model
{
    protected $guarded = False;
    protected $table='jivosite_webhook';


    public function webhookMessages()
    {
        return $this->hasMany(WebhookMessage::class, 'jivosite_webhook_id', 'id');
    }
}
