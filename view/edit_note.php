<?php
$id = $producto = $total=$importe = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["producto"])) $producto = $dataToView["data"]["producto"];
if(isset($dataToView["data"]["importe"])) $importe = $dataToView["data"]["importe"];
if(isset($dataToView["data"]["total"])) $total = $dataToView["data"]["total"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=note&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=note&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>Producto</label>
			<input class="form-control" type="text" name="producto" value="<?php echo $producto; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Importe</label>
			<input type="number" class="form-control" onkeydown="calcularConEnter(event)" style="white-space: pre-wrap;" id="importe" name="importe"><?php echo $importe; ?></input>
				
		</div>
		<div class="form-group mb-2">
			<label>Total + IVA</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="total" id="total"><?php echo $total; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=note&action=list">Cancelar</a>
	</form>
</div>


<script>
        function calcularConEnter(event) {
               calcularIVA();
             
        }

        function calcularIVA() {
            var precio = parseFloat(document.getElementById('importe').value);
            var iva = precio * 0.16;
            var precioConIVA = precio + iva;

            document.getElementById('total').value = precioConIVA.toFixed(2);
        }
    </script>