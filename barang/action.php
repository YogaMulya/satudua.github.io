<?php

  if(!empty($_POST["nama_barang"])){

    /* RE-ESTABLISH YOUR CONNECTION */
    $con = new mysqli("localhost", "root", "", "its");

    /* CHECK CONNECTION */
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }

    /* PREPARE YOUR QUERY */
    $stmt = $con->prepare("SELECT jumlah FROM barang WHERE id_barang = ?");
    $stmt->bind_param("i", $_POST["id_barang"]); /* PARAMETIZE THIS VARIABLE TO YOUR QUERY */
    $stmt->execute(); /* EXECUTE QUERY */
    $stmt->bind_result($biaya); /* BIND THE RESULTS TO THESE VARIABLES */
    $stmt->fetch(); /* FETCH THE RESULTS */
    $stmt->close(); /* CLOSE THE PREPARED STATEMENT */

    /* RETURN THIS DATA TO THE MAIN FILE */
    echo json_encode(array("jumlah" => $jumlah));

  } /* END OF IF NOT EMPTY loadnumber */

?>
