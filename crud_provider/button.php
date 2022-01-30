<style>
.sombra_svg {
	-webkit-filter: drop-shadow(0px 0px 5px #333);
	filter: drop-shadow(0px 0px 5px #333);
}
.modal-backdrop{
 position: relative;
}
</style>

<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered sombra_svg"role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Eliminar</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from proveedor where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Estás seguro de eliminar a <strong><?php echo ucwords($drow['nombre']); ?></strong> del registro.</center></h5>
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                </div>

            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered sombra_svg" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center><h4 class="modal-title" id="myModalLabel">Editar</h4></center>
						</div>
						<div class="modal-body">
						<?php
							$edit=mysqli_query($conn,"select * from proveedor where id='".$row['id']."'");
							$erow=mysqli_fetch_array($edit);
						?>
							<div class="container-fluid">
								<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">

								<div class="row">
									<div class="col-lg-2">
										<label style="position:relative; top:7px;">Nombre:</label>
									</div>
									<div class="col-lg-10">
										<input type="text" name="nombre" class="form-control" value="<?php echo $erow['nombre']; ?>">
									</div>
								</div>
									<div style="height:10px;"></div>

								<div class="row">
									<div class="col-lg-2">
										<label style="position:relative; top:7px;">Dirección:</label>
									</div>
									<div class="col-lg-10">
										<input type="text" name="direccion" class="form-control" value="<?php echo $erow['direccion']; ?>">
									</div>
								</div>
									<div style="height:10px;"></div>

								<div class="row">
									<div class="col-lg-2">
										<label style="position:relative; top:7px;">Teléfono:</label>
									</div>
									<div class="col-lg-10">
										<input type="text" name="telefono" class="form-control" value="<?php echo $erow['telefono']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>

								<div class="row">
									<div class="col-lg-2">
										<label style="position:relative; top:7px;">Correo:</label>
									</div>
									<div class="col-lg-10">
										<input type="text" name="correo" class="form-control" value="<?php echo $erow['correo']; ?>">
									</div>
								</div>
									<div style="height:10px;"></div>
									</div>
								</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
										<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Guardar</button>
									</div>
						</form>
				</div>
        </div>
    </div>
<!-- /.modal -->
