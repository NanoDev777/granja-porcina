<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel + Vue.js</title>
    {!! Html::style('css/app.css') !!}
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app"></div>
    <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
    </script>
    {!! Html::script('js/app.js') !!}
  </body>
</html>