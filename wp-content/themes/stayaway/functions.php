<?php
// regsiration
add_action('rest_api_init', 'ubAddUser');
function ubAddUser()
{
    register_rest_route('ub/v1', 'ubAddUser', array(
        'methods' => 'POST',
        'callback' => 'ubAddUserImplementation',
        'permission_callback' => '__return_true'
    ));
}
function ubAddUserImplementation($request)
{
    $name = $request->get_param('name');
    $username = $request->get_param('username');
    $email = $request->get_param('email');
    $password = $request->get_param('password');

    // Create the user
    $user_data = array(
        'user_login' => $username,
        'user_pass' => $password,
        'user_email' => $email,
        'display_name' => $name,
    );

    $user_id = wp_insert_user($user_data);

    if (is_wp_error($user_id)) {
        return $user_id;
    }

    // Get the created user
    $user = get_user_by('ID', $user_id);

    // Return the user data
    return $user;
}


// Login user
add_action('rest_api_init', 'loginUserWithTokenRoute');

function loginUserWithTokenRoute()
{
    register_rest_route('ub/v1', 'login-user-with-token', array(
        'methods' => 'POST',
        'callback' => 'loginUserWithToken',
    ));
}

function loginUserWithToken($request)
{
    $params = $request->get_params();

    $credentials = array(
        'user_login' => $params['username'],
        'user_password' => $params['password'],
    );

    $user = wp_signon($credentials, false);

    if (is_wp_error($user)) {
        return new WP_Error('login_failed', 'Invalid username or password.', array('status' => 401));
    }

    // Set authentication cookie manually
    wp_set_auth_cookie($user->ID, true, false);

    // Generate a token for the user
    $token = wp_generate_auth_cookie($user->ID, 86400 * 30, 'auth');

    if (!$token) {
        return new WP_Error('token_generation_failed', 'Failed to generate token.', array('status' => 500));
    }

    // Prepare the response
    $response = array(
        'user' => $user,
        'token' => $token
    );

    return $response;
}



// Login user
add_action('rest_api_init', 'getFuelPrice');

function getFuelPrice()
{
    register_rest_route('ub/v1', 'getFuelPrice', array(
        'methods' => 'GET',
        'callback' => 'getFuelPriceImplementation',
    ));
}

function getFuelPriceImplementation()
{
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    $url = 'https://www.psopk.com/';
    // Initialize cURL session
    $curl = curl_init();

    // Set cURL options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Check if "HTTP_USER_AGENT" header is set
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    }
    // Disable SSL/TLS verification (not recommended in production)
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // Execute the cURL request
    $html = curl_exec($curl);
    // Check for cURL errors
    if ($html === false) {
        echo "cURL Error: " . curl_error($curl);
    } else {
        // Create a DOMDocument and load the HTML content
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML parsing errors
        $dom->loadHTML($html);
        libxml_clear_errors();
        // Create a DOMXPath instance
        $xpath = new DOMXPath($dom);
        // Find the element with class name "fptitle"
        $elements = $xpath->query("//*[contains(@class, 'fptitle')]");
        // Check if the element exists and retrieve its content
        if ($elements->length > 0) {
            $textContent = '';
            foreach ($elements as $element) {
                $textContent .= $element->textContent;
            }
            return $textContent;
        } else {
            return "fptitle element not found.";
        }
    }
    // Close cURL session
    curl_close($curl);
}
