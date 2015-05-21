<?php
/**
 * Created by PhpStorm.
 * User: ksugihara
 * Date: 5/18/15
 * Time: 9:40 AM
 */

namespace MT;
require('lib/IncomingMail.php');
require('lib/Mailbox.php');
require('lib/__autoload.php');
use PhpImap\Mailbox as Mailbox;
use PhpImap\IncomingMail as IncomingMail;
use PhpImap\IncomingMailAttachment as IncomingMailAttachment;


class EmailClass extends HelperClass {

    private $mailbox;

    public function __construct($server, $port, $user, $pass, $tmp) {
        $this->mailbox = new Mailbox(
            '{' . $server . ':' . $port . '/imap/ssl}INBOX',
            $user,
            $pass,
            $tmp);
    }

    public function fetchMail() {
        $mails = array();
        $mailsIds = $this->mailbox->searchMailbox('UNSEEN');
        if(!$mailsIds) {
            return false;
        }

        foreach ($mailsIds as $mailId) {
            $mail = $this->mailbox->getMail($mailId);
            var_dump($mail);
            var_dump($mail->getAttachments());
        }

    }

}