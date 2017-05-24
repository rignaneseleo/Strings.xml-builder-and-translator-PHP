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
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
		<title>StringsXml Builder & Translator | rignaneseleo</title>
		
		<!-- facebook  -->
		<meta property="og:title" content="StringsXmlBuilder And Translator" />
		<meta property="og:image" content="http://stringsxmlbuilder.netsons.org/sxb.png"/>
		<meta property="og:site_name" content="StringsXmlBuilder" />
		
		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
		
		<!-- favicon  -->
		<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
		<link rel="manifest" href="favicon/manifest.json">
		
	</head>
	<body>
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				
				<?php include_once("partials/header.php"); ?>
				
				<div class="row center">
					<form method="post" action="downloadXml.php">
						<?php
							//add library to translate the strings
							require 'vendor/autoload.php';
							use Stichoza\GoogleTranslate\TranslateClient;
							echo TranslateClient::translate('en', 'ka', 'Hello again');//debug
							$translationError=false;
							
							if (!empty($_GET["originalXmlURL"])){
								$originalXmlURL =rawurldecode($_GET["originalXmlURL"]);//get the url of the strings.xml file
								//todo validateXmlURL
								//initialize the translation Language
								$translationLang="";
								if(!empty($_GET["translationLang"])){//if there is
									$translationLang=$_GET["translationLang"];//get the translation language
									$translator = new TranslateClient('en', $translationLang);
								}
								//create the list of already translated strings
								$stringsAlreadyTranslated = array();
								//check if there is a file altready partially translated
								if(!empty($_GET["translatedXmlURL"])){
									$translatedXmlURL =rawurldecode($_GET["translatedXmlURL"]);//get the url of the strings.xml file altready partially translated
									$translatedXml = simplexml_load_file($translatedXmlURL);//read the XML
									foreach($translatedXml->children() as $alreadyTranslatedString) {
										$stringName=(string)$alreadyTranslatedString['name'];
										$stringValue=str_replace("\'", "&apos;", (string)$alreadyTranslatedString);//normalize string
										$stringsAlreadyTranslated[$stringName]=$stringValue;
									}
								}
								//start building the table
								echo "<table style='width: 100%' class='highlight centered'><thead><tr> <th> Value </th> <th> Translation </th></tr></thead><tbody>";//start table
								$originalXml = simplexml_load_file($originalXmlURL);//read the XML
								foreach($originalXml->children() as $rowString) {//foreach string
									if((string)$rowString['translatable']!="false"){//only translatable strings
										//initialize variables
										$disabled=false;
										$stringName=(string)$rowString['name'];
										$stringValue=str_replace("\'", "&apos;", (string)$rowString);//normalize string
										$translatedValue="";
										//check if there are already translated strings
										if(!empty($stringsAlreadyTranslated)){
											//there are strings to avoid
											if (array_key_exists($stringName, $stringsAlreadyTranslated)) {
												//it was already translated
												$translatedValue=$stringsAlreadyTranslated[$stringName];
												$disabled=true;
											}
										}
										if(!empty($translationLang) && empty($translatedValue))//if you know the translation language and there isn't altready a translation
										{
											try {//try because sometimes the translator has issues
												$translatedValue=str_replace("'", "&apos;",$translator->translate(str_replace("\'", "'", (string)$rowString)));//translate removing the '
											}
											catch(Exception $e){
												$translationError=true;	//with this flag, after will show the toast error message
											}
										}
										//start building the row
										echo "<tr ";
										if($disabled)echo "class='disabled hide'";
										echo ">";
										echo  "<td style='max-width:700px'>". $stringValue . "</td>";
										echo  "<td>";
										//echo "<input type='hidden' name='stringValueIds[". $stringName ."]' value='".$stringValue."'>"; to print the english value
										echo "<textarea ";
										if($disabled) echo "readonly";
										echo " style='width: 100%' class='materialize-textarea' type='text' name='translatedValueIds[". $stringName ."]'>".   $translatedValue ."</textarea></td>";
										echo "</tr>";
									}
								}
								echo "</tbody></table>";//end table
							}
							else{
								header("Location: index.php");//return at home
							}
						?>
						<div class="divider"></div>
						<div class="row center">
							<div id="progressbar" class="progress hide">
								<div class="indeterminate"></div>
							</div>
							<div class="input-field col s6">
								<input class="validate" type="text" name="username" />
								<label for="username">Your name or username</label>
							</div>
							<div class="col s6" style="margin-top: 1rem;">
								<!--<button class="btn waves-effect waves-light orange" type="submit" value="" name="save" id="generateStringsXml">
									Save the strings.xml translated
									<i class="material-icons right">attach_file</i>
								</button>-->
								<input type="submit" class="waves-effect waves-light btn orange" name="save" id="generateStringsXml" value="Generate Translated Strings.xml" />
							</div>
						</div>
					</form>
					
					<!--FAB Button-->
					<div class="fixed-action-btn <?php if(empty($_GET["translatedXmlURL"])){echo "hide";} ?>" style="bottom: 85px; right: 24px;">
						<a id="FAB" class="btn-floating tooltipped waves-light btn-large red" showstrings="true" data-position="left" data-delay="50" data-tooltip="Show\Hide strings altready translated">
							<i id="FAB-icon" class="large material-icons">view_stream</i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
		
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
			
			$('#FAB').click(function () {
				if ($("#FAB").attr("showStrings") == "true") {
					$("tr.disabled").removeClass("hide");
					$("#FAB-icon").html("reorder");
					$("#FAB").attr("showStrings", "false");
				}
				else {
					$("tr.disabled").addClass("hide");
					$("#FAB-icon").html("view_stream");
					$("#FAB").attr("showStrings", "true");
				}
			});
			
			
			var editedForms = false;
			$(function(){				
				// Cambio lo stato della variabile se si accede ad un elemento del form
				$('form input, form select, form textarea').focus(function(){
					editedForms = true;
				});				
			});
			
			window.onbeforeunload = function() {
				if (editedForms){
					return 'Attenction!'+'\n'+
					'Seems that you are losing your work!';
				}
			}
			
			<?php 
				if($translationError)
				echo "$(function () {Materialize.toast('There was an error during the translation!', 10000);})"; 				
			?>
			
		</script>
	</body>
</html>
