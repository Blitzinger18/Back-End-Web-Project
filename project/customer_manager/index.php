<?php
require('../model/database_pdo.php');
require('../model/customer_db.php');
require('../model/country_db.php');
//require('../model/technician.php');
require('../model/technician_db.php');
require('../model/incident_db.php');
require('../model/fields.php');
require('../model/validate.php');
require('../technician_manager/database_oo.php');
require('../technician_manager/technician.php');

$db = new database();
$db = $db->connect();


// Create Validate object
/*$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('postal_code');
$fields->addField('phone');
$fields->addField('email');
$fields->addField('password');*/

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'view_login';
    }
}

//instantiate variable(s)
$last_name = '';
$customers = array();

$email = '';

switch ($action) {

case 'display_login':
        include('tech_login.php');
        break;
   /* case 'display_register':
        // If customer is not in the session, set it in the session
        if (!isset($_SESSION['customer'])) {
            $email = filter_input(INPUT_POST, 'email');
            $customer = get_customer_by_email($email);
            $_SESSION['customer'] = $customer;
        }

        $customer = $_SESSION['customer'];
        //$products = get_products();
        include('customer_search.php');
        break;*/

        case 'view_login':
        $email = '';
        $password = '';
        include('tech_login.php');
        break;

        case 'delete_technician':
        $technician_id = filter_input(INPUT_POST, 'technician_id', FILTER_VALIDATE_INT);
        header("Location: .");
        delete_technician($technician_id);
        break;

    

        case'update_technician':
        $technician_id = filter_input(INPUT_POST, 'technician_id', FILTER_VALIDATE_INT);
        $grade = filter_input(INPUT_POST, 'grade');
        header("Location: .");
        update_technician($technician_id, $grade);
        break;

    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if (!empty($email) && !empty($password) && is_valid_customer_login($email, $password)) {
            $_SESSION['customer'] = get_customer_by_email($email);
            $customer_name = $_SESSION['customer']['firstName'] . ' ' .
                             $_SESSION['customer']['lastName'];
            $customer_id = $_SESSION['customer']['customerID'];

            $technicians = get_technicians();
            include('../technician_manager/technician_list2.php');


        } else {
            $error_message = 'Login failed. Missing or invalid email/password.';
            $password = '';
            include('tech_login.php');
        }
        break;





    case 'returning_tech':
        $email = $_SESSION['customer']['email'];
        $password = $_SESSION['customer']['password'];
        if (!empty($email) && !empty($password) && is_valid_customer_login($email, $password)) {
            $_SESSION['tech_user'] = get_customer_by_email($email);
            $customer_name = $_SESSION['customer']['firstName'] . ' ' .
                             $_SESSION['customer']['lastName'];
            $customer_id = $_SESSION['customer']['customerID'];

            $technicians = get_technicians();
            include('../technician_manager/technician_list2.php');

        } else {
            $error_message = 'Login failed. Missing or invalid email/password.';
            $password = '';
            session_destroy();
            include('tech_login.php');
        }






    /*case 'search_customers':
        include('customer_search.php');
        break;
    case 'display_customers':
        $last_name = filter_input(INPUT_POST, 'last_name');
        if (empty($last_name)) {
            $message = 'You must enter a last name.';
        } else {
            $customers = get_customers_by_last_name($last_name);
        }
        include('customer_search.php');
        break;*/
    /*case 'display_customer':
        $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
        $customer = get_customer($customer_id);

        // Get data from $customer array
        $first_name = $customer['firstName'];
        $last_name = $customer['lastName'];
        $address = $customer['address'];
        $city = $customer['city'];
        $state = $customer['state'];
        $postal_code = $customer['postalCode'];
        $country_code = $customer['countryCode'];
        $phone = $customer['phone'];
        $email = $customer['email'];
        $password = $customer['password'];

        $countries = get_countries();
        include('customer_display.php');
        break;
    case 'update_customer':
        // Get data from POST request
        $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $postal_code = filter_input(INPUT_POST, 'postal_code');
        $country_code = filter_input(INPUT_POST, 'country_code');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        // Validate form data
        $validate->text('first_name', $first_name, true, 1, 50);
        $validate->text('last_name', $last_name, true, 1, 50);
        $validate->text('address', $address, true, 1, 50);
        $validate->text('city', $city, true, 1, 50);
        $validate->text('state', $state, true, 1, 50);
        $validate->text('postal_code', $postal_code, true, 1, 20);
        $validate->phone('phone', $phone, true, 1, 20);
        $validate->email('email', $email, true, 1, 50);
        $validate->password('password', $password, true, 1, 20);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            $countries = get_countries();
            include('customer_display.php');
        } else {
            update_customer($customer_id, $first_name, $last_name,
                    $address, $city, $state, $postal_code, $country_code,
                    $phone, $email, $password);
            include('customer_search.php');
        }
        break;

        case 'display_register':
        include('customer_display.php');*/
        break;
}
?>