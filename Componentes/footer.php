<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
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
            window.location.href = window.location.href + "?accion=escaneo&nombre=" + respuesta;
        });


   </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>