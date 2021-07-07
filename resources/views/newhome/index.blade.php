@extends('newhome.main');
<meta name="csrf-token" content="{{ csrf_token() }}">      
<body>
    <div class="main">
          <div class="container">
            <form method="post" class="signup-form" action="{{ route('create_pcr') }}" enctype="multipart/form-data" name="everything" id="everything">
                @csrf
                
                <div>
                    <h3>Patient Details</h3>
                    <fieldset>
                        <h2>Personal information</h2>
                        <p class="desc">Please enter your infomation and proceed to next step so we can create your patient Care Report</p>
                        <div class="fieldset-content">
                            <div class="form-row">
                                <label class="form-label">Patient's Name</label>
                                <div class="form-flex">
                                    <div class="form-group">
                                        <input type="text" name="name" id="first_name" />
                                        <span class="text-input">First</span>
                                    </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="Age" class="form-label">Nationality</label>
                                <input type="text" name="nationality" id="nationality" />
                            </div>
                            <div class="form-group">
                                <label for="Age" class="form-label">Age</label>
                                <input type="text" name="age" id="age" />
                            </div>
                             <div class="form-group">
                                <label for="ssn" class="form-label">Accompanied Person</label>
                                <input type="text" name="accompaniedperson" id="accompaniedperson" />
                            </div>
                               
                            <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">  
                                    <br>
                                 <span class="font-bold m-0" style="size:20px;">Patient's Case</span>
                     
                                    <tr>  		
                                     <button type="button" style="margin-left:2% ;" name="add" id="add" class="btn btn-success">Add Case</button>  
                                    </tr>  
                                   
                                             
                                </table>  
                                 </div>
                     
                        </div>
                    </fieldset>

                    <h3>Ambulance Details</h3>
                    <fieldset>
                        <h2>Personal information</h2>
                        <p class="desc">Please enter your infomation and proceed to next step so we can create your patient Care Report</p>
                        <div class="fieldset-content">
                            <div class="form-group">
                                <label class="form-label">Ambulance Number</label>
                                <div class="form-flex">
                                    <div class="form-group">
                                        <select style="height:50px;width:100%" name="ambulance">
                                            <option></option>
                                          @foreach($ambulances as $ambulance)
                                          <option value=<?php echo $ambulance->plateNumber; ?> placeholder="ambulance number" name="ambulance"><?php echo $ambulance->plateNumber; ?></option>
                                          @endforeach
                                        </select>
                                          </div>
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="Age" class="form-label">UH-kit</label>
                                <input type="text" name="uhkit" id="uhkit" />
                            </div><div class="form-group">
                                <label for="Age" class="form-label">CM-kit</label>
                                <input type="text" name="phone" id="phone" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">M tank pressure</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                      
                            <div class="form-date">
                                  </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">KM before</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">KM after</label>
                                <input type="text" name="ssn" id="ssn" />

                            </div>
                      
                        </div>
                    </fieldset>

                    <h3>Rescuers+Destination</h3>
                    <fieldset>
                        <h2>Rescuers+Destination</h2>
                        <div class="form-group">
                            <label for="ssn" class="form-label">Destination From</label>
                            <select  onchange="myFunction(value);" id="locationto" style="height:50px;width:100%" onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
                                <option></option>
                                <option value="other" onClick=""  >other</option>
                                @foreach($locations as $location)
                                <option value=<?php echo $location->descr; ?>><?php echo $location->descr; ?></option>
                                  @endforeach
                              </select>
                              <script>
                                function myFunction($value)
                                {       
                                    if($value=="other")
                                    {
                                        $('#locationfrom').toggle();
                                    }
                                    else {
                                        $('#locationfrom').type= "hidden";

                                    }
                                     
                                }
                                </script>
                              <input type="text" style="display:none;" name="locationfrom" id="locationfrom" 
                                     placeholder="hospitals" onfocus="this.select()"
                                     <input name="idValue" id="idValue" type="hidden"> <span class="text-input">Destination From</span>
                        </div>
                        <div class="form-group">
                            <label for="ssn" class="form-label">Destination To</label>
                            <select  onchange="myFunction(value);" style="height:50px;width:100%" onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
                                <option></option>
                                <option value="other" onClick=""  >other</option>
                                @foreach($locations as $location)
                                <option value=<?php echo $location->descr; ?>><?php echo $location->descr; ?></option>
                                @endforeach
                              </select>
                              <script>
                                function myFunction($value)
                                {       
                                    if($value=="other")
                                    {
                                        $('#locationfrom').toggle();
                                    }
                                    else {
                                        $('#locationfrom').type= "hidden";
                                    }
                                }
                                </script>
                              <input type="text" style="display:none;" name="locationto" id="locationfrom" 
                                     placeholder="hospitals" onfocus="this.select()"
                                     <input name="idValue" id="idValue" type="hidden"> <span class="text-input">Destination To</span>
                                     <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;">MissionLeader</span>  
                                     <select  style="height:50px;width:100%" name="missionleader[]"  style="width:100px;">
                                        <option></option>
                                              @foreach($rescuers as $rescuer)
                                              <option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
                                            @endforeach
                                      </select>                     
                                      <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;">Driver</span>
                                    <select  style="height:50px;width:100%" name="driver[]"  style="width:100px;">
                                        <option></option>
                                              @foreach($rescuers as $rescuer)
                                              <option value=<?php echo $rescuer->nickname; ?>><?php echo  $rescuer->nickname; ?></option>
                                            @endforeach
                                      </select>
                        
                                      <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;">rescuer1*(optional)</span>
                                    <select  style="height:50px;width:100%" name="rescuers1[]"  style="width:100px;">
                                        <option></option>
                                              @foreach($rescuers as $rescuer)
                                              <option value=<?php echo $rescuer->nickname; ?>><?php echo $rescuer->nickname; ?></option>
                                            @endforeach
                                      </select>
                                      <span class="font-bold m-0"style="height:50px;width:100%">rescuer2*</span>
                                      <select name="rescuers2[]"  style="height:50px;width:100%"">
                                          <option></option>
                                                @foreach($rescuers as $rescuer)
                                                <option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
                                              @endforeach
                                        </select>
                                        <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;margin-right:10px">rescuer3*</span>
                                        <select  style="height:50px;width:100%" name="rescuers3[]"  style="width:100px;">
                                            <option></option>
                                                  @foreach($rescuers as $rescuer)
                                                  <option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
                                                @endforeach
                                          </select>
                                          <br>
                                          <br>
                                          <span class="font-bold m-0" style="width:200px; height:25px;line-height:20px;margin:0;padding:0;margin-right:10px">rescuer4*</span>
                                          <select  style="height:50px;width:100%" name="rescuers4[]"  style="width:100px;">
                                              <option></option>
                                                    @foreach($rescuers as $rescuer)
                                                    <option value="<?php echo $rescuer->nickname; ?>"><?php echo  $rescuer->nickname; ?></option>
                                                  @endforeach
                                            </select>
                        
                                    
                    </fieldset>
                                   <button type="submit" name="submit" id="submit" class="btn-primary">Create</button>   
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
                                                url: "/HTTP/Controllers/HomeController.php",
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
                        </div>
                

            </form>
            <a href="{{ url('logout') }}">Logout</a>
           
        </div>

    </div>
   