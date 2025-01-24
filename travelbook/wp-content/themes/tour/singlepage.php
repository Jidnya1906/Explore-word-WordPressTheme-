<?php
/**
 * The template for displaying the veg thali recipe page
 *
 * @package boot
 */
require_once('../../../wp-blog-header.php');
get_header();
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
        <i class="fas back fa-backward"></i>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class=" mt-4"><span id="title"></span></h2>
        </div>
        <div class="col-md-6">
            <div id="imgone"></div>
            <!-- <img class="single-img" src="imgs/image 38 (2).png" alt=""> -->
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div id="imgtwo"></div>
                    <!-- <img class="single-img" src="imgs/image 41.png" alt=""> -->
                </div>
                <div class="col-md-6">
                    <div id="imgthree"></div>
                    <!-- <img class="single-img" src="imgs/image 40.png" alt=""> -->
                </div>
                <div class="col-md-6">
                    <div id="imgtfour"></div>
                     <!-- <img class="single-img" src="imgs/image 42.png" alt=""> -->
                </div>
                <div class="col-md-6">
                    <div id="imgtfive"></div>
                    <!-- <img class="single-img" src="imgs/image 39.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
        <p class="card-text" id="description">
            <!-- Raigad Fort can be reached by road, rail or air. The nearest airport is Pune International Airport, which is about 140 km from the fort. From there, one can take a taxi or a bus to Mahad town and then hire a local vehicle to reach the base of the fort. Alternatively, one can also take a flight to Mumbai International Airport, which is about 170 km from the fort, and then follow the same route.
            The nearest railway station is Veer Railway Station, which is about 40 km from the fort. From there, one can take a bus or a taxi to Mahad town and then hire a local vehicle to reach the base of the fort.
            The fort can also be reached by road from Pune or Mumbai via NH-4 or NH-17. The road condition is good but may be crowded during peak hours or weekends. There are many signboards and directions along the way to guide the travellers. -->

        </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="reserve">
                <h4>Group Tour</h4>
                <div class="details">
                    <i class="far fa-clock"></i><span id="clock"></span>
                </div>
                <div class="details">
                    <i class="fas fa-user-astronaut"></i><span>Guide: English, Marathi, Hindi</span>
                </div>
                <div class="details">
                    <i class="fas fa-map-marker-alt"></i><span id="pickup"></span>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <h6>Starting time</h6>
                        <p class="card-text" id="time">6:00 AM</p>
                    </div>
                    <div class="col-md-5">
                        <h6>Price </h6>
                        <p class="card-text">Adult<span id="padult"></span></p>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <i class="fas fa-wallet"></i> <span>You can reserve now & pay later</span>
                </div>
                <div class="col-md-12">
                    <div class="action">
                        <button class="act-btn" id="addtocard">Add to card</button>
                        <button class="act-btn" id="booknow">BOOK NOW</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="iframe">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3789.200382850203!2d73.67963787441269!3d18.246633382794617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc28fa3eb07c019%3A0xe2f323ba03aacd31!2sRajgad%20Fort!5e0!3m2!1sen!2sin!4v1720206331805!5m2!1sen!2sin" width="600" height="310" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
<script>
    var storedId = localStorage.getItem('viewmore_id');
    console.log('Stored id:', storedId);
    let filepath=`<?php echo get_template_directory_uri().'/'; ?>`;
    fetchDetails(storedId,filepath);
    $('#addtocard').on('click',function()
    {
        addtocart(storedId,filepath);
    });

    $('#booknow').on('click',function()
    {
        booknow(storedId,filepath);
    });
</script>
