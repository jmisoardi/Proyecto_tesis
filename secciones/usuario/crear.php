<?php include("../../templates/header.php");?>

<br>
<br>
<style> 
    h1 {
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h1>Creación de Usuario</h1> 

<div class="card">
    <div class="card-header" style="background-color:bisque" >Ingrese los datos para el registro</div>
    
    <div class="card-body">
        
        <form action="" method="post" enctype="multipart/form-data" style="background-color:azure">
            <div class="mb-3">
                <label for="usuario" class="form-label"><u>Nombre del Usuario:</u></label>
                <input
                    type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder=""/>                    
            </div>

            <div class="mb-3"> 
                <label for="password" class="form-label"><u>Password:</u></label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" />
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label"><u>Email:</u></label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder=""/>
            </div>
            


            <button type="Submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a >
        </form>
    </div>
    
    <div class="card-footer text-muted" style="background-color:bisque"></div>
</div>


<?php include("../../templates/footer.php");?>