<?php
session_start();
require_once '../../config.php';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$grantid = json_encode($_GET['id']);
$_SESSION["current_grant"] = $grantid;

$sql = "SELECT name, bp, dc_award, agency, jsondata, creation_date FROM grants WHERE id=" . $grantid;
$sql2 = "SELECT jsondata, creation_date FROM grant_archive WHERE grantid=" . $grantid;

global $myJSON;

$result2 = $con->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
		$i = 0;
		$a = array();
		while($row = $result2->fetch_assoc()) {
			$i++;
			$myObj = new \stdClass();
			$myObj->x = $row["creation_date"];
			$myObj->y = $row["jsondata"];

			array_push($a, $myObj);
	}
}
else
{
		$a = array(); // If we only have 1 data set
}


$result = $con->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    $row = $result->fetch_assoc();
		$json = $row["jsondata"];
		$myObj2 = new \stdClass();
		$myObj2->x = $row["creation_date"];
		$myObj2->y = $json;

		array_push($a, $myObj2);
    $name = $row["name"];
		$myJSON = json_encode($a);

		if(is_numeric($row["dc_award"])){
			 $formattedDCAward = '$' . number_format($row["dc_award"], 2);
		}
		else
		{
			$formattedDCAward = $row["dc_award"];
		}

		$timeChart = "<canvas id='timeChart'></canvas><script>linearTimeChart(" . $myJSON . ");</script>";
		$dcRemaining = "<canvas id='dcLeftPieChart'></canvas><script>moneyLeftPieChart('dcLeftPieChart','" . $row["dc_award"] . "','" . $json . "');</script>";
		$dcSpendingBreakdown = "<div class='dc-breakdown'>Award: <span class='awarded'>" . $formattedDCAward . "</span>\nSpent: <span class='spent' id='spent'></span><hr class='custom-hr'><span class='remaining' id='remaining'></span></div><script>setBreakdown('" . $json . "','" . $row["dc_award"] . "');</script>";
}
else
{
    echo "0 results";
}

$con->close();
?>
<head>
<script type="text/javascript">
var dragarea = document.getElementById('drag-and-drop');
var fileInput = document.getElementById('file-upload');
document.getElementById('file-upload').addEventListener('change', readSingleFile, false);

dragarea.addEventListener('dragover', (e) => {
  e.preventDefault();
  dragarea.classList.add('dragging');
});

dragarea.addEventListener('dragleave', () => {
  dragarea.classList.remove('dragging');
});

dragarea.addEventListener('drop', (e) => {
  e.preventDefault();
  dragarea.classList.remove('dragging');
  fileInput.files = e.dataTransfer.files;
  readSingleFile(e);
});

$("#update-grant-data").click(function(){
    console.log(sessionStorage.getItem("result"));
		$.ajax({
        url: "functions/update-grant.php",
        type: "post",
        data: { 'jsondata' : sessionStorage.getItem("result") } ,
        success: function (response) {
          console.log(response);
          showAlert("success", response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
        });
});
</script>
</head>
<div class="fourth-card">
	<div class='card-title'>
		<div class='card-title-text'><span class='parent-link'>Remaining Direct Cost</span></div>
	</div>
	<div class="remaining-awards">
		<div class="dc-award-chart">
			<?php echo $dcRemaining ?>
		</div>
		<div class="spending-breakdown">
			<?php echo $dcSpendingBreakdown ?>
		</div>
	</div>
</div>

<div class="fourth-card">
	<div class='card-title'>
		<div class='card-title-text'><span class='parent-link'>Remaining Indirect Cost</span></div>
	</div>
	<div class="remaining-awards">
		<div class="dc-award-chart">

		</div>
	</div>
</div>

<div class="fourth-card">
	<div class='card-title'>
		<div class='card-title-text'><span class='parent-link'>Something Else</span></div>
	</div>
	<div class="remaining-awards">
		<div class="dc-award-chart">

		</div>
	</div>
</div>

<div class="fourth-card">
	<div class='card-title'>
		<div class='card-title-text'><span class='parent-link'>Something Else</span></div>
	</div>
	<div class="remaining-awards">
		<div class="dc-award-chart">

		</div>
	</div>
</div>
<div class='full-card' style="margin-top:160px;">
  <div class='card-title'>
    <div class='card-title-text'><span class='parent-link'>Spending Timeline</span></div>
  </div>
  <div class='body'>

		<div class="timechart">
			<?php echo $timeChart ?>
		</div>
		</div>
		<div class="update-grant-data">
<div class="drag-and-drop-description">
	<p id="upload-excel-p">Update Grant Data</p><span id="small-hint" class="small-hint">(.xlsx format)</span>
</div>
<div id="drag-and-drop" class="drag-and-drop">
	<div class="drag-and-drop-text">
		<p>Drag and Drop File Here</p>
	</div>
	<div class="drag-and-drop-text-or">
		<p>or</p>
	</div>
	<label for="file-upload" class="custom-file-upload">
			Select File
	</label>
	<input id="file-upload" type="file"/>
</div>
<button id="update-grant-data" class="save-button" type="button"><i class="far fa-save" style="padding-right:10px;"></i>Update Grant</button>
</div>
</div>
