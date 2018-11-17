@extends('contenedores.home')
@section('titulo','Crear Solicitud')
@section('contenedor_home')
@include('error.error')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form enctype="multipart/form-data" action="{{ url('/solicitudes') }}" method = "POST">
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h3><i class="fas fa-hand-holding-usd"></i> Crear Solicitud</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
						{{-- titulo --}}
						<div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
											<i class="fas fa-font"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-sm"  id="titulo" name="titulo" placeholder="Titulo Solicitud" value="@eachError('titulo', $errors) @endeachError">
                            </div>
						</div>
                    </div>
					<div class="row">
						{{-- descripcion --}}
						<div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
										<i class="fas fa-edit"></i>
                                    </span>
								</div>
								{{-- <input type="text" class="form-control form-control-sm"  id="titulo" name="titulo" placeholder="Titulo Solicitud" value="@eachError('titulo', $errors) @endeachError"> --}}

                                <textarea class="form-control form-control-sm" name="descripcion" id="descripcion" cols="50" rows="5" placeholder="Describe tu Solicitud" value="@eachError('descripcion', $errors) @endeachError"></textarea>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
						{{-- categoria --}}
						<div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                </div>
								<select  id="categoria" name="categoria" placeholder="Categoria de la solicitud" class="form-control form-control-sm" value="@eachError('categoria', $errors)@endeachError">
										<option value="">Seleccione una categoria</option>
										<option value="educacion">Educacion</option>
										<option value="investigacion">Investigacion</option>
										<option value="arte">Arte</option>
										<option value="empresa">Empresa</option>
										<option value="personal">Personal</option>
										
								</select>
							</div>
                        </div>
                        {{-- monto --}}
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                                </div>
                                <input type="number" id="monto" name="monto" placeholder="Monto solicitado" class="form-control form-control-sm" value="@eachError('monto', $errors)@endeachError">
                            </div>
                        </div>
                    </div>
					<div class="row">
							{{-- tasa de interes --}}
							<div class="col-md-2"></div>
							<div class="col-md-4">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-percentage"></i></i></span>
									</div>
									<input type="number" step="any"  id="tasa" name="tasa" placeholder="Tasa de Interes" class="form-control form-control-sm" value="@eachError('tasa', $errors)@endeachError">
								</div>
							</div>
							{{-- fecha recaudo --}}
							<div class="col-md-4">
								<div class="input-group mb-2">
										<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="far fa-calendar-alt"> Plazo</i> 
												</span>
											</div>
											<input type="date" name="fecha_recaudo" placeholder="dd/mm/yyyy" class="form-control form-control-sm" value="@eachError('fecha_recaudo', $errors)@endeachError">
										</div>
							</div>
						</div>
                    <div class="row">
						<div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="input-group mb-2">
                            {{-- tiempo devolucion --}}
							<div class="input-group-prepend">
									<span class="input-group-text">
											<i class="fas fa-donate"></i>
									</span>
								</div>
                                <select  id="tiempo" name="tiempo" placeholder="Tiempo para devolucion" class="form-control form-control-sm" value="@eachError('tiempo', $errors)@endeachError">
										<option value="">Seleccione plazo de entrega</option>
										<option value="3">3 meses</option>
										<option value="6">6 meses</option>
										<option value="9">9 meses</option>
										<option value="12">1 año</option>
										
								</select>
                            </div>
                        </div>
					</div>
					<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									<div class="input-group mb-2">
											{{-- Foto --}}
												<div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
													<i class="fas fa-file-image input-group-text"></i>
												</div>
												<div class="custom-file">
													<input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" lang="es">
													<label id="file" class="custom-file-label" for="customFileLang">Sube una foto</label>
												</div>
											</div>
	
										
							</div>
					</div>
					<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											{{-- Foto --}}
											<img id="imgSalida" width="100%" style="display:none" src="" />
											<textarea style="display:none" class="form-control form-control-sm" name="descripcion_foto" id="descripcion_foto" cols="50" rows="3" placeholder="Describe tu foto" value="@eachError('descripcion_foto', $errors) @endeachError"></textarea>

										</div>
									</div>
							</div>
					</div>

					<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									<div class="input-group mb-2">
											{{-- video --}}
											<div class="input-group-prepend">
													<span class="input-group-text">
															<i class="fab fa-youtube"></i>
													</span>
												</div>
														<input type="text" name="video" class="form-control form-control-sm" placeholder="Ingrese la url despues de https://www.youtube.com/" id="video" onblur="videop()">

											</div>
	
										
							</div>
					</div>
					<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											{{-- video --}}
											<iframe style="display:none" id="videoSalida" width="100%" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<textarea style="display:none" class="form-control form-control-sm" name="descripcion_video" id="descripcion_video" cols="50" rows="3" placeholder="Describe tu foto" value="@eachError('descripcion_video', $errors) @endeachError"></textarea>

										</div>
									</div>
							</div>
					</div>
					
					<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="text-center">
									<input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
								</div>
							</div>
					</div>
					
					
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<br>

<script>
function videop(){
	result = document.getElementById('videoSalida');
	val = document.getElementById('video').value;
	result.style.display = "inline";
	inicio = "https://www.youtube.com/embed/";
	result.src = inicio+val;
	document.getElementById('descripcion_video').style.display = "inline";
};
//carga imagen
$(window).on('load', function(){

$(function() {
 $('#customFileLang').change(function(e) {
	 addImage(e); 
	});



	function addImage(e){
	 var file = e.target.files[0],
	 imageType = /image.*/;
   
	 if (!file.type.match(imageType))
	  return;
 
	 var reader = new FileReader();
	 reader.onload = fileOnload;
	 reader.readAsDataURL(file);
	}
 
	function fileOnload(e) {
	 var result=e.target.result;
	 document.getElementById('imgSalida').style.display = "inline";
	 document.getElementById('descripcion_foto').style.display = "inline";
	 $('#imgSalida').attr("src",result);
	}
   });
 });

</script>

@endsection