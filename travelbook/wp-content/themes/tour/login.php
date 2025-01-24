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
<body>
<div class="container">
    <div class="form-container">
        <div class="image-container1">
            <img src="<?php echo get_template_directory_uri(); ?>/imgs/2293.jpg" alt="Placeholder Image">
        </div>
        <div class="form-wrapper">
            <!-- <form id="login-form" class="form visible"> -->
            <div id="login-form" class="form visible">
                <h2>Login</h2>
                <div class="input-group">
                    <label for="login-username">Mobile</label>
                    <input type="text" id="login-username" required>
                </div>
                <div class="input-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" required>
                </div>
                <p style="color:red; font-size:10px" id="login-error"></p>
                <button class="profile" type="submit" id="submit">Login</button>
                <p class="toggle-form">Don't have an account? <a href="<?php echo get_template_directory_uri(); ?>/signup.php">Sign Up</a></p>
            <center><p><a href="http://localhost/travelbook/">Home</a></p></center>
            <!-- </form> -->
        </div>
        </div>
    </div>

    <script>
        $('input').focus(function() {
            $(this).css("border", "");
            $('#login-error').html();
        });

        $('#submit').on('click',function()
        {
            let filepath='<?php echo get_template_directory_uri().'/'; ?>';
            var mobile=$('#login-username').val();
            var password=$('#login-password').val();
            var feilds=['#login-username','#login-password'];
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
                    logindata:{
                        mobile:mobile,
                        password:password,
                    }
                },
                success: function(data)
                {
                    console.log(data);
                    if(data.status=='error')
                    {
                        $('#login-username').css("border","1px solid red");
                        $('#login-password').css("border","1px solid red");
                        $('#login-error').html('Invalid Email Or Password');
                    }else
                    {
                        alert('Login Succefully!');
                        window.location='http://localhost/travelbook/';
                    }
                }
            });
            console.log(log);
        })
    </script>
</div>