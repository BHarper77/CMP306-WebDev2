<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <title>Formula 1</title>

        <meta charset = 'utf-8'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    </head>

    <body>
    	<?php include "../navbarInclude.php"; ?>
    	<?php
		$xmlFile = file_get_contents("https://www.autosport.com/rss/feed/f1");
		$xml = simplexml_load_string($xmlFile);
		//var_dump($xml);

		//Importing XSL template and transforming XML file into the format
		$xsl = simplexml_load_file("stylesheet.xsl");
		$proc = new XSLTProcessor();
		$proc->importStyleSheet($xsl);
		$result = $proc->transformtoXML($xml);

		echo $result;
		?>
    </body>
</html>