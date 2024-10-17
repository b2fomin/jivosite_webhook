<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use App\Http\Requests\Webhook\IndexRequest;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        try 
        {
            $this->service->store($data);
            return response()->json(['success' => 'ok']);
        }
        catch(\Exception $e)
        {
            return response()->json(['success' => $e->getMessage()]);
        }
    }
}
