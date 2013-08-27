<?php
echo "<h1>".$title."</h1>";
echo form_open('app/finance_add');
?>
  <span>时间:</span><span><input type = "date" name = "submit_time" id = "submit_time"></span>
  <br>
  <span>花费:</span><span><input type = "text" name = "expense" id = "expense"></span>
  <br>
  <span>用途:</span><span><input type = "text" name = "use" id = "use"></span>
  <br>
  <input type = "submit" name = "submit" id = "submit" value="submit">
<?php 
echo form_close();
?>