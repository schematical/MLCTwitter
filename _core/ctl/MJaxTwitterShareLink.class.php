<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user1a
 * Date: 4/7/13
 * Time: 3:18 PM
 * To change this template use File | Settings | File Templates.
 */
class MJaxTwitterShareLink extends MJaxLinkButton{
    protected $strUrl = null;//	URL of the page to share
    protected $strVia = null;//	Screen name of the user to attribute the Tweet to
    protected $strText = null;//	Default Tweet text
    protected $strRelated = null;//Related accounts
    protected $blnCount = null;//	Count box position
    protected $strLang = null;//	The language for the Tweet Button
    protected $blnCount = null;//	URL to which your shared URL resolves
    protected $strHashtags = null;//	Comma separated hashtags appended to tweet text
    protected $strSize = null;//	The size of the rendered button
    protected $strDnt = null;//	See this section for information

    public function __construct($objParentControl,$strControlId = null) {
        parent::__construct($objParentControl,$strControlId);

        $this->objForm->AddJSCall('!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");');

    }

    public function UpdateUrl(){
        $strHref = 'https://twitter.com/share?';
        $arrUrlData = array();
        if(!is_null($this->strUrl)){
            $arrUrlData['url'] = $this->strUrl;
        }
        if(!is_null($this->strVia)){
            $arrUrlData['via'] = $this->strVia;
        }
        if(!is_null($this->strText)){
            $arrUrlData['text'] = $this->strText;
        }
        if(!is_null($this->strRelated)){
            $arrUrlData['related'] = $this->strRelated;
        }
        if(!is_null($this->blnCount)){
            $arrUrlData['count'] = $this->blnCount;
        }
        if(!is_null($this->strLang)){
            $arrUrlData['lang'] = $this->strLang;
        }
        if(!is_null($this->blnCount)){
            $arrUrlData['count'] = $this->blnCount;
        }
        if(!is_null($this->strHashtags)){
            $arrUrlData['hashtags'] = $this->strHashtags;
        }
        if(!is_null($this->strSize)){
            $arrUrlData['size'] = $this->strSize;
        }
        if(!is_null($this->strDnt)){
            $arrUrlData['dnt'] = $this->strDnt;
        }
        $strHref .= http_build_query($arrUrlData);
        $this->Attr('href', $strHref);
    }
    /////////////////////////
    // Public Properties: GET
    /////////////////////////

    public function __get($strName) {
        switch ($strName) {
            case "Url": return $this->strUrl;
            case "Via": return $this->strVia;
            case "Text": return $this->strText;
            case "Related": return $this->strRelated;
            case "Count": return $this->blnCount;
            case "Lang": return $this->strLang;
            case "Count": return $this->blnCount;
            case "Hashtags": return $this->strHashtags;
            case "Size": return $this->strSize;
            case "Dnt": return $this->strDnt;
            default:
                return parent::__get($strName);

        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case "Url": return $this->strUrl = $mixValue;
            case "Via": return $this->strVia = $mixValue;
            case "Text": return $this->strText = $mixValue;
            case "Related": return $this->strRelated = $mixValue;
            case "Count": return $this->blnCount = $mixValue;
            case "Lang": return $this->strLang = $mixValue;
            case "Count": return $this->blnCount = $mixValue;
            case "Hashtags": return $this->strHashtags = $mixValue;
            case "Size": return $this->strSize = $mixValue;
            case "Dnt": return $this->strDnt = $mixValue;
            default:
                return parent::__set($strName, $mixValue);

        }
    }
    public function Render($blnPrint = true, $blnAjaxFormating = false){
        $this->UpdateUrl();
        return parent::Render($blnPrint, $blnAjaxFormating);
    }


}