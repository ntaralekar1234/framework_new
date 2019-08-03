<!DOCTYPE html>
<html>
	<head>
		<title>
        <?php echo $layout_title; ?>
    </title>
	   <!--  <meta name="description" content="Latest updates and statistic charts">  -->
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	    <link href="https://fonts.googleapis.com/css?family=Poppins|Roboto" rel="stylesheet">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon/favicon.ico" />
	    <?php echo $this->layouts->print_css(); ?>

	</head>

		<?php
			echo $layout_content;
		?>

		<?php echo $this->layouts->print_js(); ?>
		<?php echo $this->layouts->print_custom_js(); ?>

</html>