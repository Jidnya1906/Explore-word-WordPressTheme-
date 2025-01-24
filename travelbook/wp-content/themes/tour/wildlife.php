<?php
/**
 * The template for displaying the veg thali recipe page
 *
 * @package boot
 */
require_once('../../../wp-blog-header.php');
get_header();
?>
<style>
    .Wildlife{
        background-color:#202936;
    }
</style>
<!-- Header Section -->
<header class="bg-light text-center py-5" style=" background-image: url('imgs/image 10.png');
    background-size: cover;
    background-position: center;">
    <div class="container header-content">
        <h1 class="display-4">Explore The Wonderful World</h1>
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button class="srch btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>
        <div class="btn-group" role="group">
            <button onclick="window.location.href='http://localhost/travelbook/'" type="button" class="btn Culture tabs btn-outline-primary">Culture</button>
            <button onclick="window.location.href='<?php echo get_template_directory_uri().'/nature.php'; ?>'" type="button" class="btn Nature tabs btn-outline-primary">Nature</button>
            <button onclick="window.location.href='<?php echo get_template_directory_uri().'/wildlife.php';?>'" type="button" class="btn Wildlife tabs btn-outline-primary">Wildlife</button>
            <button onclick="window.location.href='<?php echo get_template_directory_uri().'/adventure.php';?>'" type="button" class="btn Adventure tabs btn-outline-primary">Adventure</button>
        </div>
    </div>
</header>
<div class="container">
    <h2 class="text-center mt-4">Beautiful Cultural Places</h2>
    <div class="testimonial-container">
        <div class="testimonial-slider" id="testomonial-slider">
        </div>
        <button class="slid-btn prev">❮</button>
        <button class="slid-btn next">❯</button>
    </div>
</div>
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Top places</h2>
        <div class="row">
            <div class="gallery">
                <div class="image-container">
                    <img src="imgs/image 60.png" alt="Image 1" class="image">
                    <div class="overlay">Raigad</div>
                </div>
                <div class="image-container">
                    <img src="imgs/image 61.png" alt="Image 2" class="image">
                    <div class="overlay"> Dibang Wildlife Sanctuary</div>
                </div>
                <div class="image-container">
                    <img src="imgs/fssa.png" alt="Image 3" class="image">
                    <div class="overlay">Ram Mandir</div>
                </div>
                <div class="image-container">
                    <img src="imgs/image 62.png" alt="Image 4" class="image">
                    <div class="overlay">Mundanthurai Wildlife Sanctuary</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
<script>
    // Call fetchData function after the page has loaded
    document.addEventListener('DOMContentLoaded', function() {
        let filename=`<?php echo get_template_directory_uri() . '/fetchmaster.php'; ?>`;
        let filepath=`<?php echo get_template_directory_uri().'/'; ?>`;
        console.log(filename);
        fetchData("Wildlife",filename,filepath);
    });
</script>