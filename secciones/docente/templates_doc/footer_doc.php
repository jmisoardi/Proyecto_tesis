
<footer class="bg-info text-white text-center py-3 mt-auto">
        <p>&copy; 2024 Portal del Estudiante</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--Sweet alert -->
    <script>
            function borrar(id){
                Swal.fire({
                    title: "¿Desea borrar el registro?",
                    showCancelButton: true,
                    confirmButtonText: "Si",
                        }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location="index.php?txtID="+id;
                                    Swal.fire("Registro Borrado", "", "success");
                                } 
                            }
                        );
            }
        </script>
    </body>
</html>