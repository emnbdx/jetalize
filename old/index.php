<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jet Alizé réalise votre sortie Jet Ski sur mesure à La Palmyre</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="icon" type="image/x-ico" href="images/favicon.ico" /> 
<meta name="description" content=" Jet Alizé, à La Palmyre vous propose location et Randonnées sans permis en Jet Ski. Nous réalisons des sorties sur mesure pour séminaire, ce, groupe, anniversaire... ">
<meta name="keywords" content="randonnée, jet ski, sans permis, location, sensation, photo, activités, séminaire, groupe, activité, la palmyre, royan, mer, idée ">


<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="jquery.fancybox-1.3.4/jquery.fancybox-1.3.4.css" media="screen" />

<script src="script/jquery.js" type="text/javascript"></script> 
<script type="text/javascript" src="jquery.fancybox-1.3.4/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript">
$(document).ready(function() {
		$('map > area.fancybox').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			var title = $(this).attr('title');
			var type = 'image';
			$.fancybox({
				'title': title,
				'titlePosition': 'inside',
				'href' : url,
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'type' : type
			});
	});
});


</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28588830-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
<?php include('fonction.php'); ?>


<div id="top_header"></div>
	<div id="superglobal">	
    	<div id="global">
   			<div id="header"><?php include('header.php'); ?></div>
        	<div id="nav_bar"><?php include('navigation.php'); ?></div>
            <div id="container">
            <?php 
            if (isset($_GET['p'])) {
                switch($_GET['p']) {
                    case 1:
                    include('pages/accueil.php');
                    break;
                    
                    case 2:
                    include('pages/randonne.php');
                    break;
                    
                    case 3:
                    include('pages/location.php');
                    break;
                    
                    case 4:
                    include('pages/seminaire.php');
                    break;
                    
                    case 5:
                    include('pages/insolites.php');
                    break;
                    
                    case 6:
                    include('pages/contact.php');
                    break;
                    
                
                    
                    default :
                    include('pages/accueil.php');
                }
            }
            else { include('pages/accueil.php'); }
            ?>
            </div>
			<div class="clearfooter"></div>
    	</div>
	</div>
    

<?php
	if (isset($_GET['p'])) {
		switch($_GET['p']) {
			case 2:
			break;
			default :
			echo ' <div id="pied">'; include('pied.php'); echo '</div>';
		}
	}
	else { echo ' <div id="pied">'; include('pied.php'); echo '</div>'; }
?>
    
   
</body>
</html>