<?php ob_start();error_reporting(0);require "cw_admin/lib/config.php";?>

<?php include('comments-functions.php'); ?>

<!DOCTYPE html>

<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    <?php include('header.php'); ?>

    <style>
        form button { margin: 5px 0px; }
        textarea { display: block; margin-bottom: 10px; }
        /*post*/
        .post { border: 1px solid #ccc; margin-top: 10px; }
        /*comments*/
        .comments-section { margin-top: 10px; border: 1px solid #ccc; }
        .comment { margin-bottom: 10px; }
        .comment .comment-name { font-weight: bold; }
        .comment .comment-date {
            font-style: italic;
            font-size: 0.8em;
        }
        .comment .reply-btn, .edit-btn { font-size: 0.8em; }
        .comment-details { width: 91.5%; float: left; }
        .comment-details p { margin-bottom: 0px; }
        .comment .profile_pic {
            width: 35px;
            height: 35px;
            margin-right: 5px;
            float: left;
            border-radius: 50%;
        }
        /*replies*/
        .reply { margin-left: 30px; }
        .reply_form {
            margin-left: 40px;
            display: none;
        }
        #comment_form { margin-top: 10px; }

        .error {
            font-family: sans-serif;
            color: #E70000;
            font-size: 16px;
        }
    </style>


    <body>
        <?php include('nav.php'); ?>

        <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_1.jpg)"
                 data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                            <h1 class="probootstrap-heading probootstrap-animate">Comments<span>Together we can make a difference</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 probootstrap-animate">

                        <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
                        <form method="post" id="comment_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                              class="clearfix probootstrap-form">
                            <div class="probootstrap-cause-inner probootstrap-cause" >
                                <h3>Leave a Comment</h3>
                            </div>
                            <div class="error" id="error_comment"></div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" maxlength="100" id="name" name="name" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="message">Comment</label>
                                <textarea cols="30" rows="3" maxlength="1000" class="form-control" name="comment_text" id="comment_text"  name="comment_text" id="comment_text" required="required" ></textarea>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary" id="submit_comment" name="sub" >Submit Comment</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <!-- Display total number of comments on this post  -->
                    <h2><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h2>
                    <hr>

                    <!-- comments wrapper -->
                    <div id="comments-wrapper">
                        <?php if (isset($comments)): ?>
                            <!-- Display comments -->
                            <?php foreach ($comments as $comment): ?>

                                <!-- comment -->
                                <div class="comment clearfix">
                                    <div class="comment-details panel panel-default">
                                        <div class="panel-heading">
                                            <span class="comment-name">By <?php echo $comment['name'] ?> On </span>
                                            <span class="comment-date"><?php echo date("M j, Y h:i A", strtotime($comment["created_at"])); ?></span>
                                        </div>
                                        <div class="panel-body"><p><?php echo $comment['body']; ?></p></div>
                                        <div class="panel-footer" align="right">
                                            <a class="btn btn-primary reply-btn"  href="#" data-id="<?php echo $comment['guid']; ?>"  >Reply</a>
                                        </div>
                                    </div>
                                    <!-- reply form -->

                                    <form action="comments.php"  class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['guid'] ?>" data-id="<?php echo $comment['guid']; ?>">
                                        <div class="col-md-6">
                                            <div class="error" id="error_reply_<?php echo $comment['guid'] ?>"></div>
                                            <label for="name">Full Name</label> <input type="text" class="form-control" id="name" name="name" required></input>
                                            <label for="email">Email</label> <input type="email" class="form-control" id="email" name="email" required></input>
                                            <label for="reply_text">Reply</label> <textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                                            <button class="btn btn-primary btn-xs pull-right submit-reply"  id="<?php echo $comment['guid'] ?>" >Submit reply</button>
                                        </div>
                                    </form>

                                    <!-- GET ALL REPLIES -->
                                    <?php $replies = getRepliesByCommentId($db, $comment['guid']) ?>

                                    <div class="replies_wrapper_<?php echo $comment['guid']; ?>">
                                        <?php if (isset($replies)): ?>
                                            <?php foreach ($replies as $reply): ?>
                                                <!-- reply -->
                                                <div class="comment reply clearfix">

                                                    <div class="comment-details panel panel-default">
                                                        <div class="panel-heading">
                                                            <span style="color: #269abc" class="comment-name">By <?php echo $reply['name'] ?> On </span>
                                                            <span class="comment-date"><?php echo date("M j, Y h:i A", strtotime($reply["created_at"])); ?></span>
                                                        </div>
                                                        <div class="panel-body"><p><?php echo $reply['body']; ?></p></div>
                                                        <div class="panel-footer" align="right">
                                                            <a class="btn btn-primary reply-btn" href="#" data-id="<?php echo $reply['guid'] ?>" >reply</a>
                                                        </div>
                                                    </div>

                                                    <!-- reply form -->
                                                    <form action="comments.php"  class="reply_form clearfix"
                                                          id="comment_reply_form_<?php echo $reply['guid'] ?>" data-id="<?php echo $reply['guid']; ?>">
                                                        <div class="col-md-6">
                                                            <div class="error" id="error_reply_<?php echo $reply['guid'] ?>"></div>
                                                            <label align="left" for="name">Full Name</label> <input type="text" class="form-control" id="name" name="name" required></input>
                                                            <label align="left" for="email">Email</label> <input type="email" class="form-control" id="email" name="email" required></input>
                                                            <label align="left" for="reply_text">Reply</label> <textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                                                            <button class="btn btn-primary btn-xs pull-right submit-reply" id="<?php echo $reply['guid'] ?>"  >Submit reply</button>
                                                        </div>
                                                    </form>
                                                    <div class="replies_wrapper_<?php echo $reply['guid'] ?> ">
                                                        <?php $output = get_inner_replies_comment($db, $reply['guid']);
                                                        echo $output; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>

                                </div>
                                <!-- // comment -->
                            <?php endforeach ?>
                        <?php else: ?>
                            <h2>Be the first to comment on this post</h2>
                        <?php endif ?>
                    </div><!-- comments wrapper -->
                </div>
            </div>
        </section>

        <?php include('footer.php'); ?>

        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/comments.js"></script>

    </body>
</html>