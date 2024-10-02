<?php
// Include PHPExcel library (make sure to install it via composer or download)
// require 'path/to/PHPExcel.php'; // Adjust the path as necessary

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require 'vendor/autoload.php'; // Include the Composer autoload file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $attendees = intval($_POST['attendees']);

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $sheet->setCellValue('A1', 'Full Name');
    $sheet->setCellValue('B1', 'Phone Number');
    $sheet->setCellValue('C1', 'Number of Attendees');

    // Set data
    $sheet->setCellValue('A2', $name);
    $sheet->setCellValue('B2', $phone);
    $sheet->setCellValue('C2', $attendees);

    // Create a file name with the current timestamp
    $fileName = 'registration_' . time() . '.xlsx';

    // Save the spreadsheet to a file
    $writer = new Xlsx(Sheet1);
    $writer->save(event);

    // Redirect to a success page or display a success message
    echo "<h2>Registration Successful!</h2>";
    echo "<p>Your details have been saved. <a href='F:\Dustlit\Solar-Observation-main\Solar Observation\event.xlsx'>event</a>.</p>";
} else {
    // If the request method is not POST, redirect back to the form
    header('Location: index.html');
    exit();
}
?>
