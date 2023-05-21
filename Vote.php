<?php require ('header.php'); ?>



<?php
$user_id =   $_SESSION['id'] ;
 $status =  '';
$dbconnect = mysqli_connect("localhost", "root", "","votingsystem");
 

    // initiate voting for a non-voter.

//1. Write down sql.
$sql = "SELECT * FROM votes WHERE  `voter_id` = '$user_id' ";

//2. Execute 
$result = mysqli_query($dbconnect, $sql);

//3. check whether row has been found.
$row = mysqli_num_rows($result);

if ($row> 0){
    $status = '  You have Voted';
}else{
    $status = 'You have not Yet Voted';
}
   
  

if(isset($_POST['vote'])){
    // creating variables
    $president = $vice_president = $sec_gen = $academics = $sports = $social = 0;
     $error =  '';
    $success = '';
   


    if(isset($_POST['president'])){
        $president =$_POST['president'];    
    }
    if(isset($_POST['secgeneral'])){
        $sec_gen = $_POST['secgeneral'];
    }
    if(isset($_POST['academics'])){
        $academics = $_POST['academics'];
    }
    if(isset($_POST['sports'])){
        $sports = $_POST['sports'];
    }

// prevent xscripting

$president = sanitize ($president);


$election_id = 1;
$user_id =   $_SESSION['id'] ;

// establish connection.
$dbconnect = mysqli_connect("localhost", "root", "","votingsystem");


    // initiate voting for a non-voter.

//1. Write down sql.
$sql = "SELECT * FROM votes WHERE  `voter_id` = '$user_id' AND election_id = $election_id ";

//2. Execute 
$result = mysqli_query($dbconnect, $sql);

//3. check whether row haas been found.
$row = mysqli_num_rows($result);

if ($row> 0){
    $error = '  
   
  

  <div class="rod" id="alert_bar" style="width: 100%;">
  <div class="">
      <div class="alert_bar">
        
          <div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
              <i class="fa fa-window-close adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
              <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
              <p class="message-mg-rt"><strong>Oh snap!</strong> You had already voted.</p>
          </div>
      </div>
      </div>
  </div>
  ';

    
}
else{
    $status = "You Have Not Yet Voted.";

    
    $dbconnect = mysqli_connect("localhost", "root", "","votingsystem");
    
    $sql = "INSERT INTO votes ( `voter_id` ,`election_id`,`president_id`, secgen_id, acad_id, sports_id) 
    VALUES ('$user_id', '$election_id', '$president', '$sec_gen', '$academics', '$sports')";
    
 //   $sql .= "INSERT INTO Votes ( `Voter_id` , Candidate_id ,`election_id` ) VALUES ('$user_id', '$vice_president', '$election_id')";
    
    

  

    if(mysqli_multi_query($dbconnect, $sql)){
        $success = '
        
        <div class="rod" id="alert_bar" style="width: 100%;">
        <div class="">
            <div class="alert_bar">
                
                <div class="alert alert-success alert-st-one" role="alert">
                    <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                    <p class="message-mg-rt"><strong>Congratulations!</strong> You successfully voted.</p>
                </div>
               </div>
            </div>
        </div>
        ';
    } else{
        $error = "ERROR: Could not complete the voting process $sql. " . mysqli_error($link);
    }
}
}


?>








<?php if(isset($error)) echo $error; ?>
                                                    <?php if(isset($success)) echo $success; ?>
                                    
                                                    
