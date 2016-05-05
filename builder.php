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
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>StringsXml Builder & Translator | rignaneseleo</title>
		
		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/materialize.cleaned.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">	
			
				<?php include_once("partials/header.php"); ?>
				
				<br>
				<div class="row center">	
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
									
									echo "<table style='width: 100%' class='highlight centered'><thead><tr> <th> Value </th> <th> Translation </th></tr></thead><tbody>";//start table
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
											echo "<textarea style='width: 100%' class='materialize-textarea' type='text' name='translatedValueIds[". $stringName ."]'>".   $translatedValue ."</textarea></td>";
											echo "</tr>";
										}
									}
									echo "</tbody></table>";//end table
								}
								}else{
								header("Location: index.php");//return at home                    
							}
						?>
						<div class="divider"></div>
						<br>
						<div class="row center">
							<div id="progressbar" class="progress hide" >
								<div  class="indeterminate"></div>
							</div>	
							<div class="input-field col s6">
								<input class="validate" type="text" name="username" />
								<label for="username">Your name or username</label>
							</div>
							<div class="col s6" style="margin-top: 1rem;">
								<input type="submit"  class="waves-effect waves-light btn orange" name="save" id="generateStringsXml" value="Generate Strings.xml Translated" />
							</div>	
						</div>
					</div>	
				</form>				
			</div>			
		</div>
	</div>
	<br>
	
	<?php include_once("partials/footer.php"); ?>	
		
	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>		
	<script src="js/colResizable.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/analytics.js"></script>
	<script>
		$(function () {
			$("table").colResizable();
		});
		
		$('#generateStringsXml').click(function() {
			$('#progressbar').removeClass( "hide" );
			setTimeout(function(){$('#progressbar').addClass( "hide" );
			}, 3000);
		});	
	</script>
</body>
</html>
