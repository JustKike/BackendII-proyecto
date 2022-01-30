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
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Usuario:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="user">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-key"></i> Contraseña:</label>
						</div>
						<div class="col-xs-5">
							<input type="text" class="form-control left-addon input" name="password" placeholder="Password">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Nombres:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="firstname">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Apellidos:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="lastname">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-address-card-o"></i> Direccion:</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="address">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-user"></i> Rol de usuario:</label>
						</div>
						<div class="col-lg-5">
						<input list="Roles" name="userrol" class="form-control"required pattern="Admin|Sup|Alm|Cli">
							<datalist id="Roles">
								<option value="Admin">Administrador</option>
								<option value="Sup">Supervisor</option>
								<option value="Alm">Almacenista</option>
								<option value="Cli">Cliente</option>
							</datalist>
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> Fecha:</label>
						</div>
						<div class="col-lg-5">
							<input type="datetime-local" class="form-control" name="date">
						</div>
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
