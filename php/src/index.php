<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/handle_api.php';

/**
 * Run only one time to insert data
 */
//insert_data();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tutorial</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
  <!-- CSS -->
  <link href="/style.css" rel="stylesheet">
  <meta name="robots" content="noindex,follow"/>

</head>

<body>

<main class="main">
  <input type="text" id="search" placeholder="Search"/>
  <div id="display"></div>
</main>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
<script src="/script.js" charset="utf-8"></script>
</body>
</html>