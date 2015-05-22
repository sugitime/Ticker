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
    public $template;

    public function __construct()
    {
        $this->conf = new \MT\Config();
        $this->config = $this->conf->getConf();
        $this->template = $this->config['template'];
    }

    public function twitterGrab() {
        if($this->t === null) {
            $this->t = new TwitterClass();
        }
        $twitterReply = $this->t->tweetResponder(
            'bishopfox',
            $this->config['twitter']['consumer_key'],
            $this->config['twitter']['consumer_secret'],
            $this->config['twitter']['access_token'],
            $this->config['twitter']['access_token_secret'],
            15
        );
        //var_dump($twitterReply);

        //So... lets grab the twitter name, twitter pic and tweet.
        $twitterData = array();
        foreach($twitterReply as $tweet) {
            $tmp = array();
            $tmp['user'] = $tweet->user->name;
            //https, cause we're sexy like that.
            $tmp['pic'] = $tweet->user->profile_image_url_https;
            $tmp['tweet'] = $tweet->text;
            array_push($twitterData, $tmp);
        }

        $retstring = "";
        foreach($twitterData as $td) {
            extract($td);
            $retstring .= "<b>" . $td['user'] . ":</b> " . $td['tweet'] . "       ";
        }
        return $retstring;
        //extract($twitterData);
    }

    public function emailGrab() {
        if($this->e === null) {
            $this->e = new EmailClass(
                $this->config['email']['imap_server'],
                $this->config['email']['imap_port'],
                $this->config['email']['username'],
                $this->config['email']['password'],
                $this->config['email']['tmp_dir']);
        }

        return $this->e->fetchMail();
    }

    public function render() {

    }

    public function debug($msg)
    {
        return "<pre>" . var_dump($msg) . "</pre>";
    }

}