<!--check voter status-->

             <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2><?php echo "$firstname $surname"; ?></h2>
												<p ><?php  echo "$status" ;?></span></p>
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
        


            <!-- Mobile Menu start -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>President</h2>
												<p >Vote for your preffered Presidential Candidate</span></p>
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
       
            <!-- Mobile Menu end -->
            <!--President--->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="VotePresi" method="POST">

                        
            <div class="product-new-list-area">
              <div class="container-fluid">
                    <div class="row">
                                <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 1 AND election_id = 1";

                                                            //2. Execute 
                                        $result = mysqli_query($dbconnect, $sql);

                                                            //3. Fetch association.
                                         $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                         foreach($presidents as $presi){
                                            $user_id = $presi['user_id'];
                                            $candidate_id = $presi['id'];

                                            $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";

                                            $user_result = mysqli_query($dbconnect, $user_sql);

                                                            //3. Fetch association.
                                            $user_details = mysqli_fetch_assoc($user_result);
                                            $firstname = $user_details['firstname'];
                                            $surname = $user_details['surname'];


                                                    


                                             ?>

                                                        
                                                      
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <div class="single-new-trend mg-t-30">
                                      <a href="#"><img src="Election_img/Shaqtin.png" alt=""></a>
                                 <div class="overlay-content">
                                <br/>
                                <a href="#">
                                    <h1>President</h1>
                                </a>
                                <a href="#" class="btn-small"><?php  echo $firstname." ".$surname; ?></a>
                          
                                <a href="#">
                                    <h5 style="font-size: 16px; color:white;"><?php  echo $firstname." ".$surname; ?></h5>
                                </a>
                                <div class="pro-rating">
                                   <input type="radio" name="president" id="president" value="<?php echo $candidate_id; ?>" style="width:24px; height:24px; cursor: pointer;"/>
                                </div>
                            </div>
                        </div>
                                         </div>
                                                 <?php  
                                                    }
                                                        ?>
                                                     <!-- </form>-->
                    
                </div>
            </div>
        </div>  
       
       
<!--President END

PRESIDENT END
--->


       
<!---sec gen-->
        
