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
    
    $cover1 = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20Cover%201.jpg';
    $cover2 = 'hd'.$_SESSION["thismagnumber"].'/HD%20'.$_SESSION["thismagnumber"].'%20Cover%202.jpg';
    echo '<div class="hard"><img class="pageimage fixed" src="'.$cover1.'"/></div>';
    echo  '<div class="contents"><div class="contributors">';
    
    ?>
    
    <h3>Contributors</h3>
    


    <?PHP
echo $debug_log["db"];
echo '<table>';
   //     $query = 'select magpages from mag_pages where mag = '.$thismagnumber;
        $query2 = "SELECT * from contributors_all where edition = :thismagnumber";
        $query3 = "SELECT * from contributors_all where edition = :thismagnumber";
        $count = 0;
 $result = $conn->prepare($query2);
 $result3 = $conn->prepare($query3);
// $result2 = $db->query($query);
/* while ($row2 = $result2->fetch_assoc()){
    $thismagpages = $row2['magpages'] + 1;
}; */

/*    $query = "SELECT magpages FROM mag_pages WHERE mag = :thismagnumber";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':thismagnumber', $thismagnumber, PDO::PARAM_INT);
    echo $query;
    echo $thismagnumber;
    $stmt->execute();
    echo $query;
    while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $thismagpages = $row2['magpages'] + 1;
        echo $thismagpages;
    }*/

    $query = "SELECT magpages FROM mag_pages WHERE mag = :thismagnumber";
$stmt = $conn->prepare($query);

if (!isset($thismagnumber) || !is_numeric($thismagnumber)) {
    die("Error: `\$thismagnumber` is missing or invalid.");
}
$result->bindValue(':thismagnumber', (int)$thismagnumber, PDO::PARAM_INT);
$result3->bindValue(':thismagnumber', (int)$thismagnumber, PDO::PARAM_INT);
$stmt->bindValue(':thismagnumber', (int)$thismagnumber, PDO::PARAM_INT);

echo "Executing: SELECT magpages FROM mag_pages WHERE mag = " . $thismagnumber . "<br>";

if (!$stmt->execute()) {
    die(print_r($stmt->errorInfo(), true));
}
if (!$result->execute()) {
    die(print_r($result->errorInfo(), true));
}
if (!$result3->execute()) {
    die(print_r($result3->errorInfo(), true));
}

$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row2) {
    die("No records found.");
}

$thismagpages = $row2['magpages'] + 1;
echo "Pages: " . $thismagpages;


    $author_count = 0;
while ($counter = $result3->fetch(PDO::FETCH_ASSOC)) { 
    echo " x ";  
    $author_count += 1;
}   
echo "author_count: " + $author_count;
$author_count = $author_count - ( $author_count % 4) + 4;
    $author_track = 0;
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
         echo '<div class="pageSelect pageSelectStyle" pagenumber="'.$displaypagenumber.'"> '.$row[$pagenumber].' </div>';   
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