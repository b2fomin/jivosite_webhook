<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use App\Services\Jivosite\WebhookService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    public function __construct(WebhookService $service)
    {
        $this->service=$service;
    }
}
