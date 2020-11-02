<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));


$query = 'SELECT 
        movie_name,movietype_label,p.people_fullname AS "actor",p1.people_fullname as "director"
    FROM
        people p,movie m,movietype mt,people p1
    WHERE
        (p.people_id=m.movie_leadactor and mt.movietype_id=m.movie_type) and (p1.people_id=m.movie_director)';
    
$result = mysqli_query($db,$query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	echo $movie_name .' - '. $movietype_label.' -actor principal: '. $actor . ' -director: '. $director .' <br/>';
}
?>
