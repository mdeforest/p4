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
            'maxResults' => 50
        ];

        foreach($search->criteria as $criterion) {
            $params[$criterion->api_call] = $criterion->pivot->value;
        }

        $results = \Youtube::searchAdvanced($params);
        shuffle($results);

        $num_results = 0;
        $i = 0;

        while($num_results < 5 && $i < 50) {
            if(!\App\Result::where('channel_name', $results[$i]->snippet->channelTitle)->first()) {
                $result = new \App\Result();

                $result->search_id = $search->id;
                $result->platform_id = $search->platform_id;
                $result->user_id = $search->user_id;

                $result->channel_name = $results[$i]->snippet->channelTitle;
                $result->url = "https://youtube.com/channel/" . $results[$i]->id->channelId;

                $channel = \Youtube::getChannelById($results[$i]->id->channelId);
                $result->followers = (int)$channel->statistics->subscriberCount;

                $result->save();

                $num_results += 1;
            }

            $i += 1;
        }
    }
}