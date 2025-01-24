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
    body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: white;
    width: 80%;
    max-width: 900px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    display: flex;
}
.header{
    display: none;
}
</style>
<div class="container">
        <div class="form-container">
            <div class="image-container1">
                <img src="<?php echo get_template_directory_uri(); ?>/imgs/2293.jpg" alt="Placeholder Image">
            </div>
            <div class="form-wrapper">
                <!-- <form id="login-form" class="form visible"> -->
                <div id="login-form" class="form visible">
                    <h2>Register your account</h2>
                    <div class="input-group">
                        <label for="login-username">Name</label>
                        <input type="text" id="login-username" required>
                    </div>
                    <div class="input-group">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" required>
                    </div>
                    <div class="input-group">
                        <label for="login-mobile">Mobile No</label>
                        <input type="text" id="login-mobile" required>
                        <p style="color:red; font-size:10px" id="mobile-error"></p>
                    </div>
                    <div class="input-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" required>
                    </div>
                    <div class="input-group">
                        <label for="login-password">Confirm Password</label>
                        <input type="password" id="cmp-cpassword" required>
                    </div>
                    <button class="profile" id="submit">SignUp</button>
                    <p class="toggle-form">Already Registered? <a href="<?php echo get_template_directory_uri(); ?>/login.php">Sign In</a></p>
                    <center><p><a href="http://localhost/travelbook/">Home</a></p></center>
                </div>
                <!-- </form> -->
            </div>
        </div>
        <script>
            $('input').focus(function() {
                $(this).css("border", "");
                $('#mobile-error').html();
            });
            $('#submit').on('click',function()
            {
                var username=$('#login-username').val();
                var email=$('#login-email').val();
                var mobile=$('#login-mobile').val();
                var password=$('#login-password').val();
                var conformpassword=$('#cmp-cpassword').val();
                var feilds=['#login-username','#login-email','#login-mobile','#login-password','#cmp-cpassword'];
                for(var i=0;i<feilds.length; i++)
                {
                    if($(feilds[i]).val()=='')
                    {
                        $(feilds[i]).css("border","1px solid red");
                        return
                    }
                }
                if(password !=conformpassword)
                {
                    alert('Password Not Match');
                    return
                }
                let filepath='<?php echo get_template_directory_uri().'/'; ?>';
                let log = $.ajax({
                    url: filepath+'fetchmaster.php',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        userdata:{
                            name:username,
                            email:email,
                            mobile:mobile,
                            password:password,
                        }
                    },
                    success: function(data)
                    {
                        if(data.status=='error')
                        {
                            $('#login-mobile').css("border","1px solid red");
                            $('#mobile-error').html('Mobile Already Existed');
                        }else
                        {
                            alert('Registered Succefully!');
                            window.location=filepath+'login.php';
                        }
                    }
                });
                console.log(log);
            })
        </script>
    </div>