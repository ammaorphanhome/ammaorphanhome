<?php ob_start();error_reporting(0);require "cw_admin/lib/config.php";?>

<?php

    // Get all comments from database
    $sth = $db->query("SELECT * FROM `comments` ORDER BY created_at DESC limit 100");
    $comments = $sth->fetchAll();

    // Receives a comment id and returns the username
    function getRepliesByCommentId($db, $id)
    {
        $sth = $db-> query("SELECT * FROM `replies` WHERE `comment_guid` = '$id' order by `guid` desc");
        $replies = $sth-> fetchAll();
        return $replies;
    }

    // Returns the total number of comments on that post
    function getCommentsCountByPostId($db)
    {
        $sth = $db-> query("SELECT COUNT(*) AS total FROM `comments`");
        $row = $sth-> fetch();
        return $row['total'];
    }

    function get_inner_replies_comment($db, $parent_id = 0)
    {
        $query = "SELECT * FROM `replies` WHERE `comment_guid` = '$parent_id' order by `guid` desc";
        $sth = $db-> query($query);
        $count = $sth-> rowCount();
        
        $output = '';
        
        if ($count > 0) {
            while ($row = $sth->fetch()) {
                    $output .= '                     
                        <div class="comment reply clearfix">
                                <div class="comment-details panel panel-default">
                                    <div class="panel-heading">
                                        <span style="color: #269abc" class="comment-name">By ' . $row["name"] . ' On </span>
                                        <span class="comment-date">'.date("M j, Y h:i A", strtotime($row["created_at"])).'</span>
                                    </div>
                                    <div class="panel-body"><p>' . $row["body"] . '</p></div>
                                    <div class="panel-footer" align="right">
                                        <a class="btn btn-primary reply-btn" href="#" data-id="' . $row["guid"] . '" >reply </a>
                                    </div>
                                </div>
    
                                <!-- reply form -->
                                <form action="comments.php" data-id="'.$row["guid"].'" class="reply_form clearfix"
                                      id="comment_reply_form_'.$row["guid"].'">
                                      <div class="col-md-6">
                                        <div class="error" id="error_reply_'.$row["guid"].'"></div>
                                        <label for="name">Full Name</label><input type="text" class="form-control" id="name" name="name" required></input>
                                        <label for="email">Email</label> <input type="email" class="form-control" id="email" name="email" required></input>
                                        <label for="reply_text">Reply</label><textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                                        <button class="btn btn-primary btn-xs pull-right submit-reply" id="' . $row["guid"] . '"  >Submit reply</button>
                                      </div>  
                                </form>
                                <div  class="replies_wrapper_'.$row["guid"].'">';
                    $output .= get_inner_replies_comment($db, $row["guid"]);
                    $output .= '</div>';
                    $output .= '</div>';
            }
        }
        return $output;
    }

    
    // If the user clicked submit on comment form
    if (isset($_POST['submit_comment_index'])) {
        global $db;
        // grab the comment that was submitted through Ajax call
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment_text = $_POST['comment_text'];
        
        // insert comment into database
        $sql = "INSERT INTO `comments` (`name`, `email`, `body`, `created_at`, `updated_at`)
                    VALUES ('$name', '$email', '$comment_text', now(), null)";
        $sth = $db->query($sql);
        
        // Query same comment from database to send back to be displayed
        $inserted_id = $db->lastInsertId();
        $sth1 = $db-> query("SELECT * FROM `comments` WHERE `guid`='$inserted_id'");
        $inserted_comment = $sth1-> fetch();
        
        // if insert was successful, get that same comment from the database and return it
        if($sth == true) {
            $commentDiv = "
                <div class='comment clearfix'>
                    <div class='comment-details panel panel-default'>
                        <div class='panel-heading'>
                            <span class='comment-name'>By ". $inserted_comment['name']. " On</span>
                            <span class='comment-date'>" . date('M j, Y h:i A', strtotime($inserted_comment['created_at'])) . "</span>
                        </div>
                        <div class='panel-body'><p>" . $inserted_comment['body'] . "</p></div>
                    </div>
                </div>";
            
            $comment_info = array(
                'comment' => $commentDiv,
                'comments_count' => getCommentsCountByPostId($db)
            );
            echo json_encode($comment_info);
            exit();
        } else {
            echo "error";
            exit();
        }
    }
    
    
    
    
    // If the user clicked submit on comment form
    if (isset($_POST['comment_posted'])) {
        global $db;
        // grab the comment that was submitted through Ajax call
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment_text = $_POST['comment_text'];

        // insert comment into database
        $sql = "INSERT INTO `comments` (`name`, `email`, `body`, `created_at`, `updated_at`) 
                    VALUES ('$name', '$email', '$comment_text', now(), null)";
        $sth = $db->query($sql);

        // Query same comment from database to send back to be displayed
        $inserted_id = $db->lastInsertId();
        $sth1 = $db-> query("SELECT * FROM `comments` WHERE `guid`='$inserted_id'");
        $inserted_comment = $sth1-> fetch();

        // if insert was successful, get that same comment from the database and return it
        if($sth == true) {
            $commentDiv = "
                <div class='comment clearfix'>
                    <div class='comment-details panel panel-default'>
                        <div class='panel-heading'>
                            <span class='comment-name'>By ". $inserted_comment['name']. " On</span>
                            <span class='comment-date'>" . date('M j, Y h:i A', strtotime($inserted_comment['created_at'])) . "</span>
                        </div>    
                        <div class='panel-body'><p>" . $inserted_comment['body'] . "</p></div>
                        <div class='panel-footer' align='right'>
                            <a class='btn btn-primary reply-btn' href='#' data-id='" . $inserted_comment['guid'] . "'>reply</a>
                        </div>
                    </div>
                    
                    <!-- reply form -->
                    <form action='comments.php' class='reply_form clearfix' 
                        id='comment_reply_form_" . $inserted_comment['guid'] ."' data-id='" . $inserted_comment['guid'] . "'>
                        
                        <div class='col-md-6'>
                            <div class='error' id='error_reply_" . $inserted_comment['guid'] ."'></div>
                            <label for='name'>Full Name</label> <input type='text' class='form-control' id='name' name='name' required></input>
                            <label for='email'>Email</label> <input type='email' class='form-control' id='email' name='email' required></input>
                            <label for='reply_text'>Reply</label> <textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
                            <button class='btn btn-primary btn-xs pull-right submit-reply' id='" . $inserted_comment['guid'] . "'  >Submit reply</button>
                        </div>    
                    </form>
                    <div class='replies_wrapper_" . $inserted_comment['guid'] ."'></div>
                </div>";
            $comment_info = array(
                'comment' => $commentDiv,
                'comments_count' => getCommentsCountByPostId($db)
            );
            echo json_encode($comment_info);
            exit();
        } else {
            echo "error";
            exit();
        }
    }
    
    // If the user clicked submit on reply form...
    if (isset($_POST['reply_posted'])) {

        global $db;
        // grab the reply that was submitted through Ajax call
        $name = $_POST['name'];
        $email = $_POST['email'];
        $reply_text = $_POST['reply_text'];
        $comment_id = $_POST['comment_id'];

        $sth2 = $db-> query("SELECT * FROM `replies` WHERE `name`='$name' and `email` = '$email' and `body`='$reply_text'");
        $count = $sth2-> rowCount();
        if ($count > 0) {
            echo "duplicate";
            exit();
        } else {
            // insert reply into database
            $sql = "INSERT INTO `replies` (`comment_guid`, `name`, `email`, `body`, `created_at`, `updated_at`) 
                    VALUES ('$comment_id', '$name', '$email', '$reply_text', now(), null)";
            $sth = $db->query($sql);

            // Query same comment from database to send back to be displayed
            $inserted_reply_id = $db->lastInsertId();

            $sth1 = $db-> query("SELECT * FROM `replies` WHERE `guid`='$inserted_reply_id'");
            $inserted_reply = $sth1-> fetch();

            // if insert was successful, get that same reply from the database and return it
            if($sth == true) {
                $reply = "
                <div class='comment reply clearfix'>
                    
                    <div class='comment-details panel panel-default'>
                        <div class='panel-heading'>
                            <span style='color: #269abc' class='comment-name'>By ". $inserted_reply['name']. " On</span>
                            <span class='comment-date'>" . date('M j, Y h:i A', strtotime($inserted_reply['created_at'])) . "</span>
                        </div>    
                        <div class='panel-body'><p>" . $inserted_reply['body'] . "</p></div>
                        <div class='panel-footer' align='right'>
                            <a class='btn btn-primary reply-btn' href='#' data-id='" . $inserted_reply['guid'] . "'>reply</a>
                        </div>
                    </div>
                    
                    <!-- reply form -->
                    <form action='comments.php' class='reply_form clearfix' 
                        id='comment_reply_form_" . $inserted_reply['guid'] ."' data-id='" . $inserted_reply['guid'] . "'>

                        <div class='col-md-6'>
                            <div class='error' id='error_reply_" . $inserted_reply['guid'] ."'></div>
                            <label for='name'>Full Name</label> <input type='text' class='form-control' id='name' name='name' required></input>
                            <label for='email'>Email</label> <input type='email' class='form-control' id='email' name='email' required></input>
                            <label for='reply_text'>Reply</label> <textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
                            <button class='btn btn-primary btn-xs pull-right submit-reply' id='" . $inserted_reply['guid'] . "' >Submit reply</button>
                        </div>    
                    </form>
                    <div class='replies_wrapper_" . $inserted_reply['guid'] ."'></div>
                </div>";
                echo $reply;
                exit();
            } else {
                echo "error";
                exit();
            }
        }
    }
?>