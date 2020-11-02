<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

    
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = 'INSERT INTO movie
        (movie_id, movie_name, movie_type, movie_year, movie_leadactor,
        movie_director)
    VALUES
        (4, "A Quiet Place", 9, 2018, 7, 7),
        (5, "A Million Ways to Die in the West", 10, 2014, 8, 8),
        (6, "Solo", 11, 2018, 9, 10)';
        
mysqli_query($db,$query) or die(mysqli_error($db));

$query = 'INSERT INTO movietype 
        (movietype_id, movietype_label)
    VALUES 
        (9, "Thriller"),
        (10, "Western"),
        (11, "Drama")';
mysqli_query($db,$query) or die(mysqli_error($db));

$query  = 'INSERT INTO people
        (people_id, people_fullname, people_isactor, people_isdirector)
    VALUES
        (7, "John Krasinski", 1, 1),
        (8, "Seth MacFarlane", 1, 1),
        (9, "Santiago Lallana", 1, 0),
        (10, "Ron Howard", 0, 1)';

mysqli_query($db,$query) or die(mysqli_error($db));



?>
