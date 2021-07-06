<html>

@extends('csshome')
@section('scripts')
@extends('layouts.app')
<head>
	
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   
       <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">
   
       <title>{{ config('app.name', 'Laravel') }}</title>
   
       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script>
   
       <!-- Fonts -->
       <link rel="dns-prefetch" href="//fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
       <!-- Styles -->
	   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<body>
	<a  style="color:rgb(0, 0, 0);position:relative;top:50px;left:10%;" class="page-title font-italic font-bold m-0 pt-3 color-black text-center" href="{{ route('logout') }}"
											   onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
		</a>
	

    <div class="container">
		
		<section class="margin-top-content publish">
		
				
		<p class="page-title font-italic font-bold m-0 pt-3 color-black text-center" >PCR</p>
		
		
		
		<form method="post" action="{{ route('create_pcr') }}" enctype="multipart/form-data" name="everything" id="everything">
			@csrf
		<div class="font-italic input-w" style="margin-top:3%;">
            <span class="font-bold m-0">Patient Details</span>
            <br>
			<div id='col' style="margin-left:40px" style="margin-top:3%;">
				
				<span class="font-bold m-0">Patient Name</span>
				

				<input type="text" style="margin-right:2%"class="font-italic" name="name" id="name"placeholder="Type Name here...">
				@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            	<span class="font-bold m-0">Nationality</span>
                <input type="text" style="margin-right:2%"class="font-italic" name="nationality" id="nationality"placeholder="Type Nationality...">
				@error('nationality')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
				<span class="font-bold m-0">Age</span>
                <input type="text" style="margin-right:0%"class="font-italic" name="age" id="age"placeholder="Type Age...">
				@error('age')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
				   
      

				
		
			<div class="font-italic input-w" style="float:right;margin-top:0px;">
				<span class="font-bold m-0">Accompanied Person</span>
				<input type="text" id="accompaniedperson" class="font-italic" placeholder="Type Accompanied Person...">
			</div>
			</div>
		</div>
	<br>
	
	<div class="font-italic input-w" style="margin-top:3%;">
		<div style="margin-left:2%">
		<span class="font-bold m-0">Ambulance Details</span>
		<br>
		<div id='col' style="margin-left:40px" style="margin-top:3%;">
			<div style="margin-left:"
			<span class="font-bold m-0">Ambulance Number</span>
			

			<select style="margin-right:2%;width:100px" name="ambulance">
				<option></option>
			  @foreach($ambulances as $ambulance)
			  <option value=<?php echo $ambulance->plateNumber; ?> placeholder="ambulance number" name="ambulance"><?php echo $ambulance->plateNumber; ?></option>
			  @endforeach
			</select>
			@error('ambulance')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror
			<span class="font-bold m-0">KM Before</span>
			<input type="text" style="margin-right:2%"class="font-italic" name="KM before" id="KM before"placeholder="Type KM...">
			
			<span class="font-bold m-0">KM after</span>
			<input type="text" style="margin-right:0%"class="font-italic" name="KM after" id="KM after"placeholder="Type KM...">
			<label class="font-bold m-0"style="margin-right: 2%">UhKit</label>
				<input type="text"  id=uhkit class="font-italic" placeholder="Type UhKit here...">
				<br>
				<br>
				<label class="font-bold m-0" style="margin-right: 2%">CMkit</label>
				<input type="text"  id="cmkit" style="margin-right: 4%" class="font-italic" placeholder="Type ChKit here...">
				<label class="font-bold m-0" >M tank Pressure</label>
				<input type="text"  style="margin-right: 2%" id="mtankpressure" class="font-italic" placeholder="Type M tan here...">
				
			
			<div class="font-italic input-w" style="margin-top:1%">
				
			</div>
  

			
	
		
		</div>
	</div>
		

		 
		<div class="font-italic input-w"style="margin-top:3%;">
			<span class="font-bold m-0">Destination From</span>
			
				<div style="position:relative;width:200px;height:25px;border:0;padding:0;margin:0;">
					<select onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
					  <option></option>
					  @foreach($locations as $location)
					  <option value=<?php echo $location->descr; ?>><?php echo $location->descr; ?></option>
						@endforeach
					</select>
					<input type="text" name="locationfrom" id="locationfrom" 
						   placeholder="hospitals" onfocus="this.select()"
						   <input name="idValue" id="idValue" type="hidden">
					
				</div>
				 	
				</div>
		
		<div class="font-italic input-w" style="margin-top:3%;">
			<span class="font-bold m-0">Destination To</span>
				<div style="position:relative;width:200px;height:25px;border:0;padding:0;margin:0;">
					<select style="position:absolute;top:0px;left:0px;width:200px; height:25px;line-height:20px;margin:0;padding:0;"
							onchange="document.getElementById('locationto').value=this.options[this.selectedIndex].text; document.getElementById('idto').value=this.options[this.selectedIndex].value;">
					  <option></option>
					  @foreach($locations as $location)
					  <option value=<?php echo $location->descr;?>><?php echo $location->descr; ?></option>
					  @endforeach
					</select>
					<input type="text" name="locationto" id="locationto" 
						   placeholder="hospitals" onfocus="this.select()"
						   style="position:absolute;top:0px;left:0px;width:183px;width:180px\9;#width:180px;height:23px; height:21px\9;#height:18px;border:1px solid #556;"/>
					<input name="idValue" id="idto" type="hidden">
                  </div>
		</div>
		<div class="font-italic input-w" style="margin-top:3%;">
			<span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;">Mission Leader</span>
			<select name="missionleader[]"  style="width:100px;">
				<option></option>
				  	@foreach($rescuers as $rescuer)
					  <option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
					@endforeach
			  </select>

			  <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;">Driver</span>
			<select name="driver[]"  style="width:100px;">
				<option></option>
				  	@foreach($rescuers as $rescuer)
					  <option value=<?php echo $rescuer->nickname; ?>><?php echo  $rescuer->nickname; ?></option>
					@endforeach
			  </select>

			  <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;">rescuer1*(optional)</span>
			<select name="rescuers1[]"  style="width:100px;">
				<option></option>
				  	@foreach($rescuers as $rescuer)
					  <option value=<?php echo $rescuer->nickname; ?>><?php echo $rescuer->nickname; ?></option>
					@endforeach
			  </select>
			  <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;margin-right:10px">rescuer2*</span>
			  <select name="rescuers2[]"  style="width:100px;">
				  <option></option>
						@foreach($rescuers as $rescuer)
						<option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
					  @endforeach
				</select>
				<span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;margin-right:10px">rescuer3*</span>
				<select name="rescuers3[]"  style="width:100px;">
					<option></option>
						  @foreach($rescuers as $rescuer)
						  <option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
						@endforeach
				  </select>
				  <br>
				  <br>
				  <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;margin-right:10px">rescuer4*</span>
				  <select name="rescuers4[]"  style="width:100px;">
					  <option></option>
							@foreach($rescuers as $rescuer)
							<option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
						  @endforeach
					</select>
		</div>
		<div style="position:absolute;
		bottom:7%;right:3%">
			<button type="submit" name="submit" id="submit" class="btn-primary" style="position:absolute;right:10px;bottom:0px; float:top">Create</button><button type="button" class="btn-cancel font-italic">CANCEL</button>
		</div>
		<br>
		<label>Type of Mission</label>
		<select name="mission_type"  style="width:100px;">
			<option value="URG">URG</option>
			<option value="ADP">ADP</option>
			<option value="TM">TM</option>
			<option value="SAT">SAT</option>
			<option value="POSTE">POSTE</option>
		</select>
	   
	   
				   <div class="table-responsive">  
					   <table class="table table-bordered" id="dynamic_field">  
						   <br>
						<span class="font-bold m-0" style="size:20px;">Patient's Case</span>
			
						   <tr>  		
							<button type="button" style="margin-left:2% ;" name="add" id="add" class="btn btn-success">Add Case</button>  
						   </tr>  
						  
						 		   
					   </table>  
					    </div>
				</form>  
		   </div> 
		</div>
	</div>
		</section>
	
		  

