<head>
<title>500 Internal Server Error</title>
</head>
<body>
<h1>500 Internal Server Error</h1>
<h2><?php echo get_class($error)?> <?php echo $error->getMessage()?></h2>
<pre>
<?php echo $error->getTraceAsString()?>
</pre>
</body>