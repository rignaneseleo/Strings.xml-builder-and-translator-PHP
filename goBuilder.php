<?php
/**
 * Free Android strings.xml builder and translator
 *
 * @author      Leonardo Rignanese (rignaneseleo) <rignanese.leo@gmail.com>
 *
 * @link        http://rignaneseleo.github.io/
 *
 * @license     GNU GENERAL PUBLIC LICENSE  Version 2, June 1991
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {//if there is a POST request
	if (!empty(trim($_POST["originalXmlURL"]))){//if there is a originalXmlURL
		$originalXmlURL=$_POST["originalXmlURL"];//get the url of the strings.xml file

		//todo validateXmlURL

		//check parameters
		$URLparameters="";
		if(isset($_POST["translatedXmlURL"]))
			if (!empty(trim($_POST["translatedXmlURL"]))){
				$translatedXmlURL=$_POST["translatedXmlURL"];//get the url of the translated strings.xml file
				//todo validateXmlURL
				$URLparameters.="&translatedXmlURL=".$translatedXmlURL;
			}

		$translationLang=$_POST["translationLang"];//get the translation language
		if (!empty($translationLang)) $URLparameters.="&translationLang=".$translationLang;


		header("Location: builder.php?originalXmlURL=".$originalXmlURL.$URLparameters);//change page and go to build.php passing the xml url and the translation language
	}
}
?>