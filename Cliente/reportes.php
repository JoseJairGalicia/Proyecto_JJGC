<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="js/pie.css" rel="stylesheet">
</head>

<body>
    <header>
        <!--encabezado-->
        <?php include_once("include/encabezado.php") ?>
        <!--fin encabezado-->
    </header>

    <!--inicia el cuerpo de  la  página-->
    <div class="container" style="text-align: center;">
        <h2 style="text-align:center;">Reportes de usuarios</h2>
        <div class="row">
            <div class="col">
            <a href="R_usu_pdf.php"> <img src="img/pdf.png" width="150px" height="150px"></a>
            </div>
            <div class="col">
            <a href="R_usu_exc.php"> <img src="img/excel2.png" width="150px" height="150px"></a>
            </div>
            
            <div class="col">
            <a href="R_usu_graf.php"> <img src="img/grafica.jpeg" width="150px" height="150px"></a>
            </div>
        </div>
        <div class="row">
            <h2>Reportes productos </h2>
            <div class="col">
            <a href="R_prod_pdf.php"> <img src="img/pdf.png" width="150px" height="150px"></a>
            </div>
            <div class="col">
            <a href="R_prod_exc.php"> <img src="img/excel2.png" width="150px" height="150px"></a>
            </div>
            
            <div class="col">
            <a href="R_prod_graf.php"> <img src="img/grafica.jpeg" width="150px" height="150px"></a>
            </div>
        </div>
        <div class="row">
            <h2>Reportes categoria </h2>
            <div class="col">
            <a href="R_cat_pdf.php"> <img src="img/pdf.png" width="150px" height="150px"></a>
            </div>
            <div class="col">
            <a href="R_cat_exc.php"> <img src="img/excel2.png" width="150px" height="150px"></a>
            </div>
            
            <div class="col">
            <a href="R_cat_graf.php"> <img src="img/grafica.jpeg" width="150px" height="150px"></a>
            </div>
        </div>
    </div>
       
    <!--termina  cuerpo de  la  pagina-->

    <footer>
        <!-- inicia pie-->
        <?php include_once("include/pie.php") ?>
        <!--fin pie-->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>