<script type="text/javascript">
$(document).ready(function(){
			var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><select name="select_cases[]" id="select_cases[]" style=" width:200px;height:25px;line-height:20px;margin:0;padding:0;margin-left:8%"; onchange="document.getElementById("locationto").value=this.options[this.selectedIndex].text;document.getElementById("idto").value=this.options[this.selectedIndex].value;"><option></option>@foreach($cases as $case) <option value="<?php echo $case->descr;?>"><?php echo $case->descr; ?></option>@endforeach</select>	<input type="text" name="text_cases[]" id="text_cases[]" placeholder="other" onfocus="this.select()" style="width:200px;margin-left:2%;width:180px\9;#width:180px;height:23px; height:21px\9;#height:18px;border:1px solid #556;"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');});
		 
		     $(document).on('click', '.btn_remove', function(){  
	           var button_id = $(this).attr("id");
	           $('#row'+button_id+'').remove();  
		  });


	$(".submit").click(function(event){
		
      $.ajax({
        url: "/HTTP/Controllers/NewController.php",
        method:"POST",
        data:$('#everything').serialize(),
		
		success:function(response){
          console.log(response);
          if(response) {
            $('.success').text(response.success);
            $("#ajaxform")[0].reset();
          }
        },
       });
  });
});
</script>
</body>
</html>