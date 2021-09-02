<?php
$spreadsheet = "https://docs.google.com/spreadsheets/d/1Sq79dHUXdt1X4knIxIquVHph2Tf1N8NIBQI_xAfCuRY"; //Get Public Shareable Link from Google Sheets (without '/edit?usp=sharing')

$spreadsheet_url = $spreadsheet . "/export?gid=0&format=csv";
?>


<!DOCTYPE html>
<html>
    <head>
        <base target="_top">
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
    <div class="row">
    <div class="col s12">
    <table class="table table-striped table-bordered table-fixed">
            <thead>
                <?php
                $i = 1;
                $f = fopen($spreadsheet_url, "r");
                while (($line = fgetcsv($f)) !== false) {
                    if ($i == 1) {
                        echo "<tr>";
                        foreach ($line as $cell) {
                            echo "<th style='position: sticky; top: 0; background-color:#fff;'><b>" . htmlspecialchars($cell) . "</b></th>";
                        }
                        echo "</tr></thead><tbody>";

                        $i = 2;
                    } else {
                        echo "<tr>";
                        foreach ($line as $cell) {
                            echo "<td>" . htmlspecialchars($cell) . "</td>";
                        }
                        echo "</tr>\n";
                    }
                }
                fclose($f);
                ?>
                </tbody>
        </table>
            
	  
    </div>
    </div> <!--Close row-->
    
    </div> <!--Close container-->

        <!--##JAVASCRIPT---------------------- -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
	</body>
</html>
