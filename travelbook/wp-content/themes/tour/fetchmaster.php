<?php
session_start();
require_once('../../../wp-load.php');
/*
Plugin Name: Fetch master
Description: Fetches data from the database and returns it in JSON format
*/

function fetch_data() {
    global $wpdb;
    // Query the database
    $query = "SELECT * FROM `tourdetails`";
    $results = $wpdb->get_results($query, ARRAY_A);

    // Return the data in JSON format
    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}

// Check if the request is an AJAX request
if (isset($_POST['action']) && $_POST['action'] == 'fetch_data') {
    fetch_data();
}

if (isset($_POST['viewid'])) {
    global $wpdb;
    $viewid = $_POST['viewid'];
    $query = $wpdb->prepare("SELECT * FROM `tourdetails` WHERE `id` = %d", $viewid);
    $results = $wpdb->get_results($query, ARRAY_A);

    // Return the data in JSON format
    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}

if (isset($_POST['userdata'])) 
{
    global $wpdb;
    $userdata = $_POST['userdata'];
    $username = $userdata['name'] ?? '';
    $email = $userdata['email'] ?? '';
    $mobile = $userdata['mobile'] ?? '';
    $password = $userdata['password'] ?? '';

    $sql_check = $wpdb->prepare("SELECT id FROM `user` WHERE mobile = %s", $mobile);
    $result_check = $wpdb->get_results($sql_check);

    if (!empty($result_check)) {
        $response = [
            'status' => 'error',
            'message' => 'Mobile number already exists'
        ];
    } else {
        $sql_insert = $wpdb->prepare("INSERT INTO `user` (`name`, `email`, `mobile`) VALUES (%s, %s, %s)", $username, $email, $mobile);
        $insert_result = $wpdb->query($sql_insert);

        if ($insert_result === false) {
            $response = [
                'status' => 'error',
                'message' => 'Error inserting user data: ' . $wpdb->last_error
            ];
        } else {
            $last_insert_id = $wpdb->insert_id;
            $sql_insert_login = $wpdb->prepare("INSERT INTO `login` (`userid`, `mobile`, `pass`) VALUES (%d, %s, %s)", $last_insert_id, $mobile, $password);
            $insert_login_result = $wpdb->query($sql_insert_login);

            if ($insert_login_result === false) {
                $response = [
                    'status' => 'error',
                    'message' => 'Error inserting login data: ' . $wpdb->last_error
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'User data inserted successfully',
                    'data' => [
                        'name' => $username,
                        'email' => $email,
                        'mobile' => $mobile
                    ]
                ];
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

if (isset($_POST['logindata'])) {
    global $wpdb;
    $userdata = $_POST['logindata'];
    $mobile = $userdata['mobile'] ?? '';
    $password = $userdata['password'] ?? '';

    $sql_check = $wpdb->prepare("SELECT userid FROM `login` WHERE mobile = %s AND pass = %s", $mobile, $password);
    $result_check = $wpdb->get_results($sql_check);

    if (!empty($result_check)) 
    {
        $row = $result_check[0];

        $_SESSION['loggedin'] = true;
        $userid = $row->userid;
        $_SESSION['userid'] = $userid;

        $response = [
            'status' => 'success',
            'message' => 'Login successful',
            'id' => $userid,
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Invalid mobile number or password'
        ];
    }

    // header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

if (isset($_POST['addtocart'])) {
    global $wpdb;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        $addtocart = $_POST['addtocart'];
        $id = $_SESSION['userid'];

        // Corrected SQL query
        $sql_check = $wpdb->prepare("SELECT `tourid` FROM `cart` WHERE `tourid` = %d AND `userid`= %d", $addtocart,$id);
        $result_check = $wpdb->get_results($sql_check);

        if (!empty($result_check)) {
            $response = [
                'status' => 'error',
                'message' => 'This tour is already in your cart',
            ];
        } else {
            $sql_insert_cart = $wpdb->prepare("INSERT INTO `cart` (`userid`, `tourid`) VALUES (%d, %d)", $id, $addtocart);
            $insert_cart_result = $wpdb->query($sql_insert_cart);

            if ($insert_cart_result === false) {
                $response = [
                    'status' => 'error',
                    'message' => 'Error inserting cart data: ' . $wpdb->last_error
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Tour added to cart successfully',
                ];
            }
        }
        echo json_encode($response);
        exit;
    }else
    {
        $response = [
            'status' => 'error',
            'message' => 'You must be logged in to add items to the cart',
        ];
    }
}


if (isset($_POST['fetchCardData'])) 
{
    global $wpdb;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) 
    {
        $id = $_SESSION['userid'];
        $query = $wpdb->prepare("SELECT `cart`.*,`tourdetails`.`title`,`tourdetails`.`location`,`tourdetails`.`amount`,`tourdetails`.`advance` FROM `cart`,`tourdetails` WHERE `cart`.`tourid`=`tourdetails`.`id` AND `cart`.`userid`=%d",$id);
        $results = $wpdb->get_results($query, ARRAY_A);
    }else
    {
        $response = [
            'status' => 'error',
            'message' => 'You must be logged First',
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}


if (isset($_POST['removecard'])) 
{
    global $wpdb;
    $id = $_POST['removecard'];
    $sql_delete = $wpdb->prepare("DELETE FROM `cart` WHERE `id` = %d", $id);
    $delete_result = $wpdb->query($sql_delete);

    if ($delete_result === false) {
        $response = [
            'status' => 'error',
            'message' => 'Error deleting item from cart: ' . $wpdb->last_error
        ];
    } else {
        $response = [
            'status' => 'success',
            'message' => 'Item removed from cart successfully',
        ];
    }
    echo json_encode($response);
    exit;
}



if (isset($_POST['bookdetails'])) {
    global $wpdb;
    $bookdetails = $_POST['bookdetails'];
    $query = $wpdb->prepare("SELECT * FROM `tourdetails` WHERE `id` = %d", $bookdetails);
    $results = $wpdb->get_results($query, ARRAY_A);

    // Return the data in JSON format
    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}


if (isset($_POST['paydata'])) 
{
    global $wpdb;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) 
    {
        $userid = $_SESSION['userid'];
        $userdata = $_POST['paydata'];
        $person = $userdata['person'] ?? '';
        $tourid = $userdata['tourid'] ?? '';
        $date = $userdata['date'] ?? '';
        $total = $userdata['total'] ?? '';
        $maintotal = $userdata['maintotal'] ?? '';
        $selectedPaymentMethod = $userdata['selectedPaymentMethod'] ?? '';
        $cardNumber = $userdata['cardNumber'] ?? '';
        $cardExpiry = $userdata['cardExpiry'] ?? '';
        $cardCVV = $userdata['cardCVV'] ?? '';
        $upiId = $userdata['upiId'] ?? '';
        $sql_insert = $wpdb->prepare(
            "INSERT INTO `bookdetails` (`userid`, `person`, `tourid`, `date`, `total`, `maintotal`, `pmode`, `cardNumber`, `cardExpiry`, `cardCVV`, `upiId`) 
            VALUES (%d, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s)",
            $userid, $person, $tourid, $date, $total, $maintotal, $selectedPaymentMethod, $cardNumber, $cardExpiry, $cardCVV, $upiId
        );
        $insert_result = $wpdb->query($sql_insert);

            if ($insert_result === false) {
                $response = [
                    'status' => 'error',
                    'message' => 'Error inserting booking data: ' . $wpdb->last_error
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Booking data inserted successfully',
                ];
            }
    }else
    {
        $response = [
            'status' => 'error',
            'message' => 'You must be logged First'
        ];
    }
    echo json_encode($response);
    exit;
}

?>
