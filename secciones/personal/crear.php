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
    <div class="card-header" style="background-color:bisque">Ingrese los datos para el registro</div>
    
    <div class="card-body">
<!--Formulario para cargar los datos, con style de color-->   
    <form  action="" method="post" enctype="" style="background-color:azure">

        <div class="mb-3">
            <label for="Nombre" class="form-label"><u>Nombre:</u></label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Ingrese Nombre"/>
        </div>
        
        <div class="mb-3">
            <label for="apellido" class="form-label"><u>Apellido:</u></label>
            <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Ingrese Apellido"/>
        </div>
        
        <div class="mb-3">
            <label for="dni" class="form-label"><u>Dni:</u></label>
            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" placeholder="Ingrese Dni"/>            
        </div>
        
        <div class="mb-3">
            <label for="fechanacimiento" class="form-label"><u>Fecha/Nacimiento:</u></label>
            <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" aria-describedby="helpId" placeholder="Ingrese Dni"/>            
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label"><u>Email:</u></label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder=" Por ejemplo: abc@mail.com"/> 
        </div>
        
        <div class="mb-3">
            <label for="telefono" class="form-label"><u>Teléfono:</u></label>
            <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingrese Teléfono"/>            
            <small id="helpId" class="form-text text-muted"> sin (0) y sin (15)</small>
        </div>
        
        <div class="mb-3">
            <label for="idrol" class="form-label"><u>Rol:</u></label>
            <select
                class="form-select form-select-ms" name="idrol" id="idrol">
                
                <option selected>Seleccione un rol</option>
                <option value="">Docente</option>
                <option value="">Alumno</option>
                
            </select>
        </div>

        <div class="mb-3">
            <label for="fechaingreso" class="form-label"><u>Fecha/Ingreso:</u></label>
            <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" aria-describedby="helpId" placeholder="Ingrese Fecha"/>
            
        </div>
        
        <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
        <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>

    </form>
    
    <br>
    <div class="card-footer text-muted" style="background-color:bisque"></div>
    
<?php include("../../templates/footer.php");?>