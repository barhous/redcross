<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="assets/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="assets/vendor/minimalist-picker/dobpicker.js"></script>
<script src="assets/vendor/nouislider/nouislider.min.js"></script>
<script src="assets/vendor/wnumb/wNumb.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">
   function myFunction($value)
                                {       
                                    if($value=="other")
                                    {
                                        $('#locationfrom').toggle();
                                    }
                        
                                }

                                function cases($value)
                                {       
                                    if($value=="other")
                                    {
                                        $('#text_cases').toggle();
                                    }
                        
                                }
    $(document).ready(function(){
                var i=1;  
          $('#add').click(function(){  
               i++;  
               $('#dynamic_field').append('<tr id="row'+i+'"><td><select onchange="cases(value);"  name="select_cases[]" id="select_cases[]" style=" width:200px;height:25px;line-height:20px;margin:0;padding:0;margin-left:8%"; onchange="document.getElementById("locationto").value=this.options[this.selectedIndex].text;document.getElementById("idto").value=this.options[this.selectedIndex].value;"><option></option><option value="other">other</option>@foreach($cases as $case) <option value="<?php echo $case->descr;?>"><?php echo $case->descr; ?></option>@endforeach</select>	<input type="text" style="display:none;" name="text_cases[]" id="text_cases[]" placeholder="other" onfocus="this.select()" style="width:200px;margin-left:2%;width:180px\9;#width:180px;height:23px; height:21px\9;#height:18px;border:1px solid #556;"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');});
             
                 $(document).on('click', '.btn_remove', function(){  
                   var button_id = $(this).attr("id");
                   $('#row'+button_id+'').remove();  
              });
    
    
        $(".submit").click(function(event){
            
          $.ajax({
            url: "/HTTP/Controllers/NewController.php",
            method:"POST",
            data:$('#signup-form').serialize(),
            
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