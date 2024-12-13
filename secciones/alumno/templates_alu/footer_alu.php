    <!-- </main> -->
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
                src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
            </script>
            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous">
            </script>
        
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
        <br>
        <br>
        
        <!-- Footer de templates de Docente -->
        <footer class="bg-info text-white text-center py-3 mt-auto">
                <p>&copy; 2024 Portal del Estudiante</p>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
</html>
