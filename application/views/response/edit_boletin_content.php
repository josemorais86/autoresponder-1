<form action="" class="full validate">
		<input type="hidden" id="accion" name="accion" value="crear">
		<input type="hidden" id="id_lista" name="id_lista" value="<?php echo $lista_id_lista; ?>">
			<div class="row">
				<table class="table table-bordered table-hover new_seguimiento">
					<tbody>
						<tr>
							<th style="font-weight: bold; font-style: italic; font-size: 13px;">
								Nombre:
							</th>
							<td>
								<input id="nombre"  maxlength="210" size="80" type="text" name="nombre" style="height: 30" value="<? echo $nombre; ?>">
							</td>
						</tr>
						<tr>
							<th style="font-weight: bold; font-style: italic; font-size: 13px;">
								Remitente:
							</th>
							<td>
								<input id="rte"  maxlength="210" size="80" type="text" name="rte" style="height: 30" value="<? echo $remitente; ?>">
							</td>
						</tr>
						<tr>	
							<th style="font-weight: bold; font-style: italic; font-size: 13px;">
								Asunto:
							</th>
							<td>	
								<input id="asunto" maxlength="210"  size="80" type="text" name="asunto" style="height: 30" value="<? echo $asunto; ?>"/>
							</td>	
						</tr>
						
						<tr>
							<td colspan="2">
								<textarea cols='80' id='editor' name='editor' rows='10'><? echo $html; ?></textarea>
							</td>
						</tr>
					   <tr>
				    	<th style="font-weight: bold; font-style: italic; font-size: 13px;">
				    		Fecha y hora:
				    	</th>
				    	<td>
				    		<div style="margin-top:10px;margin-bottom:15px">
				    			<div style="margin-left:10px;float:left">
				    				<input id="fecha" name="fecha" size="10" type="text" style="width: 100px" value="<? echo $fecha; ?>" />
								</div>
								<div style="margin-left:20px;float:left">
									<select id="hora" name="hora" style="width: 80px">
										<?php 
											for($i=0;$i<24;$i++){
												if($i <= 9)
													echo "<option value='".$i."'>0".$i.":00</option>";
												else
													echo "<option value='".$i."'>".$i.":00</option>";
											}
										?>
									</select>
									
				    			</div>
				    			<div style="margin-left:20px;float:left">Hrs.</div>
				    		</div>
				    	</td>
				    </tr>		
					</tbody>
				</table>
				<br><br>
			</div>
						
		</form>

		<div class="actions">
			<div class="left">
				<button class="grey cancel">Cancel</button>
			</div>
			<div class="right">
				<button id="enviar" >Programar</button>
			</div>
		</div>
<script type="text/javascript">
    $( 'textarea#editor' ).ckeditor();
    $("#fecha").datepicker({ dateFormat: "dd-mm-yy" });
</script>   		
