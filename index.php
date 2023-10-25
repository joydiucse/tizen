<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig('client_secret_1062878936543-o4b4nvf8dqrddn5hn2b0f1b22lfh990t.apps.googleusercontent.com.json');
$client->setRedirectUri('http://localhost/');
$client->addScope('https://www.googleapis.com/auth/calendar'); // Adjust the scope for your needs

if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
} else {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $accessToken = $client->getAccessToken();
    var_dump($accessToken); // Access token and related information
}
?>

<?php
exit;
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig('bigquery-service-account.json');
$client->addScope('https://www.googleapis.com/auth/drive'); // Adjust the scope for your needs
$client->setRedirectUri('https://j1-staging.toffeelive.com/'); // Your authorized redirect URI

if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
} else {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $accessToken = $client->getAccessToken();
    var_dump($accessToken); // Access token and related information
}
?>












<?php
exit;
require 'vendor/autoload.php'; // Path to the Composer autoloader

//use Google\Cloud\BigQuery\BigQueryClient;

// Create a BigQuery client with the JSON key file
$bigQuery = new BigQueryClient([
    'keyFile' => json_decode(file_get_contents('bigquery-service-account.json'), true)
]);

// Specify the dataset and table where you want to insert data
$datasetId = 'iptv';
$tableId = 'current_viewers_heartbeat';

$dataset = $bigQuery->dataset($datasetId);
$table = $dataset->table($tableId);

// Define the data you want to insert
$data = [
    'id' => '16974560268219',
    'customer_id' => '50014510',
    'device_type' => 3,
    'session_token' => 'xCQGkhZ9H4JYvcLPkY9vvWeeroz3T2L8h7eOjygPlfFDthwl7iISKemvpFIswgaWX5U0HlBr6D72Ifs3LQ3/cg==',
    'content_id' => 2418,
    'content_type' => 'LIVE',
    'os_name' => 'Windows',
    'app_version' => '4.1.0',
    'net_type' => 'WIFI',
    'is_bl_number' => 0,
    'lat' => 23.746,
    'lon' => 90.382,
    'partitioned_at' => '2023-10-16',
    'date_time' => '2023-10-16T17:33:46',
    'synced_at' => '2023-10-16 17:33:46',
    'deviceId' => '05885247a2ab7f19693c1cbe20012d6a',
    'data_source' => 'iptv_programs',
    'channel_owner_id' => 6417137,
];

// Insert the data
$table->insertRows([
    ['data' => $data]
]);

echo 'Data inserted successfully.';
?>
