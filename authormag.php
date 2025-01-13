
<?PHP session_start(); ?>

<!DOCTYPE html>
<meta charset="ISO-8859-1">
	<title>Turn</title>

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<link rel="stylesheet" href="main.css">
<!-- online only 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

<!-- offline only -->
<!--    <link rel="stylesheet" href="jquery/jqueryui.css"> -->
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="js/jquery.min.1.7.js"></script> -->
    <script src="magic.js"></script>
    <script src="js/turn.js"></script>
    <script src="js/script.js"></script>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81362060-1', 'auto');
  ga('send', 'pageview');

</script>

<body>
    
<?PHP 
    include 'navtemplate.html';
    ?>
    
    
<div id='phptestzone'>
<section id="about" class="three">
						<div class="container">
    <?PHP
include 'dbconnect.php';
$author_get =$_GET['author']; 
$author = str_replace("_", " ", $author_get);
$author_underscore = str_replace(" ", "_", $author_get);

    
$_SESSION["author"] = $author;

    $query1 = 'select * from contributors_all where Contributor = "'.$author.'"';
    $result1 = $db->query($query1);
    $count = 0;
    foreach($result1 as $key => $row){
        $count += 1;
                            }
    if ($count>0){                        
echo '<h2 id="author_title">'.$author."'s anthology</h2>";

$tweet_text = "look%20at%20".$author."'s%20work:%20http://homelessdiamonds.org/authormag.php?name=".$author_underscore;                            
                            
?>
                   
<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=<?PHP echo $tweet_text;?>">
<i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
</div>

  <?PHP
    include 'authormagtemplate.php';
    }
        else{
            echo '<div id="author_sorry"><h2>Sorry, we could not find any articles by '.$author.' please try another search...</h2>';
            echo '	<div id="authors" class="three"> 
                        <div class="ui-widget">
                          <label for="tags">Contributors: </label>
                          <input id="tags">
                        </div>
    <button id="goto_contribute">Search</button>
						</div>
					</div>';
        }
    ?>
    </section>
    </div>
 <!--   <script>
        $(window).ready(function() {
    $("#flipbook").turn({
    autoCenter: true,
        display: 'double',
        acceleration: true,
        });
        });
    
        $("#flipbook").bind('turned',function(){
                  $( ".pageSelect" ).click(function() {
            var pagenumber = this.getAttribute('pagenumber');
            $("#flipbook").turn('page',pagenumber);  
        })
                            
        });
        //
        $( "#previous" ).click(function() {
            $("#flipbook").turn('previous');
});
          $( "#next" ).click(function() {
            $("#flipbook").turn('next');
});
   
        $( ".pageSelect" ).click(function() {
            var pagenumber = this.getAttribute('pagenumber');
            $("#flipbook").turn('page',pagenumber);
});
        
        $("#zoomOut").click(function() {
            var newZoom = $('#flipbook').turn('zoom')-0.1;
          $('#flipbook').turn('zoom', newZoom,800);  
        })
         $("#zoomIn").click(function() {
            
            var newZoom = $('#flipbook').turn('zoom')+0.1;
          $('#flipbook').turn('zoom', newZoom,800);  
        })
          
        $(window).bind('keydown', function(e){
            if (e.keyCode==37)
                $('#flipbook').turn('previous');
            else if (e.keyCode==39)
                $('#flipbook').turn('next');
        });
    </script> -->
     
</body>
    
</html>