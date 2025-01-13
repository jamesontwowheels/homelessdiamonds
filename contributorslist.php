<?PHP 

include ('dbconnect.php');

$query  = "SELECT Contributor FROM contributors_all ORDER by UID";
$results = $db->query($query);

$rows = array("foo", "bar", "hello", "world");
$x = 0;
//$rows = ['one','two'];
//echo 'c';

while ($row2 = $results->fetch_assoc()){
    if($x<1000){
        if (in_array($row2[Contributor], $rows)){
        }
        else{
    $rows[] = $row2[Contributor];
    $x += 1;
        }
    }
};

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