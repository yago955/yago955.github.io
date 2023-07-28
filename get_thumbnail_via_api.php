<?php
if (isset($_GET['video_id'])) {
    $videoId = $_GET['video_id'];
    $apiKey = 'AIzaSyCO8xnHoolwG4OKvabTmvY70GnY0C-P2hE';

    // YouTube Data API endpoint to get video details including thumbnail
    $apiEndpoint = "https://www.googleapis.com/youtube/v3/videos?id={$videoId}&key={$apiKey}&part=snippet";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL session and get the JSON response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $data = json_decode($response, true);

    // Extract the thumbnail URL from the JSON response
    if (isset($data['items'][0]['snippet']['thumbnails']['default']['url'])) {
        $thumbnailUrl = $data['items'][0]['snippet']['thumbnails']['default']['url'];
        echo $thumbnailUrl; // Return the thumbnail URL
    } else {
        // If thumbnail URL is not found, return a default URL or an error message
        echo 'Thumbnail not found';
    }
} else {
    // If video ID is not provided, return an error message
    echo 'Video ID is missing';
}
?>
