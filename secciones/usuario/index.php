<?php include("../../templates/header.php");?>
<br>
<br>

<style> 
    h1 {
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h1>Usuarios</h1> 
<div class="card">
    
    <!--Header y button primary-->
        <div class="card-header" style="background-color:bisque">   
            <a name="" id="" class="btn btn-primary" href="crear.php" role="button" >Agregar Usuarios</a>
        </div> 
    
        <div class="card-body" style="background-color:azure">
    
        <div class="table-responsive-sm">
            <table
                class="table">
                <thead>
                    <tr>
                    <!--Alineación central del ID, Nombre/Rol, Acciones-->
                    <style> 
                        th {
                            text-align: center; font-family: Georgia, sans-serif;
                            }
                    </style>
                        <th scope="col" style="background-color:azure"><u>ID</u></th>
                        <th scope="col" style="background-color:azure"><u>Nombre/Usuario</u></th>
                        <th scope="col" style="background-color:azure"><u>Password</u></th>
                        <th scope="col" style="background-color:azure"><u>Email</u></th>
                        <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                    </tr>
                </thead>
                <tbody>
                    <!--Alineación central style-->
                    <style>
                        td  {
                            text-align: center; font-family: Georgia, sans-serif;
                            }   
                    </style>
                        <tr class="">
                        <td scope="row">1</td>
                        <td>jair</td>
                        <td>******</td>
                        <td>jmisoardi@hotmail.com</td>
                        
                        <td>
                            <input name="btneditar" id="btneditar" class="btn btn-info" type="button" value="Editar"/> |
                            <input name="btnborrar" id="btnborrar" class="btn btn-danger" type="button" value="Eliminar"/>
                                
                        </td>
                        
                    </tr>
                    
                </tbody>
            </table>
        </div>
    
    <div class="card-footer text-muted" style="background-color:bisque"></div>
</div>
        




<?php include("../../templates/footer.php");?>