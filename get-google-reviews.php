<?php
// Replace with your Google API Key and Place ID
$apiKey = "YOUR_GOOGLE_API_KEY";
$placeId = "YOUR_PLACE_ID";

// URL for the Google Places API
$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=reviews&key={$apiKey}";

// Fetch data from Google Places API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Check if data and reviews are available
if (isset($data['result']['reviews']) && is_array($data['result']['reviews'])) {
    echo "<h2>Google Reviews</h2>";
    echo "<ul>";

    // Loop through reviews and display them
    foreach ($data['result']['reviews'] as $review) {
        echo "<li>";
        echo "<p><strong>" . htmlspecialchars($review['author_name']) . "</strong> rated " . htmlspecialchars($review['rating']) . "/5</p>";
        echo "<p>" . htmlspecialchars($review['text']) . "</p>";
        echo "<p><em>Posted on: " . date("F j, Y", strtotime($review['time'])) . "</em></p>";
        echo "</li>";
    }

    echo "</ul>";
} else {
    echo "<p>No reviews available.</p>";
}
?>
