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
        <!-- Main Contents -->
        <main>
            <div class="container justify-content-center form-center">
                <h1 class=" center-text">Search for Patient</h1>
                <hr style="width: 50%; height: 5px; color: red; margin: auto;"><br>
                <div class="col-ms-6 ">
                    <form action="searchPatient.php" method="GET">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="searchPatient" type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" required/>
                            <label>Search</label>
                        </div>
                        <div class="d-grid"><button class="btn btnstyle1 btn-xl"  type="submit">search</button></div>
                    </form>
                    <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Blood Type</th>
                                    <th>Address</th>
                                    <th style ="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'classPatient.php';
                                $patient = new patient();
                                $rows = $patient->search();
                                $i = 1;
                                if(!empty($rows)){
                                foreach($rows as $row){ 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['bloodType']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td style ="text-align: center">
                                    <a href="updateDonor.php?id=<?php echo $row['id']; ?>" class="badge badge-danger actionUpdate">Update</a>
                                    <a href="deletDonor.php?id=<?php echo $row['id']; ?>" class="badge badge-danger actionDelet">Delete</a>
                                </td>
                            </tr>
                                <?php
                                    }
                                }else{
                                    echo "(no data found)";
                                }
                                ?>
                        </table>
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