<?php

ini_set('default_charset','UTF-8'); 
mb_internal_encoding('UTF-8');  

class Translator
{
	private $_split_string;
	private $_en_string;
	private $_letters = array('ا' => 'a','ب' => 'b', 'ت' => 't', 'و'=>'o','ـ'=>'','ث' => 'th', 'ج' => 'j', 'ح' => 'h', 'خ' => 'kh', 'د' => 'd', 'ذ' => 'z', 'ص' => 'sa',  'ض' => 'da', 'ع' => 'e', 'غ' => 'g', 'ف' => 'f', 'ق' => 'k', 'ط' => 'ta','ظ' => 'za', 'م' => 'm', 'ك' => 'k', 'س' => 's', 'ش' => 'sh', 'ﻻ' => 'la', 'ي'=>'e','ى' => 'y', 'ل' => 'l', 'ة' => 't', 'ه' => 'h', 'ؤ' => 'oa', 'ئ' => 'eo', 'ن' => 'n', 'ز' => 'z', 'ر' => 'r', ' '=> ' ');

	/******************************
	* main translation method takes Arabic letters input as a String or an array of strings
	* returns English letters as String
	******************************/
	public function translate($s)
	{

		$this->str_split_unicode($s);
		if(!is_null($this->_split_string))
		{
			for ($i=0; $i <count($this->_split_string) ; $i++) 
			{ 
				$ar_letter = $this->_split_string[$i];

				if(array_key_exists($ar_letter, $this->_letters))
				{
					$this->_en_string .= $this->_letters[$ar_letter];
				}
			}
		}
		return $this->_en_string; 
	}

	private function str_split_unicode($string, $l = null) {
	    $l = (is_null($l)) ? 0 : $l;
	    if ($l > 0) {
	        $ret = array();
	        $len = mb_strlen($string, "UTF-8");
	        for ($i = 0; $i < $len; $i += $l) {
	            $ret[] = mb_substr($string, $i, $l, "UTF-8");
	        }
	        return $ret;
	    }
	    $this->_split_string = preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
	}

}

//END
