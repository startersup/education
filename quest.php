<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="/">
    <title>Engineering Kit</title>
    <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/comment.css">
    <script src="./assets/js/sidenav.js"></script>
   
</head>

<body>
    <section class="main" id="main">
        <div class="container1">
            <div class="row">
                <div class="col-md-10">
                    <div class="Education">
                        <br>
                        <div class="card topping">
                            <h3><i class="fa fa-star" aria-hidden="true"></i> <?php echo $_GET["sub"]; ?> </h3>
                            <hr>
                            <div id="preloader">
                                <div id="status">&nbsp;</div>
                            </div>
                            <div id="load">
                                 <?php
                                     $count =preg_replace('#[^0-9]#', '', $_GET['page']);
                                     $lim=5*$count;
                                     $cat=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['cat']));
                                     $sub=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['sub']));
                                     $sql="select question,op1,op2,op3,op4,appeared from questions where category='".$cat."'AND sub='".$sub."' LIMIT ".$lim.",5";
                                     $query=mysqli_query($conn,$sql);
                                     $i=1;
                                     $cat=preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['cat']);
                                     $sub=preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['sub']);
                                    while($row = mysqli_fetch_assoc($query)) {
                                        $qns=str_replace(' ','-',$row['question']);
                                     echo "<div class='question'><p>".$i.") ".$row['question']."</p>
                                    <ul>
                                        <li>A) ".$row['op1']."</li>
                                        <li>B) ".$row['op2']."</li>
                                        <li>C) ".$row['op3']."</li>
                                        <li>D) ".$row['op4']."</li>
                                    </ul>
                                    <a href='topic.php?cat=".$cat."&sub=".$sub."&qns=".$qns."'><button class='btn btn-success'>View Answer</button></a>
                                    <div class='display'><span>Asked in ".$row['appeared']."</span> 
                                </div></div>
                                <hr>"; $i++;}
                               $cat=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['cat']));
                               $sub=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['sub']));
                                $sql="select question,op1,op2,op3,op4,appeared from questions where category='".$cat."'AND sub='".$sub."'";
                                $query=mysqli_query($conn,$sql);
                                $numrows=mysqli_num_rows($query);
                                if($numrows<=(($count+1)*5)&&$count!=0)
                                {
                                    $c=$count-1;
                                    echo "<center><a href='quest.php?cat=Quantitative-Ability&sub=Number-Systems&page=".$c."'><button class='btn btn-success'>Prev</button></a>";
                                }
                                else{
                                if($count>0){
                                    $c=$count-1;
                                echo "<center><a href=quest.php?cat=Quantitative-Ability&sub=Number-Systems&page=".$c."><button class='btn btn-success'>Prev</button></a>" ;
                                $c=$count+1;
                                echo"<a href=quest.php?cat=Quantitative-Ability&sub=Number-Systems&page=".$c."><button class='btn btn-success'>Next</button></a></center>";}
                                else if(!($numrows<=(($count+1)*5)))
                                { $c=$count+1;
                                    echo "<center><a href='quest.php?cat=Quantitative-Ability&sub=Number-Systems&page=".$c."'><button class='btn btn-success'>Next</button></a>";} }?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-xs">
                    <div class="card fixed container">
                        <h4>Interested</h4>
                        <br>
                        <p>#Placements</p>
                        <br>
                        <p>#symposium</p>
                        <br>
                        <p>#conference</p>
                        <br>
                        <p>#presentation</p>
                        <br>
                        <p>#Culturals</p>
                        <br>
                        <p>#intercollege</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        li {
            list-style-type: none;
            font-size: 15px;
            padding:10px 0px;
            font-family: Roboto, sans-serif;
        }
        .fa-comment {
            margin-top: 10px;
            font-size: 14px;
        }
        .comment {
            font-family: Roboto, sans-serif;
            margin-top: 10px;
            font-size: 14px;
        }
        @media screen and (max-width: 600px) {
            .card {
                transition: 0.3s;
                width: 100%;
                z-index: -1000;
                background-color: #ffffff;
                padding: 5px;
                margin-top: 10px;
            }
            li {
                list-style-type: none;
                font-size: 15px;
                padding:10px 0px;
                font-family: Roboto, sans-serif;
            }
            .container1 {
                margin: 0px !important;
            }
        }
    </style>
</body>

</html>