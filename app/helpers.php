<?php

if (! function_exists('run_search')) {
    function run_search($search) {
        $platform_func = strtolower($search->platform->name) . "_search";

        $platform_func($search);
    }
}

if (! function_exists('youtube_search')) {
    function youtube_search($search) {
        $params = [
            'part' => 'snippet',
            'type' => 'channel',
            'maxResults' => 10
        ];

        foreach($search->criteria as $criterion) {
            $params[$criterion->api_call] = $criterion->pivot->value;
        }

        $results = \Youtube::searchAdvanced($params);

        foreach($results as $result_data) {
            if(!\App\Result::where('channel_name', $result_data->snippet->channelTitle)->first()) {
                $result = new \App\Result();

                $result->search_id = $search->id;
                $result->platform_id = $search->platform_id;
                $result->user_id = $search->user_id;

                $result->channel_name = $result_data->snippet->channelTitle;
                $result->url = "https://youtube.com/channel/" . $result_data->id->channelId;

                $channel = \Youtube::getChannelById($result_data->id->channelId);
                $result->followers = (int)$channel->statistics->subscriberCount;

                $result->save();
            }
        }
    }
}