<?php include("../../templates/header.php");?>
<br>
<br>
<!--Estilo para Datos Personales-->
<style> 
    h1 {
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h1>Datos Personales</h1> 


<div class="card">
    <div class="card-header" style="background-color:bisque">Datos Personales</div>
    
    <div class="card-body">
<!--Formulario para cargar los datos-->   
    <form action="" method="post" enctype="">

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Ingrese Nombre"/>
        </div>
        
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Ingrese Apellido"/>
        </div>
        
        <div class="mb-3">
            <label for="dni" class="form-label">Dni</label>
            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" placeholder="Ingrese Dni"/>            
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder=" Por ejemplo: abc@mail.com"/> 
        </div>
        
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingrese Teléfono"/>            
            <small id="helpId" class="form-text text-muted"> sin (0) y sin (15)</small>
        </div>
        
        <div class="mb-3">
            <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" aria-describedby="helpId" placeholder="Ingrese Dni"/>            
        </div>
        
        

    </form>
 

    </div>
    <div class="card-footer text-muted" style="background-color:bisque">Footer</div>
</div>



<?php include("../../templates/footer.php");?>