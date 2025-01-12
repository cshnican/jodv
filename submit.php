<?php
// Define the CSV file path
$file = 'submission.csv';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $author = $_POST['author'];
    $drink = $_POST['drink'];
    $recipe = $_POST['recipe'];

    // Open CSV file for writing (append mode)
    $fp = fopen($file, 'a');

    if (!empty($author) && !empty($drink) && !empty($recipe)) {
        fputcsv($fp, [$author, $drink, $recipe]);
    } else {
        die("Error: All fields are required.");
    }    

    // Close the file
    fclose($fp);

    // Redirect back to the form or show a success message
    echo "Your submission has been saved. 
    <p>Authors: $author</p>
    <p>Name: $drink</p>
    <p>Recipe: $recipe</p>
    <a href='submit.html'>Go back</a>";
}
?>
