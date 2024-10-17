<?php

namespace App\Services\Jivosite;

use App\Models\Jivosite\Webhook;
use App\Models\Jivosite\WebhookMessage;

class WebhookService
{
    public function store(array $data)
    {
        $data_webhook = [
            'event_name' => $data['event_name'],
            'widget_id' => $data['widget_id'],
            'visitor_name' => $data['visitor']['name'],
            'visitor_email' => $data['visitor']['email'],
            'visitor_phone' => $data['visitor']['phone'],
            'visitor_description' => $data['visitor']['description'],
            'visitor_number' => $data['visitor']['number'],
            'chat_id' => $data['chat_id'],
            'session_geoip_country' => $data['session']['geoip']['country'],
            'session_geoip_region' => $data['session']['geoip']['region'],
            'session_geoip_city' => $data['session']['geoip']['city'],
            'session_utm_json_google' => $data['session']['utm_json']['google'],
            'session_utm_json_campaign' => $data['session']['utm_json']['campaign'],
            'session_utm_json_content' => $data['session']['utm_json']['content'],
            'session_utm_json_medium' => $data['session']['utm_json']['medium'],
            'session_utm_json_term' => $data['session']['utm_json']['term'],
            'page_title' => $data['page']['title'],
            'page_url' => $data['page']['url'],
        ];
        $webhook = Webhook::createOrFirst($data_webhook);

        $data_webhook_msg = [];
        
        switch($data['event_name'])
        {
        case 'chat_finished':
            foreach($data['messages'] as $message)
            {
                $data_webhook_msg['message'] = $message['message'];
                $data_webhook_msg['timestamp'] = $message['timestamp'];
                $data_webhook_msg['type'] = $message['type'];
                if ($message['type'] === 'agent')
                    $data_webhook_msg['agent_id'] = $message['agent_id'];
                $data_webhook_msg['jivosite_webhook_id'] = WebhookMessage::where('message', '=', $message['message'])->id();
    }
        break;
        case 'offline_message':
            $data_webhook_msg['message'] = $data['message'];
            $data_webhook_msg['timestamp'] = $data['timestamp'];
            $data_webhook_msg['type'] = 'visitor';
            $data_webhook_msg['agent_id'] = null;
            $data_webhook_msg['jivosite_webhook_id'] = WebhookMessage::where('message', '=', $data['message'])->id();
        break;
        default:
            return response()->json(['success' => False]);
        }

        WebhookMessage::createOrFirst($data_webhook_msg);
        return response()->json(['success' => True]);
    }
}