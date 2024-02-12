<?php include("../../templates/header.php");?>

<br/>
<br/>
    <!--Estilo para el titulo Personal-->
<style> 
    h1 {
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h1>Personal</h1> 


<div class="card">
    <div class="card-header" style="background-color:bisque">
        
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar Registro
        </a>
        
    </div> 
    <div class="card-body" style="background-color:azure">
        
        <div
            class="table-responsive-md">
            <table
                class="table">
                <thead>
                    <tr>
                        <th scope="col" style="background-color:azure"><u>Nombre</u></th>
                        <th scope="col" style="background-color:azure"><u>Apellido</u></th>
                        <th scope="col" style="background-color:azure"><u>Dni</u></th>
                        <th scope="col" style="background-color:azure"><u>Email</u></th>
                        <th scope="col" style="background-color:azure"><u>Teléfono</u></th>
                        <th scope="col" style="background-color:azure"><u>Fecha/Nacimiento</u></th>
                        <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">Jair </td>
                        <td>Isoardi</td>
                        <td>32578143</td>
                        <td>jmisoardi@hotmail.com</td>
                        <td>2954443014</td>
                        <td>27/10/1986</td>
<!--Etiqueta de botones Editar y Eliminar-->
                        <td><a name="" id="" class="btn btn-info" href="#" role="button">Editar</a> |
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </td>
                    </tr>
                
                </tbody>
            </table>
        </div>
        

        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
    </div>
    <div class="card-footer text-muted" style="background-color:bisque">
        Footer</div>
</div>


<?php include("../../templates/footer.php");?>