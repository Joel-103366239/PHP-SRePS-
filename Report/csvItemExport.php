<?php
session_start();
 include_once '../Database/connect.php';
 if(!isset($_SESSION['user'])){
    header("Location: ../Errors/loginError.php");
}

 $sMonth = $_SESSION['month'];               // Getting Month
 $date = date("Y");                          // Getting Year
 $data = "PHP_Item_{$sMonth}_{$date}";       // Combining Month and Year to generate file name.


    header("Content-Type: text/csv; charset=utf-8"); // Specify file type.
    header("Content-Disposition: attachment; filename=$data.csv"); // Specify file name.
    $output = fopen("php://output", "w");
    fputcsv($output, array('Item_Name', 'Quantity_Sold', 'Total_Sales'));
    $sql = "SELECT Item_Name, SUM(Quantity_Sold) AS Quant,  ROUND(SUM(Total_Sales),2) AS Sales FROM sales WHERE Month ='$sMonth' GROUP BY Item_Name ORDER BY  SUM(Quantity_Sold) DESC";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                fputcsv($output, $row);
            }
        }


        // For best and worst items
        fputcsv($output, array("  ", " ")); // fputcsv needs array as second parameter.
        fputcsv($output, array("Best Item ", $_SESSION['best']));
        fputcsv($output, array("  ", " "));
        fputcsv($output, array("Worst Item ", $_SESSION['worst']));
        fclose($output);

?>