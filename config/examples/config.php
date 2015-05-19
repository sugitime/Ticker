<?php
/**
 * Created by PhpStorm.
 * User: ksugihara
 * Date: 5/18/15
 * Time: 9:57 AM
 */

namespace MT;

class Config extends HelperClass{

    private $co;

    public function __construct()
    {
        $config['path'] = dirname(__FILE__) . "../../"; //TODO: REPLACE THIS!
        $config['twitter']['username'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['user_id'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['bf_username'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['bf_user_id'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['consumer_key'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['consumer_secret'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['access_token'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['access_token_secret'] = "your info"; //TODO: REPLACE THIS!
        $config['twitter']['tweet_count'] = "5"; //TODO: REPLACE THIS!
        $config['twitter']['template'] = "widgets/twitter.html";
        $this->co = $config;
    }

    public function getConf() {
        return $this->co;
    }
}

?>
