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
        .cart-table th, .cart-table td {
            vertical-align: middle;
        }
        .cart-table img {
            width: 50px;
            height: auto;
        }
        .cart-totals {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .cart-totals h4 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
    </style>
<div class="container mt-5">
    <h2 class="mb-4">Cart</h2>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered cart-table">
                <thead>
                <tr>
                    <th>Tour Name</th>
                    <!-- <th>Description</th> -->
                    <th>Location</th>
                    <th>Remove</th>
                    <th>Book Now</th>
                </tr>
                </thead>
                <tbody id="cardData">
                    <!-- <tr>
                        <td> Ram Mandir </td>
                        <td>Many Hindus believe that it is located at the site of Ram Janmabhoomi.</td>
                        <td>Faizabad, Ayodhya, Uttar Pradesh</td>
                    </tr>
                    <tr>
                        <td>Ram Mandir </td>
                        <td>Many Hindus believe that it is located at the site of Ram Janmabhoomi.</td>
                        <td>Faizabad, Ayodhya, Uttar Pradesh</td>
                        <td><button class="btn btn-success btn-block"> <a href="checkout.php">Proceed to checkout</a> </button></td>
                        <td><button class="btn btn-success btn-block"> <a href="checkout.php">Proceed to checkout</a> </button></td>
                    </tr> -->
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
            <!-- <button class="btn btn-success btn-block"> <a href="checkout.php">Proceed to checkout</a> </button> -->
            </div>
        </div>
        
    </div>
</div>
<?php
get_footer();
?>
<script>
    // Call fetchData function after the page has loaded
    document.addEventListener('DOMContentLoaded', function() {
        let filename=`<?php echo get_template_directory_uri() . '/fetchmaster.php'; ?>`;
        let filepath=`<?php echo get_template_directory_uri().'/'; ?>`;
        console.log(filename);
        fetchCartData(filepath);
    });
</script>
