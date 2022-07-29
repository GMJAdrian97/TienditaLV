<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/TienditaLV/CSS/styleAdmin.css">
    <link rel="stylesheet" href="/TienditaLV/CSS/styleFormProd.css">
    <title>Tiendita LV</title>
</head>

<body>
<nav class="menu">
  <input id ="menu__toggle" type="checkbox" class='menu__toggle'/>
  <label for="menu__toggle" class="menu__toggle-label">
    <svg preserveAspectRatio='xMinYMin' viewBox='0 0 24 24'>
      <path d='M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z' />
    </svg>
    <svg preserveAspectRatio='xMinYMin' viewBox='0 0 24 24'>
      <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
    </svg>
  </label>
  <ol class='menu__content'>
    <li class="menu-item"><a href="../admin/home.php">Home</a></li>
    <li class="menu-item"><a href="../puntoVenta/ctrlPV.php">Punto de venta</a></li>
    <li class="menu-item">
      <a>Productos</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="../productos/ctrlProducto.php">Lista de productos</a></li>
        <li class="menu-item"><a href="../proveedor/ctrlProveedor.php">Lista de proveedores</a></li>
        <li class="menu-item"><a href="../marca/ctrlMarca.php">Lista de marcas</a></li>
        <li class="menu-item"><a href="../categoria/ctrlCategoria.php">Lista de categoria</a></li>
      </ol>
    </li>
    <li class="menu-item">
      <a>Usuarios</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="../usuario/ctrlUsuario.php">Usuarios</a></li>
        <li class="menu-item"><a href="../roles/ctrlRoles.php">Roles</a></li>
      </ol>
    </li>
    <li class="menu-item"><a href="#0">Contact</a></li>
  </ol>
</nav>
<br/>
<br/>