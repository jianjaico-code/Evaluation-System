<select class="form-control">
   <?php 
        $null = 'null';
        $choose = 'Choose SY';
        $Present = 'Present';
      for($i=date('Y');  $i < date('Y')+5; $i++){

         $x = $i +1;
         $y = $i;
         
          echo '<option value='.$y.'-'.$x.'>'.$y.'-'.$x.'</option>';
   }?>
</select>