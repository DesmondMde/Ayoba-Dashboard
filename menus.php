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
        <a class="nav-link" href="../../../">MENUS <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../../../orders.php/<?php echo $id ?>">ORDERS</a>
      </li>

    </ul>

  </div>
</nav>

<section class="wrapper">

    <ul id="menu-list">
    </ul>

  </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<script>


    let xhr = new XMLHttpRequest;
    var store = <?php echo $id ?>;
    xhr.open('GET', 'https://efb30d56.ngrok.io/api/stores/'+store+'/menus', true)
    xhr.onload = function()
        {
            if (this.status === 200)
                {
                  var data =  JSON.parse(this.responseText);
                  console.log(data);
                  var d1 = document.getElementById('menu-list');
                  var arrItems = [];
                    $.each(data, function (index, value) {
                       // alert(value.name);
                        d1.insertAdjacentHTML('beforeend',  " <li class='col-4-L col-6-M col-12-SM'><h2>"+value.title+"</h2> <p> "+value.catch_phrase+"</p> <hr> <a href='../menusItems/"+value.id+"'><button type='button' class='btn btn-primary '>Menu Items</button> </a> </li>" );

                    });

                 //
                 //
                 }
       }
    xhr.send();
</script>


<!-- <script>


    let xhr = new XMLHttpRequest;
    var store = 1;
    xhr.open('GET', 'https://efb30d56.ngrok.io/api/stores/' + store + '/orders', true)
    xhr.onload = function()
        {
            if (this.status === 200)
                {
                  var data =  JSON.parse(this.responseText);
                  console.log(data);
                 }
       }
    xhr.send();
</script> -->

<style>
* {
  padding: 0;
  margin: 0;
}

.logoClas{
    height: 50%;
    border-radius: 10px;

}

#menu-list {
  margin: 10px;
  list-style: none;
  text-align: center;
  width: 80%;
  display: flex;
  flex-wrap: wrap;
  /* justify-content: space-around; */
  padding: 1em auto;
}

#menu-list li {
  text-align: center;
  background-color: white;
  box-shadow: 5px 10px 18px black;
  border-radius: 10px;
  margin: 0.5em;
  width: 30%;
  padding: 10px;
}

@media only screen and (max-width: 1000px) {
  #menu-list {
    width: 90%;
  }
 }


@media only screen and (max-width: 750px) {
  #menu-list {
    width: 95%;
  }
  #menu-list li {
    width: 46%;
    }
  }

@media only screen and (max-width: 550px) {
  #menu-list {
    width: 95%;
  }
  #menu-list li {
    width: 90%;
    }
  }

#menu-list li img {
  width: 90%;
}



</style>

<style>
  .wrapper {
    padding: 25px;
  }
</style>
