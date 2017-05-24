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
if ($_SERVER["REQUEST_METHOD"] == "POST") {//if there is a POST request
	if (!empty($_POST["save"])){
		header('Content-Type: application/xml;');
		header('Content-Disposition: attachment; filename="strings.xml"');

		//print credits
		echo '<?xml version="1.0" encoding="utf-8"?>

';
		echo '<!-- **********************************************************  -->
';
		echo '<!-- THIS TRANSLATION IS MADE BY '.$_POST['username'].' USING StringsXmlBuilder -->
';
		echo '<!-- StringsXmlBuilder is an OPEN SOURCE tool realized by rignaneseleo <dev.rignaneseleo@gmail.com>-->
';
		echo '<!-- https://github.com/rignaneseleo/Strings.xml-builder-and-translator-PHP -->
';
		echo '<!-- **********************************************************  -->

';
		echo '<resources>
';
		foreach($_POST['translatedValueIds'] as $key=>$value)
		{
			if($value!=""){
				$value=str_replace("'", "\'", $value);//add the \'
				echo '<string name="'.$key.'">'.$value.'</string>
';//create a <string> with its value
			}
		}
		echo '</resources>';
		/*
		$resources = new SimpleXMLElement('<resources/>');//create an xml file with the tag <resources>

		$resources->addChild('!-- TRANSLATION IS MADE BY '.$_POST['username'].'  using  Strings.xml Builder --><rignaneseleo');

		foreach($_POST[translatedValueIds] as   $key=>$value)
		{
		$value=str_replace("'", "\'", $value);//add the \'

		$string = $resources->addChild('string',$value);//create a <string> with its value
		$string->addAttribute("name",$key);//set the "name" at the <string>
		}

		$xml =$resources->asXML();
		header('Content-Type: application/xml;');
		header('Content-Disposition: attachment; filename="strings.xml"');
		echo $xml;*/
	}
}
?>