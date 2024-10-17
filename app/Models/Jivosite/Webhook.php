<?php

namespace App\Models\Jivosite;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jivosite\WebhookMessage;

class Webhook extends Model
{
    protected $guarded = False;
    protected $table='jivosite_webhook_message';


    public function webhookMessage()
    {
        return $this->hasMany(WebhookMessage::class);
    }
}
