
<?PHP session_start(); ?>

<!DOCTYPE html>
<meta charset="ISO-8859-1">
	<title>Turn</title>

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
echo 'hello world';

$thismag = 'magazine_2015_1';

$_SESSION["thismagnumber"] = 24;

$thismagnumber = 24;
$thismagpages = 28;



?>
    
</div>

    <div id='content'>
    <div id="navBar">
        <a href="index.html"><div id="home" class="icon" ></div></a>
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

    echo  '<div class="hard contents">';
    
        $query = 'select * from '.$thismag;
$result = $db->query($query);
while ($row = $result->fetch_assoc()) {
        echo $row['Author'];
    foreach (range(1,$thismagpages) as $number){
        $pagenumber = 'page'.$number;
        if($row[$pagenumber] == 1){
         echo '<div class="pageSelect" pagenumber="'.$number.'"> '.$number.' </div>';   
            }
        }
    }
    echo '</div>';
    foreach(range(2,$thismagpages+1) as $x){
        $thispage = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20p%20'.$x.'.jpg';
     echo '<div><img class="pageimage fixed" src="'.$thispage.'"/></div>';   
    }
    echo '<div class="hard">x</div>';
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