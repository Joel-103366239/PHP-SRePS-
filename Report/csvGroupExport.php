<?php
session_start();
 include_once '../Database/connect.php';

 if(!isset($_SESSION['user'])){
    header("Location: ../Errors/loginError.php");
  }

 $sMonth = $_SESSION['month'];              // Getting Month
 $date = date("Y");                         // Getting Year
 $data = "PHP_Group_{$sMonth}_{$date}";     // Combining Month and Year to generate file name.


    header("Content-Type: text/csv; charset=utf-8"); // Specify file type.
    header("Content-Disposition: attachment; filename=$data.csv"); // Specify file name.
    $output = fopen("php://output", "w");
    fputcsv($output, array('Group', 'Quantity_Sold', 'Total_Sales (RM)'));
    $sql = "SELECT Group_Class, SUM(Quantity_Sold) AS Quant,  ROUND(SUM(Total_Sales),2) AS Sales FROM sales WHERE Month ='$sMonth' GROUP BY Group_Class ORDER BY SUM(Quantity_Sold) DESC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                fputcsv($output, $row);
            }
        }

        // For best and worst items.
        fputcsv($output, array("  ", " ")); // fputcsv needs array as second parameter.
        fputcsv($output, array("Best Group ", $_SESSION['best']));
        fputcsv($output, array("  ", " "));
        fputcsv($output, array("Worst Group ", $_SESSION['worst']));
        fclose($output);

?>