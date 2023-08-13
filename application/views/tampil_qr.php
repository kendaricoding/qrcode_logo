<?php 
    $tempdir = "temp/";

    if (!file_exists($tempdir))
    mkdir($tempdir);

    // ambil_logo
    $logopath ="http://bctemas.beacukai.go.id/wp-content/uploads/2021/07/LOGO_BEA_CUKAI.png";

    //Isi Qr code jika scan
    $dataqr = "http://kendaricoding.id/";
    $codeContents = $dataqr;

    // Simpan file Qrcode
    QRcode::png($codeContents, $tempdir.'qrwithlogo.png',QR_ECLEVEL_H, 18);

    //ambil  file Qrcode
    $QR = imagecreatefrompng($tempdir.'qrwithlogo.png');

    //memulai menggambar
    $logo = imagecreatefromstring(file_get_contents($logopath));

    $transparent = imagecolortransparent($logo, imagecolorallocatealpha($logo, 0, 0, 0, 127));
    imagefill($logo, 0 , 0, $transparent);
    imagealphablending($logo, false);
    imagesavealpha($logo, true);

    $QR_width = imagesx ($QR);
    $QR_height = imagesy ($QR);

    $logo_width = imagesx ($logo);
    $logo_height = imagesy ($logo);

    //Scale logo 
    $logo_qr_width = $QR_width/3;
    $scale = $logo_width / $logo_qr_width;
    $logo_qr_height = $logo_height/$scale;

    imagecopyresampled($QR, $logo, $QR_width/2.9, $QR_height/2.9, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

    // Simpan kode QR lagi
    imagepng ($QR, $tempdir.'qrwithlogo.png');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Aplikasi QR Code with Image</title>
  </head>
  <body>
    <div class="mt-3">
        <h1><center>My QR CODE</center></h1>

        <center><img src="<?php echo base_url(); ?>temp/qrwithlogo.png" alt="" width="100" height="100"></center>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>