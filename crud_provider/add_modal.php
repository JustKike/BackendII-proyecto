<style>
.sombra_svg {
	-webkit-filter: drop-shadow(0px 0px 5px #333);
	filter: drop-shadow(0px 0px 5px #333);
}
.modal-backdrop{
 position: relative;
}
</style>
<!-- Add New -->
    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg  modal-dialog-centered sombra_svg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Registro</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addnew.php">

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Nombre:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="nombre">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-key"></i> Dirección:</label>
						</div>
						<div class="col-xs-5">
							<input type="text" class="form-control left-addon input" name="direccion" placeholder="Dirección">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Teléfono:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="telefono">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Correo:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="correo">
						</div>
					</div>
					<div style="height:10px;"></div>
					</div>
					<div style="height:10px;"></div>

					
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
				</form>
                </div>

            </div>
        </div>
    </div>
