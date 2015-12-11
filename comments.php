<?php

require("config.inc.php");

//initial query
$query = "Select * FROM comments";

$query_params = array(
        
    );

//execute query
try {
    $stmt   = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    die(json_encode($response));
}

?>


<html>
<body>

	<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>Title</th>
			<th>Message</th>

		</tr>
	</thead>
	<tbody>
	<?php

// Finally, we can retrieve all of the found rows into an array using fetchAll 
$rows = $stmt->fetchAll();

if ($rows) {
    $response["success"] = 1;
    $response["message"] = "Post Available!";
    $response["posts"]   = array();
    
    foreach ($rows as $row) {
        $post             = array();
		$post["post_id"]  = $row["post_id"];
        $post["username"] = $row["username"];
        $post["title"]    = $row["title"];
        $post["message"]  = $row["message"];
        
		echo
		"<tr>
          <td>{$row['username']}</td>
          <td>{$row['title']}</td>
		  <td>{$row['message']}</td>
        </tr>";
	
        //update our repsonse JSON data
        array_push($response["posts"], $post);
    }
    
    // echoing JSON response
    //echo json_encode($response);
    
    
} else {
    $response["success"] = 0;
    $response["message"] = "No Post Available!";
    die(json_encode($response));
}

?>

        
       
  
        </tbody>
    </table>


</body>
</html>
