<?php
/**
 *
 * Author: xionggang
 * Date: 16/8/16
 * Time: 下午12:07
 */
namespace Hyperbolaa\Xmpush\src;

use Hyperbolaa\Xmpush\lib\Constants;
use Hyperbolaa\Xmpush\lib\IOSBuilder;
use Hyperbolaa\Xmpush\lib\Sender;

class Xmpush
{
    /**
     * ios消息推送
     */
    public static function iospush($aliasList, $desc, $payload)
    {
        $secret   = '401ASz+9M5DO9mEBu8y3sw==';
        $bundleId = 'app.KidsClub.iOS';

        $a = new Constants();
        Constants::setBundleId($bundleId);
        Constants::setSecret($secret);

        $aliasList = array('18');
        $desc      = '这是一条mipush推送消息';
        $payload   = '{"test":1,"ok":"It\'s a string"}';

        $message = new IOSBuilder();
        $message->description($desc);
        $message->soundUrl('default');
        $message->badge('1');
        $message->extra('payload', $payload);
        $message->build();

        $sender = new Sender();
        print_r($sender->sendToAliases($message, $aliasList)->getRaw());
    }

    /**
     * 安卓消息推送
     */
    public static function androidpush()
    {
        $secret   = 'your app secret';
        $bundleId = 'your app bundleId';

        Constants::setBundleId($bundleId);
        Constants::setSecret($secret);

        $aliasList = array('2', 'alias2');
        $desc      = '这是一条mipush推送消息';
        $payload   = '{"test":1,"ok":"It\'s a string"}';

        $message = new IOSBuilder();
        $message->description($desc);
        $message->soundUrl('default');
        $message->badge('4');
        $message->extra('payload', $payload);
        $message->build();

        $sender = new Sender();
        print_r($sender->sendToAliases($message, $aliasList)->getRaw());

    }

}
