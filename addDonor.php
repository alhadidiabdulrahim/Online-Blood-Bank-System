<!DOCTYPE html>
<html>
    <head>
        <!-- Page Title-->
        <title>Add Donor</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
            crossorigin="anonymous">

        <!-- Link to CSS Styles-->    
        <link rel="stylesheet" href="CSS/Styles.css">

        <style>
            .center-text{
                text-align: center;}
        </style>
    </head>

    <body>
        <!-- Header -->
        <header style="padding-top: 50px;">
            <nav class="navbar navbar-expand-sm bg-dark navbar-light  fixed-top py-2" id="mainNav">
                <div class="container px-4 px-lg-5" >
                    <a class="navbar-brand">
                        <!-- Logo -->
                        <img src="img/blood.png" width="30" height="30" class="d-inline-block align-top" alt=""><span class="logo-style">Online Blood Bank</span></a>
                        <!-- Bar Item -->
                        <div class="collapse navbar-collapse" id="mainNav">
                        <ul class="navbar-nav ms-auto my-2 my-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="Donors&Patient.php">Donors & Patient</a></li>
                            <li class="nav-item"><a class="nav-link" href="About Us.html">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="Contact Us.html">Contact us</a></li>
                            <li class="nav-item"><a class="nav-link" href="Sign In.html">Sign in</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?php
            include 'classDonor.php';
            $donor = new donor();
            $insert = $donor->insertDoner();
        ?>

        <!-- Main Contents -->
        <main>
            <div class="container justify-content-center form-center">
                <h1 class=" center-text">Add Donor</h1>
                <hr style="width: 50%; height: 5px; color: red; margin: auto;"><br>
                <div class="col-ms-6 ">
                    <form action="addDonor.php" method="POST">
                        <!-- name input -->
                        <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" name="name" required/>
                        <label>name</label>
                        </div>
    
    
                        <!-- Blood Type input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Blood Type" type="text" name="bloodType" required/>
                            <label>Blood Type</label>
                        </div>

                        <!-- Address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Address" type="text" name="address" required/>
                            <label>Address</address></label>
                        </div>
                        <div class="d-grid"><button class="btn btnstyle1 btn-xl"  type="submit">Add</button></div>
                    </form>
                </div>
        </main>
        
        <!-- Footer -->
        <footer class="bg-dark py-3">
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">
                    Copyright &copy; 2022 - Online Blood Bank Group
                </div>
            </div>
        </footer>   
    </body>
</html>