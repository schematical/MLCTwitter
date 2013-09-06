<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user1a
 * Date: 4/7/13
 * Time: 4:16 PM
 * To change this template use File | Settings | File Templates.
 */
class MJaxTwitterTweetListPanel extends MJaxPanel{
    protected $arrQueryData = array();
    protected $intInterval = 15000;
    public function __construct($objParentControl,$strControlId = null) {
        parent::__construct($objParentControl,$strControlId);

        $this->objForm->AddHeaderAsset(
            new MJaxJSHeaderAsset(
                MLCApplication::GetAssetUrl('/js/MLC.Twitter.js', 'MLCTwitter')
            )
        );
        $this->objForm->AddHeaderAsset(
            new MJaxJSHeaderAsset(
                MLCApplication::GetAssetUrl('/js/MJax.Twitter.js', 'MLCTwitter')
            )
        );
    }
    public function Render($blnPrint = true, $blnAjaxFormating = false){
        $this->objForm->AddJSCall(
            sprintf(
              'MJax.Twitter.InitTwitterListPanel("%s", %s, %s);',
              $this->strControlId,
              json_encode($this->arrQueryData),
              $this->intInterval
            )
        );
        return parent::Render($blnPrint, $blnAjaxFormating);
    }
    public function SetQueryData($mixData){
        if(is_array($mixData)){
            $this->arrQueryData = $mixData;
        }else{
            $this->arrQueryData['q'] = $mixData;
        }
    }
    public function __get($strName) {
        switch ($strName) {

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

            case "Dnt": return $this->strDnt = $mixValue;
            default:
                return parent::__set($strName, $mixValue);

        }
    }


}