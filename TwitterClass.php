<?php
/**
 * Created by PhpStorm.
 * User: ksugihara
 * Date: 5/18/15
 * Time: 9:39 AM
 */
namespace MT;

class TwitterClass extends HelperClass {

    public function __construct() {
        require_once('twitter/tweets.php');
    }

    public function tweetResponder($userid, $ck, $cs, $at, $ats, $count = 15 /*TODO: dont hardcode*/) {
        $content = display_latest_tweets(
            $userid,
            $ck,
            $cs,
            $at,
            $ats,
            $count);
        $template = $this->getTemplate();
        return $template;
    }

    private function getTemplate() {
        $file = fopen($this->config['twitter']['template'], 'r');
        $c = fread($file,filesize($this->config['twitter']['template']));
        fclose($file);
        return $c;
    }

}