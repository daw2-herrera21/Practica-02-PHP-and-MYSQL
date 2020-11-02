<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
$noRegistros = 1;
$pagina = 1; 
if($_GET['pagina'])
    $pagina = $_GET['pagina'];
$buskr=$_GET['searchs'];
    

$sSQL = "SELECT * FROM movie WHERE movie_name LIKE '%$buskr%'LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
	
echo "<table>";
while($row = mysqli_fetch_array($result)) { 
	echo "<tr><td height=80 align=center>";
	echo $row["movie_id"]."<br>";
	echo "</td><td align=center><img src='fotos/$row[movie_id]' width=70 height=70></td><td>$row[movie_name].</td><td align=center>$row[movie_year].</td></tr>";
}


$sSQL = "SELECT count(*) FROM movie WHERE movie_name LIKE '%$buskr%'"; 
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"];

$noPaginas = $totalRegistros/$noRegistros;

?>
<tr>
    <td colspan="2" align="center"><? echo "<strong>Total registros: </strong>".$totalRegistros; ?></td>
    <td colspan="2" align="center"><? echo "<strong>Pagina: </strong>".$pagina; ?></td>
</tr>
<tr bgcolor="white">
    <td colspan="4" align="center"><strong>Pagina:
<?
for($i=1; $i<$noPaginas+1; $i++) {
	if($i == $pagina)
		echo "<font color=red>$i </font>";
	else
		echo "<a href=\"?pagina=".$i."&searchs=".$buskr."\" style=color:#000;> ".$i."</a>";
}
?>
	</strong></td>
</tr>
</table>
