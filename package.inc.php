<?php
define('__MLC_TWITTER__', dirname(__FILE__));

define('__MLC_TWITTER_CORE__', __MLC_TWITTER__ . '/_core');
define('__MLC_TWITTER_CORE_CTL__', __MLC_TWITTER_CORE__ . '/ctl');
define('__MLC_TWITTER_CORE_MODEL__', __MLC_TWITTER_CORE__ . '/model');
define('__MLC_TWITTER_CORE_VIEW__', __MLC_TWITTER_CORE__ . '/view');
MLCApplicationBase::$arrClassFiles['MLCTwitterDriver'] = __MLC_TWITTER_CORE__ . '/MLCTwitterDriver.class.php';
//CTL
MLCApplicationBase::$arrClassFiles['MJaxTwitterShareLink'] = __MLC_TWITTER_CORE_CTL__ . '/MJaxTwitterShareLink.class.php';
MLCApplicationBase::$arrClassFiles['MJaxTwitterTweetListPanel'] = __MLC_TWITTER_CORE_CTL__ . '/MJaxTwitterTweetListPanel.class.php';


require_once(__MLC_TWITTER_CORE__ . '/_enum.inc.php');
//require_once(__MLC_TWITTER_CORE__ . '/_exception.inc.php');
if(!class_exists('OAuthException', true)){
    require_once(__MLC_TWITTER_CORE__ . '/twitteroauth/twitteroauth.php');
}
