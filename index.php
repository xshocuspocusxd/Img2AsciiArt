<?php

$url = 'image.jpg';
$image = htmlspecialchars(trim($url));
$img = imagecreatefromjpeg($image);
$width  = imagesx($img);
$height = imagesy($img);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Img2AsciiArt</title>
  <link rel="stylesheet" href="styl.css" type="text/css" />
</head>
<p class="text">
  <?php

  $x = 0;
  $y = 0;
  $n = 0;

  while(($n<$width) AND ($y<$height))
  {


    $colorindex = imagecolorat($img,$x,$y);
    $colorrgb = imagecolorsforindex($img,$colorindex);
    $R = $colorrgb['red'];
    $G = $colorrgb['green'];
    $B = $colorrgb['blue'];

    $i = $R+$G+$B;

    if(($i > 0) AND  ($i <= 64)) { $i2 = "#"; }
    if(($i > 65) AND ($i <= 128)) { $i2 = "%"; }
    if(($i > 129) AND ($i <= 192)) { $i2 = "f"; }
    if(($i > 193) AND ($i <= 256)) { $i2 = "h"; }
    if(($i > 257) AND ($i <= 320)) { $i2 = "j"; }
    if(($i > 321) AND ($i <= 384)) { $i2 = "l"; }
    if(($i > 385) AND ($i <= 448)) { $i2 = "n"; }
    if(($i > 449) AND ($i <= 512)) { $i2 = "p"; }
    if(($i > 513) AND ($i <= 576)) { $i2 = "s"; }
    if(($i > 577) AND ($i <= 640)) { $i2 = "-"; }
    if(($i > 641) AND ($i <= 704)) { $i2 = ","; }
    if(($i > 705) AND ($i <= 768)) { $i2 = "."; }

    echo $i2;

    $n++;
    $x++;

    if($n == $width) {
      $n = 0;
      $y++;
      $x = 0;
      echo "<br>";
    }

  }

  ?></p>
</body>
</html>
