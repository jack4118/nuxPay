<?php
    
	class General
    {

		function getLanguage()
        {
			if(isset($_SESSION['language'])) {
		        $language = $_SESSION['language'];
		    }
		    else {
		    	if(isset($_COOKIE["language"])) {
		    		$_SESSION['language'] = $_COOKIE['language'];
		    		$_SESSION['languageISO'] = $_COOKIE['languageISO'];
			        $language = $_COOKIE['language'];
		    	}
		    	else {
		    		$_SESSION['language'] = "english";
		    		$_SESSION['languageISO'] = "EN";
			        $language = "english";
			        setcookie("language", "english");
			        setcookie("languageISO", "EN");
		    	}
		    }

		    return $language;
		}
	}

	?>
