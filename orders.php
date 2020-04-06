<!doctype html>
<?php
$url = $_SERVER['REQUEST_URI'];
$id = substr(strrchr($url, '/'), 1);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Dashboards!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Navbar content -->
  <a class="navbar-brand" href="../../">
    <img src="../../../logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Easty
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="orders">ORDERS <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../../../menus/<?php echo $id ?>">MENUS</a>
      </li>

    </ul>
    <span class="navbar-text">
      Help
    </span>
  </div>
</nav>

<div class="rw-100 p-3ow">
<section class="wrapper">
<table id="exampleTable"  class="display" style="width:100%; margin: 30px;">

<thead>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Date</th>
        <th>Pick Up Time</th>
        <th>Price</th>
    </tr>
</thead>

<tbody id="tableData">
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
<tfoot>
    <tr>
    <th>ID</th>
        <th>Type</th>
        <th>Date</th>
        <th>Pick Up Time</th>
        <th>Price</th>
    </tr>
</tfoot>
</section>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" integrity="" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" integrity="" crossorigin="anonymous">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<script>
    let xhr = new XMLHttpRequest;
    var store = 1;
    xhr.open('GET', 'https://efb30d56.ngrok.io/api/stores/'+store+'/orders', true)
    xhr.onload = function()
        {
            if (this.status === 200)
                {
                  var data =  JSON.parse(this.responseText);
                  console.log(data);
                  var d1 = document.getElementById('tableData');
                  var arrItems = [];
                    $.each(data, function (index, value) {
                       // alert(value.name);
                       d1.insertAdjacentHTML('beforeend',  " <tr> <td> " + value.friendly_id + " </td> <td> " + value.type + " </td><td> " + value.placed_at + " </td><td>"+value.placed_at+"</td><td> R"+value.order_total+"</td></tr>" );
                    });
                 ////
                 }
       }
    xhr.send();
</script>

<script>
    $(document).ready(function() {
        $('#exampleTable').DataTable();
    } );
</script>
<style>
  .wrapper {
    padding: 25px;
  }
</style>