<?php  
    $conn_id=4;
    require '../connect.php';
    $limit = 6;
    /*GET THE CURRENT PAGE NUM FROM GET LINK*/
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;

    $count = 1;
    /*FETCH REVIEWS WITHIN LIMIT*/
    $sql = "SELECT * FROM feedback WHERE prod_id = $_GET[prod_id] LIMIT $start_from, $limit";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $user_id= $row["user_id"];
        $user_rating= $row["rating"];                    
        $user_review= $row["feedback"];

        /*TRUNCATING THE REVIEW*/
        $review = strip_tags($user_review);
        if (strlen($user_review) > 350) {
            // truncate string
            $stringCut = substr($user_review, 0, 500);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $review = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $review .= '... <a href="#" id="review_more" data-toggle="modal" data-target="#review_more_modal'.$count.'">Read More</a>';
        }

        /*GENERATING STARS*/
        $filled= "";
        $not_filled = "";
        for($i=1;$i<=5;$i++)
        {
            if($i<=$user_rating)
            {
                $filled = $filled."<li><img src='../assets/star_filled.svg' width=20px height=20px></li>";
            }
            else
            {
                $not_filled = $not_filled."<li><img src='../assets/star.svg'' width=20px height=20px></li>";
            }
        }

        $review_print = <<<EOT
        <div class="row">
            <p style="margin-left:15px;margin-right:0px;margin-top:0px;margin-bottom:0px;padding:0px; font-weight:600; font-size:18px;">$user_id</p>
            <div class="col-md-8">
                <ul class="user_reviews_rating" style="margin:0px;padding:0px;">
                    $filled
                    $not_filled
                </ul>                    
            </div>
        </div>
        <div class="row" style="margin-top:25px;">
            <div class="col-md-12">                            
                <p>$review</p>
            </div>

            <!--USER REVIEW MODAL-->
            <div class="modal fade" id="review_more_modal$count" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="title">$user_id</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <div class="modal-body">
                        $user_review
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
EOT;
        echo $review_print;
        $count++;
    }                    
    ?>