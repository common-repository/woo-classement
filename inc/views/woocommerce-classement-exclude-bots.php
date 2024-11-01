<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WooclRobotDetector {
    private $user_agent;

    public function __construct() {
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
    }

    public function WooclisRobot() {
        $bots = array(
            'Googlebot',
            'Bingbot',
            'Slurp',
            'DuckDuckBot',
            'Baiduspider',
            'YandexBot',
            'Sogou',
            'Exabot',
            'facebot',
            'facebookexternalhit'
        );

        foreach ($bots as $bot) {
            if (stripos($this->user_agent, $bot) !== false) {
                return true;
            }
        }

        return false;
    }
}