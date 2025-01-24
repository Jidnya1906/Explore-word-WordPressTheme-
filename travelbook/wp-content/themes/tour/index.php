<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tour
 */
get_header();
?>
<style>
    .Culture{
        background-color:#202936;
    }
</style>
<!-- Header Section -->
<header class="bg-light text-center py-5" style=" background-image: url('<?php echo get_template_directory_uri(); ?>/imgs/Background_Image.png');
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
<!-- Beautiful Cultural Places Section -->
 <div class="container">
    <h2 class="text-center mt-4">Beautiful Cultural Places</h2>
    <div class="testimonial-container">
        <div class="testimonial-slider" id="testomonial-slider">
            <!-- <div class="testimonial">
                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 59 (1).png" alt="">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <span class="heart">&#10084;</span>
                </button>
                <h5 class="card-title">Shivneri</h5>
                <p class="card-text">A 17th century fort, Shivneri is the birthplace of Shivaji Maharaj.</p>
                <p class="loc"> <i class="fas fa-map-marker-alt"></i><span class="locations">Location :Pune district, Maharashtra, IndiaParent range :Sahyadri Range</span></p>
                <a href="#" class="viewmore">View More</a>
            </div>
           
            <div class="testimonial">
                <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 59 (2).png" alt="">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <span class="heart">&#10084;</span>
                </button>
                <h5 class="card-title">Raigad</h5>
                <p class="card-text">An epoch-making fort in the history of Maharashtra.</p>
                <p class="loc"> <i class="fas fa-map-marker-alt"></i><span class="locations">Location :Pune district, Maharashtra, IndiaParent range :Sahyadri Range</span></p>
                <a href="#" class="viewmore">View More</a>
            </div>
           
            <div class="testimonial">
                <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 59 (3).png" alt="">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <span class="heart">&#10084;</span>
                </button>
                <h5 class="card-title">Ram Mandir</h5>
                <p class="card-text">Many Hindus believe that it is located at the site of Ram Janmabhoomi.</p>
                <p class="loc"> <i class="fas fa-map-marker-alt"></i><span class="locations">Faizabad, Ayodhya, Uttar Pradesh</span></p>
                <a href="#" class="viewmore">View More</a>
            </div>
        
            <div class="testimonial">
                <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 59.png" alt="">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <span class="heart">&#10084;</span>
                </button>
                <h5 class="card-title">Hawala Mahal</h5>
                <p class="card-text">A palace in the city of Jaipur, Rajasthan, India.</p>
                <p class="loc"> <i class="fas fa-map-marker-alt"></i><span class="locations">Location: Hawa Mahal Rd, J.D.A. Market, Jaipur, Rajasthan 302002</span></p>
                <a href="#" class="viewmore">View More</a>
            </div>
            <div class="testimonial">
                <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 59 (1).png" alt="">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <span class="heart">&#10084;</span>
                </button>
                <h5 class="card-title">Raigad</h5>
                <p class="card-text">An epoch-making fort in the history of Maharashtra.</p>
                <p class="loc"> <i class="fas fa-map-marker-alt"></i><span class="locations">Location :Pune district, Maharashtra, IndiaParent range :Sahyadri Range</span></p>
                <a href="#" class="viewmore">View More</a>
            </div>
           
            <div class="testimonial">
                <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 59 (1).png" alt="">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <span class="heart">&#10084;</span>
                </button>
                <h5 class="card-title" id="gallery">Ram Mandir</h5>
                <p class="card-text">Many Hindus believe that it is located at the site of Ram Janmabhoomi.</p>
                <p class="loc"> <i class="fas fa-map-marker-alt"></i><span class="locations">Faizabad, Ayodhya, Uttar Pradesh</span></p>
                <a href="#" class="viewmore">View More</a>
            </div> -->
        </div>
        <button class="slid-btn prev">❮</button>
        <button class="slid-btn next">❯</button>
    </div>
</div>


<!-- Top Places Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Top places</h2>
        <div class="row">
            <div class="gallery" >
                <div class="image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 60.png" alt="Image 1" class="image">
                    <div class="overlay">Raigad</div>
                </div>
                <div class="image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 61.png" alt="Image 2" class="image">
                    <div class="overlay"> Dibang Wildlife Sanctuary</div>
                </div>
                <div class="image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/fssa.png" alt="Image 3" class="image">
                    <div class="overlay">Ram Mandir</div>
                </div>
                <div class="image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/image 62.png" alt="Image 4" class="image">
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
    document.addEventListener('DOMContentLoaded', function() 
    {
        let filename=`<?php echo get_template_directory_uri() . '/fetchmaster.php'; ?>`;
        let filepath=`<?php echo get_template_directory_uri().'/'; ?>`;
        console.log(filename);
        fetchData("Culture",filename,filepath);
    });
</script>
