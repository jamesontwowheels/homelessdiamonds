
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
    <script src="js/jquery.min.1.7.js"></script>
    <script src="js/turn.js"></script>
    <script src="js/script.js"></script>

<body>

<div id='phptestzone'>

    <?PHP
include 'dbconnect.php';

$thismag = 'magazine_2015_1';

$_SESSION["thismagnumber"] = 27;

$thismagnumber = $_SESSION["thismagnumber"];



?>
    
</div>

    <div id='content'>
    <div id="navBar">
        <a href="index.php"><div id="home" class="icon" ></div></a>
    <div id="contents" pagenumber="2" class="pageSelect icon fixed" >
        </div> 
    <div id="previous" class="icon" ></div> 
    <div id="next" class="icon" ></div> 
    <div id="zoomOut" class="icon" ></div> 
    <div id="zoomIn" class="icon" ></div> 
    </div>   
<div id="flipbookContainer">
 
<div id="flipbook">
    
    <?PHP
    $cover1 = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20Cover%201.jpg';
    $cover2 = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20Cover%202.jpg';
    echo '<div class="hard"><img class="pageimage fixed" src="'.$cover1.'"/></div>';

    echo  '<div class="contents"><div class="contributors">';
    
    ?>
    
    <h3>Contributors</h3>
    
    <?PHP

echo '<table>';
        $query = 'select magpages from mag_pages where mag = '.$thismagnumber;
        $query2 = 'select * from contributors_all where edition = '.$thismagnumber.' and 26_1 > 0';
        $query3 = 'select * from contributors_all where edition = '.$thismagnumber.' and 26_1 > 0';
        $count = 0;
$result = $db->query($query2);
$result3 = $db->query($query3);
$result2 = $db->query($query);
while ($row2 = $result2->fetch_assoc()){
    $thismagpages = $row2['magpages'] + 1;
};
    $author_count = 0;
while ($counter = $result3->fetch_assoc()) {   
    $author_count += 1;
}   
$author_count = $author_count - ( $author_count % 4) + 4;
    $author_track = 0;
while ($row = $result->fetch_assoc()) {
        $author_track += 1;
        if ($count == 0){ 
            echo '<tr>';
            $count = 1;}
        else {$count = 0;}
        echo '<td class="contributorName">'.$row['Contributor'].'</td>';
        echo '<td class="contributorPages">';
    foreach (range(1,10) as $number){
        $pagenumber = '26_'.$number;
        if($row[$pagenumber] > 0){
         $displaypagenumber = $row[$pagenumber]+2;
         echo '<div class="pageSelect" pagenumber="'.$displaypagenumber.'"> '.$row[$pagenumber].' </div>';   
            }
        }
        echo '</td>';
        if ($count == 0){ 
            echo '</tr>';
            }

    if($author_track == $author_count/2){
        echo '</table>';

    echo '</div></div>';
    
    echo '<div class="contents"><div class="contributors"><table>';
    }

}
echo '</table></div></div>';
    foreach(range(2,$thismagpages-2) as $x){
        $thispage = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20p%20'.$x.'.jpg';
     echo '<div ';
        if($x==$thismagpages-2){
            echo 'class="hard"';
        };
    echo '><img class="pageimage fixed" src="'.$thispage.'"/></div>';   
    }
    echo '<div class="hard"><img class="pageimage fixed" src="'.$cover2.'"/></div>';
    ?>
    

</div> 
    </div>
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