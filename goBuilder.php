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
	
	if (!empty($_POST["urlStringsXml"])){//if there is a POST request with urlStringsXml
		
		$urlStringsXml=$_POST["urlStringsXml"];//get the url of the strings.xml file
		$translationLanguage=$_POST["translationLanguage"];//get the  translation language
		
		if($urlStringsXml!=null)//check if urlStringsXml was insered
		{
			header("Location:/builder.php?url=".$urlStringsXml."&lang=".$translationLanguage);//change page and go to build.php passing the xml url and the translation language
		}
	}
?>	