<?php
require_once('../includes/load.php');

if (isset($_GET['bus_id'])) {
$bus_id = $_GET['bus_id'];
$table = "bus_management";
$load = $select->load_single_user($bus_id,$table);


}


if (!isset($_GET['staff_id'])) {
header("location:admin_login.php");
}else {
  $staff_id = $_GET['staff_id'];
}

if (isset($_GET['suspension_id'])) {
$suspension_id = $_GET['suspension_id'];
// SUSPEND BUS ROUTE
$query = "UPDATE $table SET suspend_bus = 1 WHERE id = '$bus_id'";
$runner = $db->query($query);
if ($runner) {
echo "<script>alert('Bus Route Suspended!')
      window.location.replace('bus_full_details.php?staff_id=$staff_id&action=bus_management&bus_id=$bus_id')
        </script>";
}
}

if (isset($_GET['resume_id'])) {
$resume_id = $_GET['resume_id'];
// SUSPEND BUS ROUTE
$query = "UPDATE $table SET suspend_bus = 0 WHERE id = '$bus_id'";
$runner = $db->query($query);
if ($runner) {
echo "<script>alert('Bus Route has Resumed')
        </script>";
}
}
// window.location.replace('bus_full_details.php?id=$id&bus_id=$bus_id')
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="../css/mycss/staff_profile.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

</head>
<body style="font-family: 'Montserrat', sans-serrif;">
<div class="container">
<div class="main-body">

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="main-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="admin_dashboard.php?staff_id=<?php echo $staff_id; ?>&action=bus_management">Back</a></li>
<li class="breadcrumb-item"><a href="#"></a></li>
<li class="breadcrumb-item active" aria-current="page">User Profile</li>
</ol>
</nav>
<!-- /Breadcrumb -->

<div class="row gutters-sm">
<div class="col-md-4 mb-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
<img src="bus_images/<?php echo $load->pic; ?>" alt="Admin" class="rounded-circle" width="150">
<div class="mt-3">
<h4><?php echo $load->bus_name; ?></h4>
<h5 class="text-secondary mb-1"></h5>
<p class="text-muted font-size-sm"><b></b></p>
<?php
$suspended = $select->get_suspended_bus($bus_id);
if ($suspended == 1) {
 ?>
<a href="?staff_id=<?php echo $staff_id ?>&bus_id=<?php echo $bus_id ?>&resume_id=<?php echo $bus_id ?>" class="btn btn-primary">Resume Route</a>
<?php }else {
 ?>
 <a href="?staff_id=<?php echo $staff_id ?>&bus_id=<?php echo $bus_id ?>&suspension_id=<?php echo $bus_id ?>" class="btn btn-primary">Suspend Route</a>
<?php } ?>
</div>
</div>
</div>
</div>


<div class="card mt-3">
<ul class="list-group list-group-flush">
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Email</h6>
<span class="text-secondary"><?php ?></span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
<span class="text-secondary">@bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
<span class="text-secondary">bootdey</span>
</li>
</ul>
</div>
</div>


<div class="col-md-8">
<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Departure</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->departure ?>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Arrival</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->arrival ?>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Time</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->time_ ?>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Price(₦)</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo number_format($load->price); ?>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Air Condition</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->ac ?>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Seats Available</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->seats ?>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Bus Number</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->bus_no ?>
</div>
</div>
<hr>

<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Remarks</h6>
</div>
<div class="col-sm-8 text-secondary">
<?php echo $load->remarks ?>
</div>
</div>
</div>
</div>

<div class="row gutters-sm">
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<!-- <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6> -->
<!-- <small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Backend API</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
</div>
</div>
</div>
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<!-- <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6> -->
<!-- <small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Backend API</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
