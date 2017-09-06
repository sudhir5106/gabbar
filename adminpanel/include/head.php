<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adminpanel :: Website Portfolio </title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo PATH_CSS_LIBRARIES ?>/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo PATH_FONTS ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="<?php echo PATH_CSS_LIBRARIES ?>/custom.css" rel="stylesheet">
  <link href="<?php echo PATH_CSS_LIBRARIES ?>/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" /> 
  <link href="<?php echo PATH_CSS_LIBRARIES ?>/animate.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo PATH_CSS_LIBRARIES ?>/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo PATH_CSS_LIBRARIES ?>/admin-style.css">
  
  <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="<?php echo PATH_JS_LIBRARIES ?>/jquery.js"></script>
    <script src="<?php echo PATH_JS_LIBRARIES ?>/jquery.validate.js"></script>
  <script src="<?php echo PATH_JS_LIBRARIES ?>/jquery-ui.js"></script>
  <script src="<?php echo PATH_JS_LIBRARIES ?>/tinymce/tinymce.min.js"></script>
  <script>
  tinymce.init({
  selector: '.tinymce',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
 </script>
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">