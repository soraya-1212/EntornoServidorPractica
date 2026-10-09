<?php
//$nombre=$_POST['nombre'];
//$edad=$_POST['edad'];
//$correo=$_POST['correo'];
//
//$dias=$_POST['dias'];
//$pase=$_POST['pase'];
//?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GetaFest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
    <h2>👻Reserva tu pase</h2>
    <form method="post" enctype="multipart/form-data" action="procesar.php">
        <div class="form-group">
            <label for="nombre"> Nombre completo: </label>
            <input type="text" name="nombre" required placeholder="Ej. Soraya">

        </div>

        <div class="form-group">
            <label for="coreo"> Correo electrónico: </label>
            <input type="text" name="correo" required placeholder="Ej. swhuhxw@gmail.com">

        </div>

        <div class="form-group">
            <label for="edad"> Edad : </label>
            <input type="text" name="edad" required placeholder="Ej. 18">

        </div>

        <div class="form-group">
            <label for="pase">Tipo de Pase</label>
            <label><input type="radio" name="pase" value="General">General(50€)</label>
            <label><input type="radio" name="pase" value="VIP">VIP(120€)</label>
            <label><input type="radio" name="pase" value="SUPER">Super VIP + Camping(180€)</label>
        </div>

        <div class="form-group">
            <label for="dias">Días de asistencia (+10 € por día): </label>
            <label><input type="checkbox" name="dias[]" value="Viernes">Viernes</label>
            <label><input type="checkbox" name="dias[]" value="Sabado">Sábado</label>
            <label><input type="checkbox" name="dias[]" value="Domingo">Domingo</label>
        </div>

        <div class="form-group">
            <label for="pago">Tipo de Pago</label>
            <label><input type="radio" name="pago" value="Bizum">Bizum</label>
            <label><input type="radio" name="pago" value="Credit card">Credit card</label>
            <label><input type="radio" name="pago" value="Transferencia">Transferencia</label>
        </div>

        <div class="foto">
            <label for="foto">SELECIONA TU FOTO</label>
            <input type="file" id="foto" name="foto">
        </div>

        <input type="submit" class="btn" name="enviar" value="Crear ficha"></input>
    </form>

</div>
