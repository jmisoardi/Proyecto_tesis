<?php include("../../templates/header.php");?>
<br>
<br>
<style> 
    h1 {
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h1>Asignación de Roles</h1> 



<div class="card">
    <div class="card-header" style="background-color:bisque" >Ingrese los datos para el registro</div>
    
    <div class="card-body">
        
        <form action="" method="post" enctype="multipart/form-data" style="background-color:azure">
            <div class="mb-3">
                <label for="" class="form-label"><u>Nombre del Rol:</u></label>
                <input
                    type="text" class="form-control" name="nombredelrol" id="nombredelrol" aria-describedby="helpId" placeholder=""/>                    
            </div>
            
            <button type="Submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a >
        </form>
    </div>
    
    <div class="card-footer text-muted" style="background-color:bisque"></div>
</div>

<?php include("../../templates/footer.php");?>