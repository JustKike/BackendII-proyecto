<style>
.sombra_svg {
	-webkit-filter: drop-shadow(0px 0px 5px #333);
	filter: drop-shadow(0px 0px 5px #333);
}
.modal-backdrop{
 position: relative; 
}

</style>
<head>
		<meta charset="utf-8"/>
</head>
<!-- Add New -->
    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered sombra_svg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Producto</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addnew.php" enctype="multipart/form-data">

				<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Imagen:</label>
						</div>
						<div class="col-lg-10">
							<input type="file" class="form-control-file" name="image" id="image">
						</div>
				</div>
				<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Codigo:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="code">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Genero:</label>
						</div>
						<div class="col-lg-10">
							<input list="Genero" name="gender" class="form-control" required pattern="M|F">
								<datalist id="Genero">
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</datalist>
							</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Categoria:</label>
						</div>
						<div class="col-lg-10">
						<input list="Departamento" name="category" class="form-control" required pattern="M|H|K|G">
								<datalist id="Departamento">
									<option value="M">MUJER</option>
									<option value="H">HOMBRE</option>
									<option value="K">NIÑO</option>
									<option value="G">NIÑA</option>
								</datalist>
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="name">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Marca:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="brand">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Descripcion:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="about">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Costo:</label>
						</div>
						<div class="col-lg-10">
							<input type="decimal" step="0.01" class="form-control" name="costo">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Precio:</label>
						</div>
						<div class="col-lg-10">
							<input type="decimal" step="0.01" class="form-control" name="precio">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Stock:</label>
						</div>
						<div class="col-lg-10">
							<input type="number" class="form-control" name="stock">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Talla:</label>
						</div>
						<div class="col-lg-10">
							<input type="decimal" step="0.01" class="form-control" name="talla">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Fecha:</label>
						</div>
						<div class="col-lg-10">
							<input type="datetime-local" class="form-control" name="date" required>
						</div>
					</div>
					<div style="height:10px;"></div>

                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="Guardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>
