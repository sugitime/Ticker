<?php
/**
 * Created by PhpStorm.
 * User: ksugihara
 * Date: 5/18/15
 * Time: 9:40 AM
 */

namespace MT;
require_once('AuthClass.php');
require_once('BulletinBoardClass.php');
require_once('CalendarClass.php');
require_once('EmailClass.php');
require_once('MotdClass.php');
require_once('NewsFeedClass.php');
require_once('RssClass.php');
require_once('SecurityFeedClass.php');
require_once('TwitterClass.php');
require_once('config/base/config.php');


class HelperClass {
    protected $conf;
    protected $a;
    protected $b;
    protected $c;
    protected $e;
    protected $m;
    protected $n;
    protected $r;
    protected $s;
    protected $t;
    protected $config;

    public function __construct()
    {
        $this->conf = new \MT\Config();
        $this->config = $this->conf->getConf();
    }

    public function twitterGrab() {
        if($this->t === null) {
            $this->t = new TwitterClass();
        }
        return $this->t->tweetResponder(
            'bishopfox',
            $this->config['twitter']['consumer_key'],
            $this->config['twitter']['consumer_secret'],
            $this->config['twitter']['access_token'],
            $this->config['twitter']['access_token_secret'],
            15
        );

    }

    public function debug($msg)
    {
        return "<pre>" . var_dump($msg) . "</pre>";
    }

}