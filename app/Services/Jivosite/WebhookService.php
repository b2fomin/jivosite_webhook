<?php

namespace App\Services\Jivosite;

use App\Models\Jivosite\Webhook;

class WebhookService
{
    public function store(array $data)
    {
        $webhook = Webhook::createOrFirst($data);
    }
}