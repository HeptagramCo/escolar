<table>
   <?php
      if (isset($ratings)) {
         $form = "/rating/update";
      }else{
         $form = "/rating/set";
      }
   ?>
   <form id="form_id" action="<?=$form ?>" method="post">
      <tr>
         <td>
            Alumnos
         </td>
         <?php foreach ($matters as $row) { ?>

            <td>
               <?=$row["name_subject_matter"] ?>
            </td>

         <?php } ?>
      </tr>
      <?php foreach ($students as $key ) { ?>
         <tr>
            <td>
               <?=$key["name_students"] ?>
            </td>
            <?php foreach ($matters as $row) { ?>

               <td>
                  <?php if(isset($ratings)){

                     $consult = new RatingModel();
                     $val = $consult->getC("id_students", $key['id_students'], "id_subject_matter", $row['id_subject_matter'], "id_cycle", $cycle);
                     foreach($val as $value){
                     ?>
                     <input type="text" name="<?=$value['id_rating'] ?>-<?=$row["id_subject_matter"] ?>-<?=$key["id_students"] ?>-<?=$cycle?>-<?=$group?>" value="<?=$value['number_rating'] ?>">
                  <?php } }else{ ?>
                     <input type="text" name="<?=$row["id_subject_matter"] ?>-<?=$key["id_students"] ?>-<?=$cycle?>-<?=$group?>" value="0">
                  <?php } ?>
               </td>


            <?php } ?>
         </tr>
      <?php } ?>
      <input type="submit" value="Enviar">
   </form>
</table>
