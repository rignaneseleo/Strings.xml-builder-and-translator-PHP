# Strings.xml Builder & Translator
## Tool written in PHP

### Allow **everyone** to translate easly your strings.xml !

## Features:
- All strings are already translated (with google translate API), **you just have to make sure they are correct**
- Possibility to translate starting from already translated file (useful to **update translation**)
- Minimal and Material design
- It doesn't translate the strings with the attribute `translatable="false"`
- The apostrophes are written with the \ before
- The output contains only translated strings in the same order of the input


## [LET S TRY StringsXmlBuilder](http://stringsxmlbuilder.netsons.org) !


/////////////////////////////////////////////////////////////////////////////////////////// * \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


## INSTRUCTIONS:
### How to get the Strings.xml url:
- Go to the project on github
- Get the strings.xml english file
- Click ROW
- Copy and paste the page url in the StringsXmlBuilder form and choose the translation language


/////////////////////////////////////////////////////////////////////////////////////////// * \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


## CREATE YOUR OWN LINK:
You can easly create your app link and share it to allow everyone to simply translate your app.
### To allow to choose the language:
`http://stringsxmlbuilder.netsons.org/index.php?originalXmlURL=`**XML_LINK**

### To allow to update the translation choosing the language:
`http://stringsxmlbuilder.netsons.org/index.php?originalXmlURL=`**Original_XML_LINK**`&translatedXmlURL=`**Old_XML_LINK** 

### To translate directly:
#### For a generic language (with all empty):

`http://stringsxmlbuilder.netsons.org/builder.php?originalXmlURL=`**XML_LINK** 

#### For a specific language:

`http://stringsxmlbuilder.netsons.org/builder.php?originalXmlURL=`**XML_LINK**`&translationLang=` **TRANSLATION_LANGUAGE**

### Supported language: [GOOGLE APIs](https://cloud.google.com/translate/v2/translate-reference#supported_languages) 

## Credits
Thanks to [colresizable](http://www.bacubacu.com/colresizable/)

Thanks to Stichoza for [php tranlator library] (https://github.com/Stichoza/google-translate-php)
