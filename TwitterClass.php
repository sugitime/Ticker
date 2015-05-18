<?php
/**
 * Created by PhpStorm.
 * User: ksugihara
 * Date: 5/18/15
 * Time: 9:39 AM
 */

namespace MT;


class TwitterClass {

    function TwitterClass() {
        require_once('/config/base/config.php');

        require_once('twitter_proxy.php');
        $user_id = '78884300';
        $screen_name = 'parallax';
        $count = 10;
        $twitter_url = 'statuses/user_timeline.json';
        $twitter_url .= '?user_id=' . $config['twitter']['bf_user_id'];
        $twitter_url .= '&screen_name=' . $config['twitter']['bf_username'];
        $twitter_url .= '&count=' . $config['twitter']['tweet_count'];
        // Create a Twitter Proxy object from our twitter_proxy.php class
        $twitter_proxy = new TwitterProxy(
            $config['twitter']['access_token'],			// 'Access token' on https://apps.twitter.com
            $config['twitter']['access_token_secret'],		// 'Access token secret' on https://apps.twitter.com
            $config['twitter']['consumer_key'],					// 'API key' on https://apps.twitter.com
            $config['twitter']['consumer_secret'],				// 'API secret' on https://apps.twitter.com
            $config['twitter']['user_id'],						// User id (http://gettwitterid.com/)
            $config['twitter']['username'],					// Twitter handle
            $config['twitter']['tweet_count']							// The number of tweets to pull out
        );
        // Invoke the get method to retrieve results via a cURL request
        $tweets = $twitter_proxy->get($twitter_url);
        echo $tweets;

    }

}