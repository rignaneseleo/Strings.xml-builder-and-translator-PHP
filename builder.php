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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8" />
		<title>StringsXmlBuilder - RignaneseLeo</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		
		<script src="js/analytics.js"></script>
		<script src="js/jquery-2.2.0.min.js"></script>
		<script src="js/colResizable.min.js"></script>
	</head>
	<body>
		<header>
			<h1 class="text-center" >StringsXmlBuilder</h1>
		</header>
		<section>
			<div class="container">
				<form method="post" action="downloadXml.php">
					<?php
						//add library to translate the strings
						require 'vendor/autoload.php';
						use Stichoza\GoogleTranslate\TranslateClient;
						
						if (!empty($_GET["url"])){
							$urlStringsXml =$_GET['url'];//get the url of the strings.xml file
							
							$translationLanguage="";//initialize the translation Language
							if(!empty($_GET["lang"])){//if there is
								$translationLanguage=$_GET["lang"];//get the translation language                        
								if($translationLanguage!="")
								$translator = new TranslateClient('en', $translationLanguage);
							}
							
							//todo check fi the url is right
							
							if($urlStringsXml!=""){//if there is an url
								
								$oldXml = simplexml_load_file($urlStringsXml);//read the XML
								
								echo "<table style='width: 100%'><thead><tr> <th> Value </th> <th> Translation </th></tr></thead><tbody>";//start table
								foreach($oldXml->children() as $rowString) {
									if($rowString['translatable']!="false"){//only translatable strings
										
										$stringName=$rowString['name'];
										$stringValue=str_replace("\'", "&apos;", (string)$rowString);//normalize string
										
										$translatedValue="";
										if($translationLanguage!="")
										$translatedValue=str_replace("'", "&apos;",$translator->translate(str_replace("\'", "'", (string)$rowString)));
										
										
										echo "<tr>";
										echo  "<td style='max-width:700px'>". $stringValue . "</td>";
										echo  "<td ><input type='hidden' name='stringValueIds[". $stringName ."]' value='".$stringValue."'>";
										echo "<textarea style='width: 100%' class='form-control' type='text' name='translatedValueIds[". $stringName ."]'>".   $translatedValue ."</textarea></td>";
										echo "</tr>";
									}
								}
								echo "</tbody></table>";//end table
							}
							}else{
							header("Location: index.php");//return at home                    
						}
					?>
					<hr />
					<div style="width: 100%">
						<div class="inner">
							<input class="form-control" placeholder="Your name or your username" type="text" name="username" />
							<input type="submit" style="margin-top:10px;" class="btn btn-success btn-block" name="save" value="Generate Strings.xml Translated" />
						</div>
					</div>
					
				</form>
				<style>
					.inner {
                    width: 50%;
                    margin: 0 auto;
					}
				</style>
				<script>
					$(function () {
						$("table").colResizable();
					});
				</script>
			</div>
		</section>
		<footer>
			<h3 class="text-center">Leonardo Rignanese</h3>
		</footer>
	</body>
</html>
