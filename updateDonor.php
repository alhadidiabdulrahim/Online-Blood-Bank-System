<!DOCTYPE html>
<html>
    <head>
        <!-- Page Title-->
        <title>Update Donor</title>

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
                <h1 class=" center-text">Update Donor</h1>
                <hr style="width: 50%; height: 5px; color: red; margin: auto;"><br>
                <div class="col-ms-6 ">
                <?php
                    include 'classDonor.php';
                    $donor = new donor();
                    $id = $_REQUEST['id'];
                    $row = $donor->edit($id);

                    if (isset($_POST['update'])) 
                    {
                        if (isset($_POST['name']) && isset($_POST['bloodType']) && isset($_POST['address'])) 
                        {
                            if (!empty($_POST['name']) && !empty($_POST['bloodType']) && !empty($_POST['address']) ) {
        
                            $data['id'] = $id;
                            $data['name'] = $_POST['name'];
                            $data['bloodType'] = $_POST['bloodType'];
                            $data['address'] = $_POST['address'];

                            $update = $donor->update($data);

                            if($update){
                                echo "<script>alert('record update successfully');</script>";
                                echo "<script>window.location.href = 'Donors&Patient.php';</script>";
                            }else{
                                echo "<script>alert('record update failed');</script>";
                                echo "<script>window.location.href = 'Donors&Patient.php';</script>";
                            }

                            }else{
                            echo "<script>alert('empty');</script>";
                            header("Location: updateDonor.php?id=$id");
                            }
                        }
                    }

                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Blood Type</label>
                            <input type="text" name="bloodType" value="<?php echo $row['bloodType']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                        </div><br>
                        <div style="text-align: center" class="form-group">
                            <button type="submit" name="update" class="btn btnstyle1 btn-xl">Submit</button>
                        </div>
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