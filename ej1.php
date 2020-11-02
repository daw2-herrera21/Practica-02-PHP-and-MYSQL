<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = 'ALTER TABLE movie ADD 
CONSTRAINT movie_type 
FOREIGN KEY(movie_type)
REFERENCES movietype(movietype_id)';

$result = mysqli_query($db,$query) or die(mysqli_error($db));
    
?>
