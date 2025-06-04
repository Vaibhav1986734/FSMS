<?php
// Define the API endpoint
$url = 'http://localhost:5000/predict';

// Sample data to send to the model
$data = [
    'Quantity_Sold' => 500,
    'Price' => 2,
    'Stock_Available' => 800,
    'Shelf_Life_days' => 10,
    'Weather_Temperature_C' => 15,
    'Holiday' => 0,  // 0 for false, 1 for true
    'Region' => 'North', // Adjust based on your model's needs
    'Lead_Time_days' => 2,
];

// Initialize cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Decode the JSON response
$result = json_decode($response, true);

// Check for errors
if ($http_code !== 200) {
    // Provide more detailed error information
    echo "Error: " . ($result['error'] ?? 'An unknown error occurred. Response: ' . json_encode($response));
} elseif (isset($result['prediction'])) {
    echo "Predicted value: " . implode(", ", $result['prediction']);
} else {
    echo "Error in prediction. Response: " . json_encode($result);
}
?>
