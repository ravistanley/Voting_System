<style>
.admin-content h4{
    font-size: 14px;
}
.admin-content h3{
    font-size: 15px;
    color: Green;
}
.admin-content ul{
 display: inline-block;
}
.count{
    color: white;
    font-size: 13px;
}
.panel{
    display: inline-block;
    margin-right: 10%;
    background: none;
    width: 50%;
}
.panel2{
    display: inline-block;
    margin-right: 10%;
  
    color: yellow;
}
.panel3{
    display: inline-block;
    color: orange;
}
.panel01{
    display: inline-block;
    margin-right: 8%;
    margin-left: -20%;

    background: none;
    width: 50%;
    color: lightblue;
}
.panel02{
    display: inline-block;
    margin-right: 8%;
    font-size: 14px;
  
    color: lightblue;
}
.panel03{
    display: inline-block;
    color: lightblue;
}
.section-admin .row{
    margin-bottom: 20px;
}
  
    </style>

<?php
    $total_votes = 0;
?>

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
                                    <h2>Leaderboard</h2>
                                    <p >Leading Candidates</span></p>
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
            
<!-- President -->
<div class="section-admin container-fluid">
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <?php
                        $try_sql = "SELECT `president_id`, count(president_id) as max FROM votes group by president_id order by max desc limit 1";
                        $try_result = mysqli_query($dbconnect, $try_sql);
                        $try_details = mysqli_fetch_assoc($try_result);
                        $leadid = $try_details['president_id'];
                    ?>
                    <?php
                        $sql = "SELECT * FROM candidates WHERE  `position_id` = 1 AND election_id = 1 AND  `id` = $leadid ";
                        $result = mysqli_query($dbconnect, $sql);
                        $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach($presidents as $presi) {
                        $user_id = $presi['user_id'];
                        $candidate_id = $presi['id'];

                        $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";
                        $user_result = mysqli_query($dbconnect, $user_sql);
                        $user_details = mysqli_fetch_assoc($user_result);
                        $firstname = $user_details['firstname'];
                        $surname = $user_details['surname'];

                        $result_sql = "SELECT * FROM votes WHERE `president_id` = $leadid ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);       
                        $total_votes = mysqli_num_rows($vote_result);
                        }
                    ?>

                    <?php
                        $result_sql = "SELECT * FROM votes WHERE  `president_id` != 0 ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);                         
                        $total_voters = mysqli_num_rows($vote_result);
                        $count = ceil(($total_votes/$total_voters)*100);
                    ?>

                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                        <h3 class="text-left text-uppercase"><b>President </b></h3>
                        <hr/>
                        <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet" >
                            <ul class="list-inline two-part-sp">
                                <li class="text-right sp-cn-r"> <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span></li>
                            </ul>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: <?php echo "$count"; ?>%;" class="progress-bar bg-green"></div>
                        </div>
                        <br/>
                        <span class="count"><?php echo "$count"; ?>%</span></li>
                    
                    </div>
                </div>
            
  
<!-- Secretary General -->
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <?php
                        $try_sql = "SELECT `secgen_id`, count(secgen_id) as max FROM votes group by secgen_id order by max desc limit 1";
                        $try_result = mysqli_query($dbconnect, $try_sql);                 
                        $try_details = mysqli_fetch_assoc($try_result);
                        $leadid = $try_details['secgen_id'];                       
                    ?>

                    <?php
                        $sql = "SELECT * FROM candidates WHERE  `position_id` = 2 AND election_id = 1  AND  `id` = $leadid ";
                        $result = mysqli_query($dbconnect, $sql);         
                        $secgens = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach($secgens as $secgen){
                        $user_id = $secgen['user_id'];
                        $candidate_id = $secgen['id'];
                        
                        $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";
                        $user_result = mysqli_query($dbconnect, $user_sql);
                        $user_details = mysqli_fetch_assoc($user_result);
                        $firstname = $user_details['firstname'];
                        $surname = $user_details['surname'];

                        $result_sql = "SELECT * FROM votes WHERE  `secgen_id` = $leadid ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);
                    
                        $total_votes = mysqli_num_rows($vote_result);
                        }
                    ?>

                    <?php
                        $result_sql = "SELECT * FROM votes WHERE  `secgen_id` != 0 ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);                     
                        $total_voters = mysqli_num_rows($vote_result);
                        $count = ceil(($total_votes/$total_voters)*100);
                    ?>

                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                        <h3 class="text-left text-uppercase"><b>Secretary General</b></h3>
                        <hr/>
                        <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet" >
                            <ul class="list-inline two-part-sp">
                                <li class="text-right sp-cn-r"> <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span></li>
                            </ul>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: <?php echo "$count"; ?>%;" class="progress-bar bg-green"> </div>  
                        </div>
                        <br/>
                        <span class="count"><?php echo "$count"; ?>%</span></li>               
                    </div>
                </div>


