<section id="rating-content">
   <form id="form_id" action="/rating/register" method="post">
      <select  name="group">
         <?php foreach ($groups as $row) { ?>
            <option value="<?=$row["id_groups"] ?>"><?=$row["year_section_groups"] ?></option>
         <?php } ?>
      </select>
      <select name="cycle">
         <?php foreach ($cycles as $row) { ?>
            <option value="<?=$row["id_cycle"] ?>"><?=$row["name_cycle"] ?></option>
         <?php } ?>
      </select>
      <input type="submit" name="go">
   </form>
</section>
