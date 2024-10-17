<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->validated();
        return $this->service->store($data);
    }
}