<!-- Academics Secretary-->
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <?php
                        $try_sql = "SELECT `acad_id`, count(acad_id) as max FROM votes group by acad_id order by max desc limit 1  ";
                        $try_result = mysqli_query($dbconnect, $try_sql);
                        $try_details = mysqli_fetch_assoc($try_result);
                        $leadid = $try_details['acad_id'];
                    ?>

                    <?php
                        $sql = "SELECT * FROM candidates WHERE  `position_id` = 3 AND election_id = 1  AND  `id` = $leadid ";
                        $result = mysqli_query($dbconnect, $sql);
                        $acadsecs = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach($acadsecs as $acadsec){
                        $user_id = $acadsec['user_id'];
                        $candidate_id = $acadsec['id'];

                        $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";
                        $user_result = mysqli_query($dbconnect, $user_sql);
                        $user_details = mysqli_fetch_assoc($user_result);
                        $firstname = $user_details['firstname'];
                        $surname = $user_details['surname'];

                        $result_sql = "SELECT * FROM votes WHERE  `acad_id` = $leadid ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);         
                        $total_votes = mysqli_num_rows($vote_result);
                        }
                    ?>

                    <?php
                        $result_sql = "SELECT * FROM votes WHERE  `acad_id` != 0 ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);                      
                        $total_voters = mysqli_num_rows($vote_result);
                        $count = ceil(($total_votes/$total_voters)*100);
                    ?>

                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                        <h3 class="text-left text-uppercase"><b>Academics Secretary</b></h3>
                        <hr/>
                      
                        <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet" >
                            <ul class="list-inline two-part-sp">
                                <li class="text-right sp-cn-r"> <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span></li>
                            </ul>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: <?php echo "$count"; ?>%;" class="progress-bar bg-green"></div>
                        </div>
                        <br/>
                        <span class="count"><?php echo "$count"; ?>%</span></li>
                    </div>
                </div>


<!-- Sports Secretary -->
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <?php
                        $try_sql = "SELECT `sports_id`, count(sports_id) as max FROM votes group by sports_id order by max desc limit 1";
                        $try_result = mysqli_query($dbconnect, $try_sql);
                        $try_details = mysqli_fetch_assoc($try_result);
                        $leadid = $try_details['sports_id'];
                    ?>

                    <?php
                        $sql = "SELECT * FROM candidates WHERE  `position_id` = 4 AND election_id = 1  AND  `id` = $leadid ";
                        $result = mysqli_query($dbconnect, $sql);
                        $sportssecs = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach($sportssecs as $sportssec){
                        $user_id = $sportssec['user_id'];
                        $candidate_id = $sportssec['id'];

                        $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";
                        $user_result = mysqli_query($dbconnect, $user_sql);
                        $user_details = mysqli_fetch_assoc($user_result);
                        $firstname = $user_details['firstname'];
                        $surname = $user_details['surname'];

                        $result_sql = "SELECT * FROM votes WHERE  `sports_id` = $leadid ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);                            
                        $total_votes = mysqli_num_rows($vote_result);
                        }                                                   
                    ?>

                    <?php
                        $result_sql = "SELECT * FROM votes WHERE  `sports_id` != 0 ";
                        $vote_result = mysqli_query($dbconnect, $result_sql);                   
                        $total_voters = mysqli_num_rows($vote_result);
                        $count = ceil(($total_votes/$total_voters)*100);
                    ?>

                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                        <h3 class="text-left text-uppercase"><b>Entertainment and Sports</b></h3>
                        <hr/>
                        <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet" >
                            <ul class="list-inline two-part-sp">                  
                                <li class="text-right sp-cn-r"> <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span></li>
                            </ul>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: <?php echo "$count"; ?>%;" class="progress-bar bg-green"></div>
                        </div>
                        <br/>
                        <span class="count"><?php echo "$count"; ?>%</span></li>                  
                     </div>
                </div>



                      
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
											    <h2>Votes By Numbers</h2>
												<p>All candidates, votes and percentage</span></p>
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


        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">

                        <!--- President--->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h3 class="text-left text-uppercase"><b>President</b></h3>
                            <hr/>                                 
                            <div class="panel01 ">
                                <h4 ><b>Candidate's Name</b></h4>
                            </div>
                            <div class="panel02">               
                                <span >Votes</span>
                            </div>
                            <div class="panel03">               
                                <span >%</span>
                            </div>
                            <hr/>
                      
                            <?php
                                $try_sql = "SELECT `president_id`, count(president_id) as max FROM votes group by president_id order by max desc limit 1";
                                $try_result = mysqli_query($dbconnect, $try_sql);
                                $try_details = mysqli_fetch_all($try_result, MYSQLI_ASSOC);
                                
                                foreach($try_details as $votes){
                                $leadid = $votes['president_id'];
                            ?>
                            
                            <?php
                                $sql = "SELECT * FROM candidates WHERE  `position_id` = 1 AND election_id = 1  ";
                                $result = mysqli_query($dbconnect, $sql);
                                $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                foreach($presidents as $presi){
                                $user_id = $presi['user_id'];
                                $candidate_id = $presi['id'];

                                $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";
                                $user_result = mysqli_query($dbconnect, $user_sql);
                                $user_details = mysqli_fetch_assoc($user_result);
                                $firstname = $user_details['firstname'];
                                $surname = $user_details['surname'];

                                $result_sql = "SELECT * FROM votes WHERE  `president_id` = $candidate_id ";
                                $vote_result = mysqli_query($dbconnect, $result_sql);          
                                $total_votes = mysqli_num_rows($vote_result);
                                
                                $count_sql = "SELECT * FROM votes WHERE  `president_id` != 0 ";
                                $vote_count = mysqli_query($dbconnect, $count_sql);                                    
                                $total_count = mysqli_num_rows($vote_count);
                                $count = ceil(($total_votes/$total_count)*100);                               
                            ?>

                             
                        
<!---RESULTS--->
                                <div class="panel ">
                                  <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                                </div>
                                <div class="panel2">                                
                                    <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span>
                                </div>
                                <div class="panel3">                                        
                                    <span class="counter sales-sts-ctn"><?php echo "$count"; ?>%</span>
                                         </div>
                        
                            <?php } }?>
                        </div>                       
                    </div>
             

