<?php
//copy('https://m.media-amazon.com/images/M/MV5BZGViM2E0MjktZTdlNy00Y2M0LThlN2UtZThkZGNlMWIyMmY1XkEyXkFqcGdeQXVyNjQ2MjQ5NzM@._V1_SX300.jpg','posters/123.jpg');
$r='https://m.media-amazon.com/images/M/MV5BZGViM2E0MjktZTdlNy00Y2M0LThlN2UtZThkZGNlMWIyMmY1XkEyXkFqcGdeQXVyNjQ2MjQ5NzM@._V1_SX300.jpg';
$id=675;
$ext=end(explode('.',$r));
copy($r,'posters/'.$id.'.'.$ext);

?>