<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8" />
		<title>StringsXmlBuilder - RignaneseLeo</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		
		<script src="js/analytics.js"></script>
	</head>
	<body>
		<header>
			<h1 class="text-center" >StringsXmlBuilder</h1>
		</header>
		
		<section>
			<div class="container">
				<div style="padding: 8%;">
					<form method="post" action="goBuilder.php">
						
						<h3 class="text-center">Github Strings.xml URL:</h3>
						<input type="text" class="text-center form-control" value="<?php echo $_GET['url'] ?>" placeholder="Github Strings.xml URL" name="urlStringsXml" />
						
						<h3 class="text-center">Your translaction language:</h3>
						<select class="text-center form-control" name="translationLanguage">
							<option value="ar">Arabic</option>
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
						
						<button style="margin-top: 10px;" type="submit" class="btn btn-lg btn-block btn-primary" name="generateBuilder">Generate Builder</button>
						
					</form>
				</div>
				<div>
					<h2><u>This translator is OPEN SOURCE</u></h2>
					<h3 class="text-center"><b>See</b> and <b>improve</b> the code on <b>GitHub</b></h3>
					<p class="text-center">
						Thanks to <a href="http://www.bacubacu.com/colresizable/" target="_blank">colresizable</a><br />
						Thanks to Stichoza for <a href="https://github.com/Stichoza/google-translate-php" target="_blank">php tranlator library</a>
					</p>
					
				</div>
			</div>
		</section>
		
		<footer>
			<h3 class="text-center">Leonardo Rignanese</h3>
		</footer>
	</body>
</html>