<!---Sec Gen--->



        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            
        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h3 class="text-left text-uppercase"><b>Secretary General</b></h3>
                     <hr/>
                      

                     <div class="panel01 ">
                                  <h4 ><b>Candidate's Name</b></h4>
                                         </div>
                                         <div class="panel02">
                                                 
                                        <span >Votes</span>
                                         </div>
                                         <div class="panel03">
                                                 
                                        <span >%</span>
                                         </div>
                                         <hr/>
                      
                            <?php
                            
                             $try_sql = "SELECT `secgen_id`, count(secgen_id) as max FROM votes WHERE  `secgen_id` != 0 group by secgen_id order by max desc limit 1  ";

                             $try_result = mysqli_query($dbconnect, $try_sql);

                                             //3. Fetch association.
                             $try_details = mysqli_fetch_all($try_result, MYSQLI_ASSOC);
                             foreach($try_details as $votes){
                               
                             $leadid = $votes['secgen_id'];
                             }


                                ?>
                        <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 2 AND election_id = 1  ";

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

                                            $result_sql = "SELECT * FROM votes WHERE  `secgen_id` = $candidate_id ";
                                            $vote_result = mysqli_query($dbconnect, $result_sql);

                                                   
                                            $total_votes = mysqli_num_rows($vote_result);


                                            $count_sql = "SELECT * FROM votes WHERE  `secgen_id` != 0 ";
                                            $vote_count = mysqli_query($dbconnect, $count_sql);

                                                   
                                            $total_count = mysqli_num_rows($vote_count);


                                             $count = ceil(($total_votes/$total_count)*100);





                                         
                                                 


                                             ?>

                                            
                              <div class="panel ">
                                  <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                                         </div>
                                         <div class="panel2">
                                                 
                                        <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span>
                                         </div>
                                         <div class="panel3">
                                                 
                                                 <span class="counter sales-sts-ctn"><?php echo "$count"; ?>%</span>
                                                  </div>
                                 
                        
                                      

                            <?php } ?>
                                         </div>
                        
                    </div>
                            
                    </div>
          
                          
                    </div>
                        
                        </div>
                                
                        </div>




                    <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                    

        <!---- Academics-->

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            
        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h3 class="text-left text-uppercase"><b>Academics Secretary</b></h3>
                     <hr/>
                      
                     <div class="panel01 ">
                                  <h4 ><b>Candidate's Name</b></h4>
                                         </div>
                                         <div class="panel02">
                                                 
                                        <span >Votes</span>
                                         </div>
                                         <div class="panel03">
                                                 
                                        <span >%</span>
                                         </div>
                                         <hr/>
                      
                            <?php
                            
                             $try_sql = "SELECT `acad_id`, count(acad_id) as max FROM votes group by acad_id order by max desc limit 1  ";

                             $try_result = mysqli_query($dbconnect, $try_sql);

                                             //3. Fetch association.
                             $try_details = mysqli_fetch_all($try_result, MYSQLI_ASSOC);
                             foreach($try_details as $votes){
                               
                             $leadid = $votes['acad_id'];
                             }


                                ?>
                        <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 3 AND election_id = 1  ";

                                                            //2. Execute 
                                        $result = mysqli_query($dbconnect, $sql);

                                                            //3. Fetch association.
                                         $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        // $presidents = rsort($president);

                                         foreach($presidents as $presi){
                                            $user_id = $presi['user_id'];
                                            $candidate_id = $presi['id'];

                                            $user_sql = "SELECT * FROM user WHERE  `id` = $user_id ";

                                            $user_result = mysqli_query($dbconnect, $user_sql);

                                                            //3. Fetch association.
                                            $user_details = mysqli_fetch_assoc($user_result);
                                           // $user_details = rsort($user_detail);
                                            $firstname = $user_details['firstname'];
                                            $surname = $user_details['surname'];

                                            $result_sql = "SELECT * FROM votes WHERE  `acad_id` = $candidate_id ";
                                            $vote_result = mysqli_query($dbconnect, $result_sql);

                                                   
                                            $total_votes = mysqli_num_rows($vote_result);

                                            $count_sql = "SELECT * FROM votes WHERE  `acad_id` != 0 ";
                                            $vote_count = mysqli_query($dbconnect, $count_sql);

                                                   
                                            $total_count = mysqli_num_rows($vote_count);


                                             $count = ceil(($total_votes/$total_count)*100);





                                         
                                                 


                                             ?>

                                            
                              <div class="panel ">
                                  <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                                         </div>
                                         <div class="panel2">
                                                 
                                        <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span>
                                         </div>
                                         <div class="panel3">
                                                 
                                                 <span class="counter sales-sts-ctn"><?php echo "$count"; ?>%</span>
                                                  </div>
                                 
                        
                                      

<?php } ?>
                                         </div>
                        
                    </div>
             







        <!------Sports-->




        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            
        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h3 class="text-left text-uppercase"><b>Entertainment and Sports</b></h3>
                     <hr/>
                      
                     <div class="panel01 ">
                                  <h4 ><b>Candidate's Name</b></h4>
                                         </div>
                                         <div class="panel02">
                                                 
                                        <span >Votes</span>
                                         </div>
                                         <div class="panel03">
                                                 
                                        <span >%</span>
                                         </div>
                                         <hr/>
                      
                     <?php
                     
                             $try_sql = "SELECT `sports_id`, count(sports_id) as max FROM votes group by sports_id order by max desc limit 1  ";

                             $try_result = mysqli_query($dbconnect, $try_sql);

                                             //3. Fetch association.
                             $try_details = mysqli_fetch_all($try_result, MYSQLI_ASSOC);
                             foreach($try_details as $votes){
                               
                             $leadid = $votes['sports_id'];
                             }

                                ?>
                        <?php
                                      $sql = "SELECT * FROM candidates WHERE  `position_id` = 4 AND election_id = 1  ";

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

                                            $result_sql = "SELECT * FROM votes WHERE  `sports_id` = $candidate_id ";
                                            $vote_result = mysqli_query($dbconnect, $result_sql);

                                                   
                                            $total_votes = mysqli_num_rows($vote_result);




                                            $count_sql = "SELECT * FROM votes WHERE  `sports_id` != 0 ";
                                            $vote_count = mysqli_query($dbconnect, $count_sql);

                                                   
                                            $total_count = mysqli_num_rows($vote_count);


                                             $count = ceil(($total_votes/$total_count)*100);





                                         
                                                 


                                             ?>

                                            
                              <div class="panel ">
                                  <h4 class="text-left text-uppercase"><b><?php echo "$firstname $surname"; ?></b></h4>
                                         </div>
                                         <div class="panel2">
                                                 
                                        <span class="counter sales-sts-ctn"><?php echo "$total_votes"; ?></span>
                                         </div>
                                         <div class="panel3">
                                                 
                                                 <span class="counter sales-sts-ctn"><?php echo "$count"; ?>%</span>
                                                  </div>
                                 
                        
                                      

<?php }?>
                                         </div>
                        
                    </div>
              
                                        



       

        
        
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
											<!-- <div class="breadcomb-ctn">
												<h2>Detailed Results</h2>
												<p >Click the button to view detailed results</span></p>
											</div>  -->
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<a href="Results_Details.php">
                                                <button data-toggle="tooltip" data-placement="left" title="View Detailed Results" class="btn">
                                                    <i class="icon nalika-download"></i></button>
                                         </a>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>