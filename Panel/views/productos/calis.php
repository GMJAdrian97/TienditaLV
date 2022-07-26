<!DOCTYPE html>
<html>
<head>
	<title>JQuery HTML5 QR Code Scanner</title>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
   <div class="container-fluid">
    <div class="row justify-content-center aling-items-center vh-100">
      <h1 style ="text-align: center;">Como Escanear QR </h1>
      <div class="col-lg-9">
        <video id="previsualizacion" class= "p-1 border" style="width: 100%;"> </video></video>
      </div>
    </div>
   </div>
   <script type="text/javascript" >

        var sonido = new Audio("pip.wav");

        var scanner = new Instascan.Scanner({
            video: document.getElementById('previsualizacion'),
            sacanPeriod: 5,
            mirror: false
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if(cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('no se han encotrado camaras');
                alert('Camaras no encotradas');
            }
        }).catch(function(e) {
            console.error(e);
            alert("error:" + e);
        });

        scanner.addListener('scan', function(respuesta) {
            sonido.play();
            console.log("Contenido: " + respuesta);
        });

   </script>
   
</body>
</html>

