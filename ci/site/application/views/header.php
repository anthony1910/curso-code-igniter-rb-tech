<!DOCTYPE html>
<!--
Template Name: Geodarn
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>
  <?php
  if(isset($titulo)) {
    echo $titulo;
  } else {
    echo "Título da Página";
  }
  ?>
</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo base_url('assets/layout/styles/layout.css'); ?>" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('<?php echo base_url("assets/images/demo/backgrounds/01.png") ?>');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="<?php echo base_url(); ?>">Geodarn</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
              <li><a href="<?php echo base_url('width'); ?>">Full Width</a></li>
              <li><a href="<?php echo base_url('left'); ?>">Sidebar Left</a></li>
              <li><a href="<?php echo base_url('right'); ?>">Sidebar Right</a></li>
              <li><a href="<?php echo base_url('grid'); ?>">Basic Grid</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="flexslider basicslider">
      <ul class="slides">
        <li>
          <article>
            <p>Ullamcorper</p>
            <h3 class="heading">Maecenas nulla tellus</h3>
            <p>Vitae lobortis id ut mi in molestie in</p>
            <footer><a class="btn" href="#">Venenatis curabitur</a></footer>
          </article>
        </li>
        <li>
          <article>
            <p>Scelerisque</p>
            <h3 class="heading">Dolor rhoncus nullam</h3>
            <p>Augue non id quam sit amet urna lobortis</p>
            <footer><a class="btn inverse" href="#">Interdum lectus</a></footer>
          </article>
        </li>
        <li>
          <article>
            <p>Vestibulum</p>
            <h3 class="heading">Justo erat venenatis</h3>
            <p>Tempor sit amet ac nibh nullam mattis</p>
            <footer><a class="btn" href="#">Bibendum magna</a></footer>
          </article>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->