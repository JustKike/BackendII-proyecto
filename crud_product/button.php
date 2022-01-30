<style>
.sombra_svg {
	-webkit-filter: drop-shadow(0px 0px 5px #333);
	filter: drop-shadow(0px 0px 5px #333);
}
.modal-backdrop{
 position: relative; 
}
.dropdown1 {
  position: relative;
  display: inline-block;
}

.dropdown1-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown1:hover .dropdown1-content {
  display: block;
}

.desc {
  padding: 15px;
  text-align: center;
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
					$del=mysqli_query($conn,"select * from product where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Estas seguro de eliminar el item : <strong><?php echo ucwords($drow['code'].' - '.$row['name']); ?></strong> , del registro.</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <a href="delete.php?id=<?php echo $row['id']; ?>&codigo=<?php echo $row['code']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
<head>
<link rel="stylesheet" type="text/css" href="assets/css/styles2.css">
<script type="text/javascript">
$(document).ready(function() {
	$('.delete').click(function () {
		var parent = $(this).parent().attr('id');
		var service = $(this).parent().attr('data');
		var dataString = 'id='+service;

		$.ajax({
			type: "POST",
			url:"del_file.php",
			data: dataString,
			success: function(response) {
					$(".Img").attr("src",response)
			}
		});
	});
});
</script>
</head>
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered sombra_svg" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center><h4 class="modal-title" id="myModalLabel">Editar</h4></center>
						</div>
						<div class="modal-body">
						<?php
							$edit=mysqli_query($conn,"select * from product where id='".$row['id']."'");
							$erow=mysqli_fetch_array($edit);
						?>
							<div class="container-fluid">
								<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>" enctype="multipart/form-data" autocomplete="off">

								<div class="row">
									<div class="col-lg-2">
										<label class="control-label" style="position:relative; top:7px;">Imagen:</label>
									</div>
									<div class="col-lg-10">
										<input type="file" class="form-control-file" name="image" id="image" accept="image/*">

										<?php
											$Id = $erow['code'];
											$nameImg = $erow['name'];
											$path = 'assets/images/'.$Id;
											if(file_exists($path)){
												$directorio=opendir($path);
												while ($archivo = readdir($directorio))
												{
													if (!is_dir($archivo)){
														echo"<div data='".$path."/".$archivo."'>
														<a href='".$path."/".$archivo."'
														title='Ver Archivo Adjunto'><span
														class='glyphicon
														glyphicon-picture'></span></a>";
														echo"$archivo <a href='#' class='delete'
														title='Borrar imagen'><span
														class='glyphicon glyphicon-trash'
														aria-hidden='true'></span></a></div>";
														echo "
														<div class='dropdown1'>
															<img class='Img' src='assets/images/$Id/$archivo'  width='60' height='40'>
															<div class='dropdown1-content'>
																<img class='Img' src='assets/images/$Id/$archivo' width='300' height='200'>
																<div class='desc'>$nameImg</div>
															</div>
														</div>
														";
													}
												}
											}
											?>
									</div>
								</div>
								<div style="height:10px;"></div>

								<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Codigo:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="code" value="<?php echo $erow['code']; ?>" >
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Genero:</label>
						</div>
						<div class="col-lg-10">
							<input list="Genero" name="gender" class="form-control" required pattern="M|F" value="<?php echo $erow['gender']; ?>">
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
						<input list="Departamento" name="category" class="form-control" required pattern="M|H|K|G"value="<?php echo $erow['category']; ?>">
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
							<input type="text" class="form-control" name="name" value="<?php echo $erow['name']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Marca:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="brand" value="<?php echo $erow['brand']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Descripcion:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="about" value="<?php echo $erow['about']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Costo:</label>
						</div>
						<div class="col-lg-10">
							<input type="decimal" step="0.01" class="form-control" name="costo" value="<?php echo $erow['costo']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Precio:</label>
						</div>
						<div class="col-lg-10">
							<input type="decimal" step="0.01" class="form-control" name="precio" value="<?php echo $erow['precio']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Stock:</label>
						</div>
						<div class="col-lg-10">
							<input type="number" class="form-control" name="stock" value="<?php echo $erow['stock']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Talla:</label>
						</div>
						<div class="col-lg-10">
							<input type="decimal" step="0.01" class="form-control" name="talla" value="<?php echo $erow['talla']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>

					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Fecha:</label>
						</div>
						<div class="col-lg-10">
						<input type="datetime-local" id="txtfecha" name="date" class="form-control" value="<?php echo $erow['date']; ?>" required/>
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
