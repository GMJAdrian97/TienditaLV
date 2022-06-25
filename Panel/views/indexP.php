<?php
    include("../../Componentes/header.php");
    require_once('./Porductos/mdlProducto.php');
    $datosProducto = $producto -> read();
?>


<!-- Carrucel -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../../Images/C1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../../Images/C2.jfif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../../Images/C3.jfif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Carrucel -->

<!-- prodcutos en cards -->

<div class="container-flex">
    <?php foreach ($datosProducto as $key => $producto): ?>
        <div class="shop-card" >
            <div class="title">
                <?php echo $producto['nombre']?>
            </div>
            <div class="desc">
            <?php echo $producto['descripcion']?>
            </div>
            <div class="slider">
                <figure id="fig" data-color="#E24938, #A30F22">
                    <img src="http://www.supah.it/dribbble/012/1.jpg" />
                </figure>
            </div>

            <div class="cta">
                <div class="price">$<?php echo $producto['precio']?></div>
                <button id="btnCompra" class="btn">Add to cart<span class="bg"></span></button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
    include("../../Componentes/footer.php")
?>