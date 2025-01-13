 <div id='content'>
  <!--  <div id="navBar">
        <a href="index.php"><div id="home" class="icon" ></div></a>
    <div id="contents" pagenumber="2" class="pageSelect icon fixed" >
        </div> 
    <div id="previous" class="icon" ></div> 
    <div id="next" class="icon" ></div> 
    <div id="zoomOut" class="icon" ></div> 
    <div id="zoomIn" class="icon" ></div> 
    </div>   -->
<div id="flipbookContainer">
 
<div id="flipbook">
    
    <?PHP
    
    $author = $_SESSION["author"];
    
    $cover1 = '<div id="author_cover"><p>The complete works of </p><h1>'.$author.'</h1></div>';
    $cover2 = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20Cover%202.jpg';
 
    //front cover
    echo '<div class="hard">'.$cover1.'</div>';
        
    include ('dbconnect.php');
    
    $query = 'select * from contributors_all where Contributor = "'.$author.'"';
    $result = $db->query($query);
    $query2 = 'select * from mag_pages';
    $result2 = $db->query($query2);
    $magpages = array();
        
    foreach ($result2 as $header => $data){
        $magpages[$data[mag]]  = $data[magpages];    
    }
    
  foreach ($result as $key => $row) {
      $thiscover = 'hd'.$row[Edition].'/HD%20'.$row[Edition].'%20Cover%201.jpg';
    echo '<div><img class="pageimage fixed" src="'.$thiscover.'"/></div>';
      $x=1;
      while($x<9){
          $column = "26_".$x;
          if($row[$column]>1){
              if ($row[$column] == $magpages[$row[Edition]]){
      $thiscover = 'hd'.$row[Edition].'/HD%20'.$row[Edition].'%20Cover%202.jpg';
    echo '<div><img class="pageimage fixed" src="'.$thiscover.'"/></div>';
              }
              else{
              $thispage = 'hd'.$row[Edition].'/HD%20'.$row[Edition].'%20p%20'.$row[$column].'.jpg';
  //  echo '<div><p>Chapter'.$row[Edition].'</p>  '.$x.'</div>';
              echo '<div><img class="pageimage fixed" src="'.$thispage.'"/></div>';}
          }
          $x += 1;
      }
    };
    
    
    echo '<div class="hard"></div>';
   ?>
    

</div> 
    </div>
</div>