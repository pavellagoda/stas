<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Country extends CFormModel
{
	public $code;
	public $title;	

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'code'=>'Country Code',
            'title'=>'Title',
		);
	}
    
//    public static function getList(){
//        return array(
//            'brazil'=>'Brazil',
//            'south-america'=>'South American',
//            'united-kingdom'=>'United Kingdom',
//            'united-states'=>'United States',
//            'germany'=>'Germany',
//            'france'=>'France',
//            'spain'=>'Spain',
//            'italy'=>'Italy',
//        );
//    }
    public static function getList(){
        return array(
            'br'=>'Brazil',
            'sa'=>'South American',
            'uk'=>'United Kingdom',
            'us'=>'United States',
            'de'=>'Germany',
            'fr'=>'France',
            'es'=>'Spain',
            'it'=>'Italy',
        );
    }
    
    public static function shortNamesList(){
        return array(
            'br'=>'brazil',
            'sa'=>'south-america',
            'uk'=>'united-kingdom',
            'us'=>'united-states',
            'de'=>'germany',
            'fr'=>'france',
            'es'=>'spain',
            'it'=>'italy',
        );
    }
    
    public static function getShortNameByUrl($url){
        $list = array_flip(self::shortNamesList());
        return $list[$url];
    }
    
    public static function getUrlByShortName($name){
        $list = self::shortNamesList();
        return $list[$name];
    }
    
    /**
     * Get current selected locale
     * @param string|null $default
     * @return type string
     */
    public static function getCurrent($default = NULL, $mergeEN = false){
        if (is_null($default)) $default = self::definePreferred();
        $code = yii::app()->session->get('current_country', $default);
        
        if ($mergeEN && in_array($code, array('uk','us'))) $code = 'en';
            
        return $code;
    }
    
    /**
     * Define preferred language from user browser
     * @return string 
     */
    private static function definePreferred(){
        $lang = yii::app()->request->getPreferredLanguage();
        list($locale) = explode('_', $lang);
        return key_exists($locale, self::getList()) ? $locale : 'uk';
    }
}
