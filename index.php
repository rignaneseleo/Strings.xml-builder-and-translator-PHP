<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
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
				
				<div class="row center" style="padding-top: 30px; margin-bottom: 88px;">	
					<div class="col s12">
						<ul class="tabs blue-text">
							<li class="tab col s6"><a class="active grey-text" href="#newFile">Translate new file</a></li>
							<li class="tab col s6"><a  class="active grey-text" href="#rimained">Translate remaining strings</a></li>
						</ul>
					</div>
					
					<div id="newFile" class="col s12">
						<form method="post" action="goBuilder.php">		
							
							<div class="input-field" >
								<input type="url"  value="<?php if (!empty($_GET['originalXmlURL'])){echo rawurldecode($_GET['originalXmlURL']);}else if (!empty($_GET['url'])){echo rawurldecode($_GET['url']);}?>" name="originalXmlURL" class="validate" />
								<label for="originalXmlURL">Github Strings.xml URL</label>
							</div>						
							
							<label for="translationLang">Your translaction language</label>		
							<div class="input-field">			
								<select  name="translationLang">
									<option value="" disabled selected >Choose the language that you know</option>
									<option value="" data-icon="" class="circle">Don't translate the strings</option>
									<option value="ar" data-icon="" class="circle">Arabic</option>
									<option value="bg">Bulgarian</option>
									<option value="zh-CN">Chinese (Simplified)</option>
									<option value="zh-TW">Chinese (Traditional)</option>
									<option value="nl">Dutch</option>
									<option value="fr">French</option>
									<option value="de">German</option>
									<option value="el">Greek</option>
									<option value="gu">Gujarati</option>
									<option value="ht">Haitian Creole</option>
									<option value="ha">Hausa</option>
									<option value="iw">Hebrew</option>
									<option value="hi">Hindi</option>
									<option value="hu">Hungarian</option>
									<option value="is">Icelandic</option>
									<option value="ig">Igbo</option>
									<option value="id">Indonesian</option>
									<option value="ga">Irish</option>
									<option value="it">Italian</option>
									<option value="ja">Japanese</option>
									<option value="kn">Kannada</option>
									<option value="kk">Kazakh</option>
									<option value="km">Khmer</option>
									<option value="ko">Korean</option>
									<option value="lo">Lao</option>
									<option value="la">Latin</option>
									<option value="lv">Latvian</option>
									<option value="lt">Lithuanian</option>
									<option value="mk">Macedonian</option>
									<option value="mt">Maltese</option>
									<option value="mi">Maori</option>
									<option value="mr">Marathi</option>
									<option value="mn">Mongolian</option>
									<option value="ne">Nepali</option>
									<option value="no">Norwegian</option>
									<option value="pl">Polish</option>
									<option value="pt">Portuguese</option>
									<option value="ro">Romanian</option>
									<option value="ru">Russian</option>
									<option value="sr">Serbian</option>
									<option value="si">Sinhala</option>
									<option value="sk">Slovak</option>
									<option value="sl">Slovenian</option>
									<option value="es">Spanish</option>
									<option value="su">Sundanese</option>
									<option value="sw">Swahili</option>
									<option value="sv">Swedish</option>
									<option value="tg">Tajik</option>
									<option value="ta">Tamil</option>
									<option value="te">Telugu</option>
									<option value="th">Thai</option>
									<option value="tr">Turkish</option>
									<option value="uk">Ukrainian</option>
									<option value="ur">Urdu</option>
									<option value="uz">Uzbek</option>
									<option value="vi">Vietnamese</option>
									<option value="yo">Yoruba</option>
									<option value="zu">Zulu</option>
								</select>
							</div>
							<div id="progressbar" class="progress hide">
								<div  class="indeterminate"></div>
							</div>	
							<button style="margin-top: 10px;" type="submit"  class="waves-effect waves-light btn orange" id="generateBuilder" name="generateBuilder">Go to Builder</button>						
							
						</form>
					</div>
					
					<div id="rimained" class="col s12">
						<form method="post" action="goBuilder.php">		
							
							<div class="input-field" >
								<input type="url"  value="<?php if (!empty($_GET['originalXmlURL'])){echo rawurldecode($_GET['originalXmlURL']);}else if (!empty($_GET['url'])){echo rawurldecode($_GET['url']);} ?>" name="originalXmlURL" class="validate" />
								<label for="originalXmlURL">Original Strings.xml URL</label>
							</div>
							
							<div class="input-field" >
								<input type="url"  value="<?php if (!empty($_GET['translatedXmlURL'])){echo $_GET['translatedXmlURL'];} ?>" name="translatedXmlURL" class="validate" />
								<label for="translatedXmlURL">Translated Strings.xml URL</label>
							</div>	
							
							<label for="translationLang">Your translaction language</label>		
							<div class="input-field">			
								<select  name="translationLang">
									<option value="" disabled selected>Choose the language that you know</option>
									<option value="" data-icon="" class="circle">Don't translate the strings</option>
									<option value="ar" data-icon="" class="circle">Arabic</option>
									<option value="bg">Bulgarian</option>
									<option value="zh-CN">Chinese (Simplified)</option>
									<option value="zh-TW">Chinese (Traditional)</option>
									<option value="nl">Dutch</option>
									<option value="fr">French</option>
									<option value="de">German</option>
									<option value="el">Greek</option>
									<option value="gu">Gujarati</option>
									<option value="ht">Haitian Creole</option>
									<option value="ha">Hausa</option>
									<option value="iw">Hebrew</option>
									<option value="hi">Hindi</option>
									<option value="hu">Hungarian</option>
									<option value="is">Icelandic</option>
									<option value="ig">Igbo</option>
									<option value="id">Indonesian</option>
									<option value="ga">Irish</option>
									<option value="it">Italian</option>
									<option value="ja">Japanese</option>
									<option value="kn">Kannada</option>
									<option value="kk">Kazakh</option>
									<option value="km">Khmer</option>
									<option value="ko">Korean</option>
									<option value="lo">Lao</option>
									<option value="la">Latin</option>
									<option value="lv">Latvian</option>
									<option value="lt">Lithuanian</option>
									<option value="mk">Macedonian</option>
									<option value="mt">Maltese</option>
									<option value="mi">Maori</option>
									<option value="mr">Marathi</option>
									<option value="mn">Mongolian</option>
									<option value="ne">Nepali</option>
									<option value="no">Norwegian</option>
									<option value="pl">Polish</option>
									<option value="pt">Portuguese</option>
									<option value="ro">Romanian</option>
									<option value="ru">Russian</option>
									<option value="sr">Serbian</option>
									<option value="si">Sinhala</option>
									<option value="sk">Slovak</option>
									<option value="sl">Slovenian</option>
									<option value="es">Spanish</option>
									<option value="su">Sundanese</option>
									<option value="sw">Swahili</option>
									<option value="sv">Swedish</option>
									<option value="tg">Tajik</option>
									<option value="ta">Tamil</option>
									<option value="te">Telugu</option>
									<option value="th">Thai</option>
									<option value="tr">Turkish</option>
									<option value="uk">Ukrainian</option>
									<option value="ur">Urdu</option>
									<option value="uz">Uzbek</option>
									<option value="vi">Vietnamese</option>
									<option value="yo">Yoruba</option>
									<option value="zu">Zulu</option>
								</select>
							</div>
							<div id="progressbar" class="progress hide">
								<div  class="indeterminate"></div>
							</div>	
							<button style="margin-top: 10px;" type="submit"  class="waves-effect waves-light btn orange" id="generateBuilder" name="generateBuilder">Go to Builder</button>						
						</form>
					</div>					
				</div>
				
				
				<div class="divider"></div>
				<div class="row center">
					<div class="col s4">
						<h4><a href="https://github.com/rignaneseleo/Strings.xml-builder-and-translator-PHP" target="_blank"><i class="material-icons">library_books</i> Github</a></h4>
					</div>
					<div class="col s4">
						<h4><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7NFPYFBNAL3AL" target="_blank"><i class="material-icons">favorite</i> Donate</a></h4>
					</div>
					<div class="col s4">						
						<h4><a href="http://forum.xda-developers.com/android/software/webtool-strings-xml-builder-translator-t3371665" target="_blank"><i class="material-icons">forum</i> XDA</a></h4>
					</div>					
				</div>			
			</div>
		</div>
		
		
		<?php include_once("partials/footer.php"); ?>			
		
		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.min.js"></script>
		<script src="js/analytics.js"></script>
		<script>							
			$(document).ready(function() {
				$('select').material_select();	//intialize the select
				
				$('ul.tabs').tabs();//initialize the tabs			
			});		
			
			$('#generateBuilder').click(function() {//intialize the progress bar
				$('#progressbar').removeClass( "hide" );
				setTimeout(function(){$('#progressbar').addClass( "hide" );
				}, 2500);
			});		
		</script>
	</body>
</html>
