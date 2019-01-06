<?PHP
  // Adapted for The Art of Web: www.the-art-of-web.com
  // Please acknowledge use of this code by including this header.

  // initialise image with dimensions of 120 x 30 pixels
  $image = @imagecreatetruecolor(120, 30) or die("Cannot Initialize new GD image stream");

 // set background and allocate drawing colours
 $background = imagecolorallocate($image, 0x00, 0x99, 0xFF);
 imagefill($image, 0, 0, $background);
 $linecolor = imagecolorallocate($image, 0x00, 0xCC, 0xFF);
 $textcolor1 = imagecolorallocate($image, 0x00, 0x00, 0x00);
 $textcolor2 = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);

  // draw random lines on canvas
  for($i=0; $i < 6; $i++) {
    imagesetthickness($image, rand(1,3));
    imageline($image, 0, rand(0,30), 120, rand(0,30), $linecolor);
  }

   // using a mixture of system and GDF fonts

  session_start();

    // using a mixture of TTF fonts
    // $fonts = [];
    // $fonts[] = "dejavu/DejaVuSerif-Bold.ttf";
    // $fonts[] = "dejavu/DejaVuSans-Bold.ttf";
    // $fonts[] = "dejavu/DejaVuSansMono-Bold.ttf";

  // add random digits to canvas
  $digit = '';
  for($x = 15; $x <= 95; $x += 20) {
    $textcolor = (rand() % 2) ? $textcolor1 : $textcolor2;
    $digit .= ($num = rand(0, 9));
    imagechar($image, rand(3, 5), $x, rand(2, 14), $num, $textcolor);
    //imagettftext($image, 20, rand(-30,30), $x, rand(20, 42), $textcolor, $fonts[array_rand($fonts)], $num);
  }

  // record digits in session variable
  $_SESSION['digit'] = $digit;

  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);
?>