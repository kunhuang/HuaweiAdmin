<?php
echo form_open('user/info_edit');
?>
  <input type = "hidden" name = "user_id" id = "user_id" value = <?php echo $user_id?>>
  <span>姓名:</span><span><input type = "text" name = "user_name" id = "user_name" value = <?php echo $user_name?>></span>
  <br>
  <span>学号:</span><span><input type = "text" name = "tel" id = "tel" disabled = "disabled" value = <?php echo $user_id?>></span>
  <br>
  <span>电话:</span><span><input type = "text" name = "tel" id = "tel" value = <?php echo $tel?>></span>
  <br>
  <span>生活照:</span><span><input type = "file" name = "photo" id = "photo" accept="image/gif, image/jpeg"></span>
  <br>
  <span>学院:</span><span><input type = "text" name = "college" id = "college" value = <?php echo $college?>></span>
  <br>
  <span>年级:</span><span><input type = "text" name = "grade" id = "grade" value = <?php echo $grade?>></span>
  <br>
  <span>部门:</span>
  <select name = "section" id = "section">
    <option value = "主席团">主席团</option>
    <option value = "人资部">人资部</option>
    <option value = "运营部">运营部</option>
    <option value = "技术部">技术部</option>
  </select>
  <br>
  <span>职位:</span>
  <select name = "position" id = "position">
    <option value = "干事">干事</option>
    <option value = "主席">主席</option>
    <option value = "副主席">副主席</option>
    <option value = "部长">部长</option>
    <option value = "副部长">副部长</option>
  </select>
  <br>
  <input type = "submit" class = "btn btn-primary" name = "submit" id = "submit" value="submit">

<?php
echo form_close();
?>
