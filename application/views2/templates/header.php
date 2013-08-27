<!DOCTYPE html>
<html lang="en">
  <head>
	<title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('bootstrap/css/bootstrap-responsive.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" media="screen">
  </head>
  <body>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url('bootstrap/css/bootstrap.min.js')?>"></script>

 <div class="hero-unit">
  <h1>ZJU-Huawei-Club-Admin</h1>
  <p>后台管理系统</p>
  <p>
    <a class="btn btn-primary btn-large">
      俱乐部主页
    </a>
  </p>
  <p>
    <?php if($user_name){ echo $user_name."，欢迎，<a href = ".site_url('user/logout').">注销</a>";?>
  </p>
</div>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">Welcome</a>
    <ul class="nav">
      <li <?php if($active=="user")echo 'class="active"'?>><?php echo "<a href = ".site_url('user/info').">个人信息</a>";?></li>
      <li class="divider-vertical"></li>
      <li <?php if($active=="app")echo 'class="active"'?>><?php echo "<a href = ".site_url('app/finance').">报帐系统</a>";?></li>
      <li class="divider-vertical"></li>
      <li <?php if($active=="conference")echo 'class="active"'?>><?php echo "<a href = ".site_url('conference/index').">会议</a>";?></li>
    <?php
    }
    ?>
    </ul>
  </div>
</div>
<div class = 'row-fluid'>
  <div class = 'span2'></div>
  <div class = 'span8'>