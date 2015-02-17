<table>
   <form id="form_id" action="/rating/set" method="post">
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
                  <input type="text" name="<?=$row["id_subject_matter"] ?>-<?=$key["id_students"] ?>-<?=$cycle?>" value="0">
               </td>

            <?php } ?>
         </tr>
      <?php } ?>
      <input type="submit" value="Enviar">
   </form>
</table>
