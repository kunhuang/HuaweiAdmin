<?php
echo form_open('conference/edit/'.$conference['id']);
?>
  <span>time:</span><span><input type = "text" name = "time" id = "time" value = <?php echo $conference['time']?>></span>
  <br>
  <span>place:</span><span><input type = "text" name = "place" id = "place"value = <?php echo $conference['place']?>></span>
  <br>
  <span>title:</span><span><input type = "text" name = "title" id = "title"value = <?php echo $conference['title']?>></span>
  <br>
  <span>keynote:</span><span><input type = "text" name = "keynote" id = "keynote" value = <?php echo $conference['keynote']?>></span>
  <br>
  <input type = "submit" name = "submit" id = "submit" value="submit">
<?php 
echo form_close();
?>
