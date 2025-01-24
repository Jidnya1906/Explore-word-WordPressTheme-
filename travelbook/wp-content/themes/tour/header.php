<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tour
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- custom -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Tour</title>
    <!-- Add Bootstrap JS and jQuery -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container header">
    <div class="row">
        <div class="col-md-6">
            <div class="logo">
                <h3 class="lgo"> <a href="http://localhost/travelbook/" style="color:red;">Explore World</a>   </h3>
            </div>
        </div>
            <div class="col-md-6">
                <div class="main-header">
                    <div class="menu">
                        <center>
                            <a href="wishlist.php">
                                <i class="icns fas fa-heart"></i><br>
                                <b class="menu-names">Wishlist</b>
                            </a>
                        
                        </center>
                    </div>
                    <div class="menu">
                        <center>
                            <a href="<?php echo get_template_directory_uri(); ?>/cart.php">
                                <i class="icns fas fa-cart-plus"></i><br>
                                <b class="menu-names">Cart</b>
                            </a>
                            
                        </center>
                    </div>
                    <div class="menu">
                        <center>
                            <a href="<?php echo get_template_directory_uri(); ?>/login.php">
                                <i class="icns fas fa-user"></i><br>
                                <b class="menu-names">Login</b>
                            </a>
                            
                        </center>
                    </div>
                    <div class="menu">
                        <center>
                            <a href="profile.php">
                                <i class="icns fas fa-user"></i><br>
                                <b class="menu-names">Profile</b> 
                            </a>
                            
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