<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Secretary General</h2>
												<p >Vote for your preffered Secretary General Candidate</span></p>
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

        <!--SEC GEN--->
        <div class="product-new-list-area">
              <div class="container-fluid">
                    <div class="row">
                           <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" id="VoteDeputyPresi" method="POST">
                                               
                                <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 2 AND election_id = 1";

                                                            //2. Execute 
                                        $result = mysqli_query($dbconnect, $sql);

                                                            //3. Fetch association.
                                         $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                         foreach($presidents as $presi){
                                            $user_id = $presi['user_id'];
                                            $candidate_id = $presi['id'];


                                            $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";

                                            $user_result = mysqli_query($dbconnect, $user_sql);

                                                            //3. Fetch association.
                                            $user_details = mysqli_fetch_assoc($user_result);
                                            $firstname = $user_details['firstname'];
                                            $surname = $user_details['surname'];


                                                    


                                             ?>

                                                        
                                                      
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <div class="single-new-trend mg-t-30">
                             <a href="#"><img src="Election_img/Shaqtin.png" alt=""></a>
                                 <div class="overlay-content">
                                <br/>
                                <a href="#">
                                    <h1>Secretary General</h1>
                                </a>
                                <a href="#" class="btn-small"><?php  echo $firstname." ".$surname; ?></a>
                          
                                <a href="#">
                                    <h5 style="font-size: 16px; color:white;"><?php  echo $firstname." ".$surname; ?></h5>
                                </a>
                                <div class="pro-rating">
                                   <input type="radio" name="secgeneral" id="secgeneral" value="<?php echo $candidate_id; ?>" style="width:24px; height:24px; cursor: pointer;"/>
                                </div>
                            </div>
                        </div>
                                         </div>
                                                 <?php  
                                                    }
                                                        ?>
                                                      
                    
                </div>
            </div>

        </div>  
       
        <!---SEC GEN END

        SEC GEN END-->



        <!---ACADEMICS START-->


        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Academics Secretary</h2>
												<p >Vote for your preffered Academics Secretary</span></p>
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

        <!--SEC GEN--->
        <div class="product-new-list-area">
              <div class="container-fluid">
                    <div class="row">
                         <!--   <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" id="VoteDeputyPresi" method="POST">
                                                -->
                                <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 3 AND election_id = 1";

                                                            //2. Execute 
                                        $result = mysqli_query($dbconnect, $sql);

                                                            //3. Fetch association.
                                         $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                         foreach($presidents as $presi){
                                            $user_id = $presi['user_id'];
                                            $candidate_id = $presi['id'];
                                          //  $profile = $presi['Profile'];


                                            $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";

                                            $user_result = mysqli_query($dbconnect, $user_sql);

                                                            //3. Fetch association.
                                            $user_details = mysqli_fetch_assoc($user_result);
                                            $firstname = $user_details['firstname'];
                                            $surname = $user_details['surname'];


                                                    


                                             ?>

                                                        
                                                      
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <div class="single-new-trend mg-t-30">
                                      <a href="#"><img src="<?php echo "Election_img/Shaqtin.png"; ?>" alt=""></a>
                                 <div class="overlay-content">
                                <br/>
                                <a href="#">
                                    <h1>Academics Secretary</h1>
                                </a>
                                <a href="#" class="btn-small"><?php  echo $firstname." ".$surname; ?></a>
                          
                                <a href="#">
                                    <h5 style="font-size: 16px; color:white;"><?php  echo $firstname." ".$surname; ?></h5>
                                </a>
                                <div class="pro-rating">
                                   <input type="radio" name="academics" id="academics" value="<?php echo $candidate_id; ?>" style="width:24px; height:24px; cursor: pointer;"/>
                                </div>
                            </div>
                        </div>
                                         </div>
                                                 <?php  
                                                    }
                                                        ?>
                                                      
                    
                </div>
            </div>

        </div>  
       



        <!--- ACADEMICS END


        ACADEMCS END-->

       



        
        <!---SPORTS START-->


        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Sports and Entertainment</h2>
												<p >Vote for your preffered Sports and Entertainment Secretary</span></p>
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

        <!--SPORTS--->
        <div class="product-new-list-area">
              <div class="container-fluid">
                    <div class="row">
                           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="VoteDeputyPresi" method="POST">
                                               
                                <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 4 AND election_id = 1";

                                                            //2. Execute 
                                        $result = mysqli_query($dbconnect, $sql);

                                                            //3. Fetch association.
                                         $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                         foreach($presidents as $presi){
                                            $user_id = $presi['user_id'];
                                            $candidate_id = $presi['id'];
                                          //  $profile = $presi['Profile'];


                                            $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";

                                            $user_result = mysqli_query($dbconnect, $user_sql);

                                                            //3. Fetch association.
                                            $user_details = mysqli_fetch_assoc($user_result);
                                            $firstname = $user_details['firstname'];
                                            $surname = $user_details['surname'];


                                                    


                                             ?>

                                                        
                                                      
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <div class="single-new-trend mg-t-30">
                                      <a href="#"><img src="<?php echo "Election_img/Shaqtin.png"; ?>" alt=""></a>
                                 <div class="overlay-content">
                                <br/>
                                <a href="#">
                                    <h1>Sports and Entertainment</h1>
                                </a>
                                <a href="#" class="btn-small"><?php  echo $firstname." ".$surname; ?></a>
                          
                                <a href="#">
                                    <h5 style="font-size: 16px; color:white;"><?php  echo $firstname." ".$surname; ?></h5>
                                </a>
                                <div class="pro-rating">
                                   <input type="radio" name="sports" id="sports" value="<?php echo $candidate_id; ?>" style="width:24px; height:24px; cursor: pointer;"/>
                                </div>
                            </div>
                        </div>
                                         </div>
                                                 <?php  
                                                    }
                                                        ?>
                                                      
                    
                </div>
            </div>

        </div>  
       



        <!--- SPORTS END


        SPORTS END-->
  

        <div class="section-admin container-fluid" style="margin-top: 20px; ">
            <div class="row admin text-center">
           
           <div class="col-md-12">
                    <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                </div>
                        
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                </div>
                        
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                               <div class="row vertical-center-box vertical-center-box-tablet">
                                    
                                    <div class="col-xs cus-gh-hd-pro">
                                        <input type="submit" id="vote" class="vote-btn" name="vote" value="Click to Vote" >
                                         
             
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                                                </div>
            </div>
        </div>

                                                </form>
                                                <br/>


        
      
        <?php require ('footer.php'); ?>

      