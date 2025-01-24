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
    .form-section {
        margin-bottom: 30px;
    }
    .order-table th, .order-table td {
        vertical-align: middle;
    }
    .order-table img {
        width: 50px;
        height: auto;
    }
    .order-summary {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
    }
    form {
        padding: 0 100px;
    }
</style>
<div class="container mt-5">
    <h2 class="mb-4">Checkout</h2>
    <!-- <form> -->

        <div class="form-section">
            <h4>Billing details</h4>
            <div class="form-group">
                <label for="person">No of Person <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="person" required>
            </div>
            <div class="form-group">
                <label for="person">Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="date" required>
            </div>
            
            
        </div>
        <div class="form-section order-summary">
            <h4>Your order</h4>
            <table class="table table-bordered order-table">
                <thead>
                <tr>
                    <th>Tour Name</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td id="tourname"></td>
                    <td id="amount"></td>
                </tr>
                <!-- <tr>
                    <td></td>
                    <td></td>
                </tr> -->
                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                    <td id="total"></td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod" checked>
                <label class="form-check-label" for="cod">
                    Cash on delivery
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="debitcard" value="debitcard">
                <label class="form-check-label" for="debitcard">
                    Debit card
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="upi" value="upi">
                <label class="form-check-label" for="upi">
                    UPI
                </label>
            </div>
        </div>

        <div id="debitCardFields" style="display: none;">
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber">
            </div>
            <div class="form-group">
                <label for="cardExpiry">Expiration Date</label>
                <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY">
            </div>
            <div class="form-group">
                <label for="cardCVV">CVV</label>
                <input type="text" class="form-control" id="cardCVV">
            </div>
        </div>

        <div id="upiFields" style="display: none;">
            <div class="form-group">
                <label for="upiId">UPI ID</label>
                <input type="text" class="form-control" id="upiId" placeholder="e.g., yourname@bank">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block" id="placeorder">Place order</button>
    <!-- </form> -->
</div>

<?php
get_footer();
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const debitCardRadio = document.getElementById('debitcard');
    const codRadio = document.getElementById('cod');
    const upiRadio = document.getElementById('upi');
    const debitCardFields = document.getElementById('debitCardFields');
    const upiFields = document.getElementById('upiFields');

    function togglePaymentFields() {
        if (debitCardRadio.checked) {
            debitCardFields.style.display = 'block';
            upiFields.style.display = 'none';
        } else if (upiRadio.checked) {
            upiFields.style.display = 'block';
            debitCardFields.style.display = 'none';
        } else {
            debitCardFields.style.display = 'none';
            upiFields.style.display = 'none';
        }
    }

    debitCardRadio.addEventListener('change', togglePaymentFields);
    codRadio.addEventListener('change', togglePaymentFields);
    upiRadio.addEventListener('change', togglePaymentFields);

    togglePaymentFields();
});
</script>
<script>
    // Call fetchData function after the page has loaded
    document.addEventListener('DOMContentLoaded', function() 
    {
        var storedId = localStorage.getItem('bookid');
        console.log('Stored id:', storedId);
        let filename=`<?php echo get_template_directory_uri() . '/fetchmaster.php'; ?>`;
        let filepath=`<?php echo get_template_directory_uri().'/'; ?>`;
        booklast(storedId,filepath);
    });

    $('#placeorder').on('click',function()
    {
        let filepath=`<?php echo get_template_directory_uri().'/'; ?>`;
        var storedId = localStorage.getItem('bookid');
        var person=$('#person').val();
        var date=$('#date').val();
        var total=$('#total').html();
        var maintotal=parseFloat(person)*parseFloat(total);
        var selectedPaymentMethod = $('input[name="paymentMethod"]:checked').val();
        // console.log('Selected Payment Method:', selectedPaymentMethod);

        if(selectedPaymentMethod=='cod')
        {
            var feilds=['#date'];
        }else if(selectedPaymentMethod=='debitcard')
        {
            var feilds=['#date','#cardNumber','#cardExpiry','#cardCVV'];
        }else
        {
            var feilds=['#date','#upiId'];
        }
        var cardNumber=$('#cardNumber').val();
        var cardExpiry=$('#cardExpiry').val();
        var cardCVV=$('#cardCVV').val();
        var upiId=$('#upiId').val();

        for(var i=0;i<feilds.length; i++)
        {
            if($(feilds[i]).val()=='')
            {
                $(feilds[i]).css("border","1px solid red");
                return
            }
        }
        let log = $.ajax({
            url: filepath+'fetchmaster.php',
            type: "POST",
            dataType: 'json',
            data: {
                paydata:{
                    person:person,
                    tourid:storedId,
                    date:date,
                    total:total,
                    maintotal:maintotal,
                    selectedPaymentMethod:selectedPaymentMethod,
                    cardNumber:cardNumber,
                    cardExpiry:cardExpiry,
                    cardCVV:cardCVV,
                    upiId:upiId,
                }
            },
            success: function(data)
            {
                console.log(data);
                if(data.status=='error')
                {
                    alert(data.message);
                }else
                {
                    alert(data.message);
                    window.location=filepath+'nature.php';
                }
               
            }
        });
        console.log(log)
    });
</script>
