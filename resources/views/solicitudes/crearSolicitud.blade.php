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
						{{-- Rol --}}
						<div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
										<i class="fas fa-edit"></i>
                                    </span>
								</div>
								{{-- <input type="text" class="form-control form-control-sm"  id="titulo" name="titulo" placeholder="Titulo Solicitud" value="@eachError('titulo', $errors) @endeachError"> --}}

                                <textarea class="form-control form-control-sm" name="descripcion" id="descripcion" cols="50" rows="5" placeholder="Describe tu Solicitud" value="@eachError('titulo', $errors) @endeachError"></textarea>
                                
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
									<input name="file-input" id="file-input" type="file" />
									<br />
									<img id="imgSalida" width="50%" height="50%" src="" />
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
//carga imagen
$(window).load(function(){

$(function() {
 $('#file-input').change(function(e) {
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
	 $('#imgSalida').attr("src",result);
	}
   });
 });

</script>

@endsection