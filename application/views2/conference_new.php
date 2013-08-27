<?php
echo form_open('conference/add');
?>
  <span>时间:</span><span><input type = "date" name = "time" id = "time"></span>
  <br>
  <span>地点:</span><span><input type = "text" name = "place" id = "place"></span>
  <br>
  <span>主题:</span><span><input type = "text" name = "title" id = "title"></span>
  <br>
  <span>简要流程:</span><span><input type = "text" name = "keynote" id = "keynote"></span>
  <br>
  <input type = "submit" name = "submit" id = "submit" value="submit">
<?php 
echo form_close();
?>
