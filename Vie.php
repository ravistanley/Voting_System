<?php 
    require ('header.php');

    
?>

<!-- <?php

$user_id =   $_SESSION['id'] ;

$dbconnect = mysqli_connect("localhost", "root", "","votingsystem");
//1. Write down sql.
$sql = "SELECT * FROM candidates WHERE  `user_id` = '$user_id'  ";

//2. Execute 
$result = mysqli_query($dbconnect, $sql);

//3. check whether row haas been found.
$row = mysqli_num_rows($result);

if ($row> 0){
    $error = "<p style='color: red;' >You have already registered for a position!!</p>";
        

    $sql = "SELECT `position_id` FROM candidates WHERE  `user_id` = '$user_id' ";

    //2. Execute 
    $result = mysqli_query($dbconnect, $sql);
    $position_vie = mysqli_fetch_assoc($result);

    $position_vied_no= $position_vie['position_id'];

    
    //1. Write down sql.
    $sql = "SELECT `name` FROM positions WHERE  `id` = '$position_vied_no' ";

    //2. Execute 
    $result = mysqli_query($dbconnect, $sql);

    //3. check whether row haas been found.
    $position_vied_array = mysqli_fetch_assoc($result);
    $position_vied = $position_vied_array['name'];

    
}
else{
    $position_vied = "You Have Not Vied For Any Position.";

}

?>

<?php

if(isset($_POST['vie'])){
    // creating variables
    $election_id = $position_id = 0;
    $error_election = $error_position = "";
    $error =  '';
    $success = '';
    // $profile = '';



$election_id = $_POST['election']; 
$position_id = $_POST['position'];

// prevent xscripting

$election_id = sanitize ($election_id);
$position_id = sanitize ($position_id);
// $profile = sanitize ($profile);


$user_id =   $_SESSION['id'] ;
// check for double registration.
$dbconnect = mysqli_connect("localhost", "root", "","votingsystem");
//1. Write down sql.
$sql = "SELECT * FROM candidates WHERE  `user_id` = '$user_id' AND election_id = $election_id ";

//2. Execute 
$result = mysqli_query($dbconnect, $sql);

//3. check whether row haas been found.
$row = mysqli_num_rows($result);

if ($row> 0){
    $error = "<p style='color: red;' >You have already registered for a position!!</p>";
        

    $sql = "SELECT `position_id` FROM candidates WHERE  `user_id` = '$user_id' AND election_id = $election_id ";

//2. Execute 
$result = mysqli_query($dbconnect, $sql);
$position_vie = mysqli_fetch_assoc($result);

$position_vied_no= $position_vie['position_id'];

 
//1. Write down sql.
$sql = "SELECT `name` FROM positions WHERE  `id` = '$position_vied_no' ";

//2. Execute 
$result = mysqli_query($dbconnect, $sql);

//3. check whether row haas been found.
$position_vied_array = mysqli_fetch_assoc($result);
$position_vied = $position_vied_array['name'];

    
}
else{
    $position_vied = "You Have Not Vied For Any Position.";

    
    $dbconnect = mysqli_connect("localhost", "root", "","votingsystem");
    
    $sql = "INSERT INTO candidates (`user_id`, `position_id` ,`election_id`) VALUES ('$user_id', '$position_id', '$election_id')";
    
    
    if(mysqli_query($dbconnect, $sql)){
        $success = " <b style='color:green;'>You have successfully registered.</b>";
    } else{
        $error = "ERROR: Could not complete request $sql. " . mysqli_error($dbconnect);
    }
}
    }
    

?> -->




            <!-- Mobile Menu start -->
           <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Registration Dashboard</h2>
												<p><?php echo "$firstname"; ?>: Welcome<span class="bread-ntd"> to The Aspirants' Panel</span></p><br/>
                                                <p> Position <span class="bread-ntd">vied: <?php print_r($position_vied) ;?></span></p>
											
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
       

       
       
        <!-- Body Bart-->


        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                               
                                    <!--Form goes here-->



                                                        <div class="text-center m-b-md custom-login">
                                        <h1 style="color: gold;">REGISTER TO VIE</h1>
                                    
                                    </div>
                                    <div class="hpanel">
                                        <div class="panel-body">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="vieForm" method="POST">

                                            <!--Candidate's profile--->
<!--
                                            
                                            <div class="form-group">
                                            <label class="control-label" for="Profile">Candidate Profile</label>
                                                   
                                                   <input type="file" name="profile" id=" profile">
                                        </div>

-->

                                                <div class="form-group">
                                                    <label class="control-label" for="Election">Election</label>
                                                    <select name="election" id="election">

                                                    <?php
                                                     $sql = "SELECT * FROM election WHERE  `active` = 1 ";

                                                        //2. Execute 
                                                        $result = mysqli_query($dbconnect, $sql);

                                                        //3. Fetch association.
                                                        $election = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                                      foreach($election as $elect){
                                                        ?>

                                                        <option value="<?php echo $elect['id']; ?>"><?php echo $elect['name']; ?></option>
                                                    <?php  
                                                    }
                                                        ?>
                                                      
                                                      
                                                    </select>
                                                  </div>

                                             
                                                <div class="form-group">
                                                    <label class="control-label" for="position">Election</label>
                                                    <select name="position" id="position">

                                                    <?php
                                                     $sql = "SELECT * FROM positions";

                                                        //2. Execute 
                                                        $result = mysqli_query($dbconnect, $sql);

                                                        //3. Fetch association.
                                                        $position = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                                      foreach($position as $position_code){
                                                        ?>

                                                        <option value="<?php echo $position_code['id']; ?>"><?php echo $position_code['name']; ?></option>
                                                    <?php  
                                                    }
                                                        ?>
                                                    </select>
                                                    <br/><br/>

                                                    
                                                    <?php if(isset($error)) echo $error; ?>
                                                    <?php if(isset($success)) echo $success; ?>
                                                    <br/>

                                                    <input type="submit" id="vie" name="vie"  value="Register" class="btn btn-success btn-block loginbtn" />
                                               
                                            </form>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      


        <?php require ('footer.php'); ?>