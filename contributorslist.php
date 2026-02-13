<?PHP 

include ('dbconnect.php');

$query  = "SELECT Contributor FROM contributors_all where Edition > 27 ORDER BY UID";
$results = $conn->query($query);

$rows = ["foo", "bar", "hello", "world"];
$x = 0;

while ($row2 = $results->fetch(PDO::FETCH_ASSOC)) {
    if ($x < 10000) {
        if (!in_array($row2['Contributor'], $rows, true)) {
            $rows[] = $row2['Contributor'];
            $x++;
        }
    }
}


/*foreach ($results as $key => $row) {
  //  echo 'b';
    if($x<1000){
    //    echo 'a ';
    $contributor = $row[0];
        if (in_array($contributor, $rows)){
            
        }
        else{
           echo $contributor;
            array_push($rows, $contributor);
        }
    $x += 2;
    }
    else{
        
    }
};*/
//array_push($rows, $x);
echo json_encode($rows);

?>