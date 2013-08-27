<?php
echo form_open('user/register');
?>
  <span>UserID:</span><span><input type = "text" name = "UserID" id = "UserID"></span>
  <br>
  <span>UserName:</span><span><input type = "text" name = "UserName" id = "UserName"></span>
  <br>
  <span>UserPassword:</span><span><input type = "password" name = "UserPassword" id = "UserPassword"></span>
  <br>
  <input type = "submit" name = "submit" id = "submit" value="submit">

<?php 
echo form_close();
?>