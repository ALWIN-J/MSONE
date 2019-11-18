<script>
function get()
{
	var t=document.getElementById('t').value;
	var request = new XMLHttpRequest()

request.open('GET', 'http://www.omdbapi.com/?i=tt3896198&apikey=36a1398d', true)
request.onload = function() {
  // Begin accessing JSON data here

  if (request.status >= 200 && request.status < 400) 
  {

  var data = JSON.parse(this.response)
    alert(data['Year']);
  } 
  else 
  {
    console.log('error')
  }
}

request.send()
}
</script>
<form method=post>
<input id=t name=t><br>
<input type=submit name=sub>
</form>
<?php
if(isset($_REQUEST['t']))
{
$t=$_REQUEST['t'];
echo insert($t);
}
function insert($t)
{
include("config.php");
$tb=$con->query("select * from film where Title='".$t."'");
if(!mysqli_fetch_array($tb))
{

$ti=str_replace(" ","%20",$t);
$response = file_get_contents('http://www.omdbapi.com/?t='.$ti.'&apikey=36a1398d&plot=full');
$response=str_replace("'","''",$response);
$response = json_decode($response);
//$response->Title;
if($response->Response=="True")
{
$con->query("INSERT INTO `film` (`_id`, `Title`, `Year`, `Rated`, `Production`, `Released`, `Runtime`, `Genre`, `Director`, `ImdbVote`, `Writer`, `Actors`, `Languages`, `Country`, `Awards`, `Ratings`, `Imdbid`, `Boxoffice`) VALUES (null, '".$response->Title."', '".$response->Year."', '".$response->Rated."', '".$response->Production."', '".$response->Released."', '".$response->Runtime."', '".$response->Genre."', '".$response->Director."', '".$response->imdbVotes."', '".$response->Writer."', '".$response->Actors."', '".$response->Language."', '".$response->Country."', '".$response->Awards."', '".$response->Ratings[0]->Value."', '".$response->imdbID."', '".$response->BoxOffice."');");
  
$tb=$con->query("select * from film where Title='".$t."'");
$r=mysqli_fetch_array($tb);
$id=$r['_id'];
//echo $id;
$f=fopen("plot/en/".$id.".txt","w");
fwrite($f,$response->Plot);
fclose($f);
$ext=end(explode('.',$response->Poster));
copy($response->Poster,'posters/'.$id.'.'.$ext);
return 1;
// succsessfully inserted
}
else
{
	return -1; // no such movie
}
}
else
{
	return 0; // already exists
}
}
?>