<?php require_once ROOT. '/views/layouts/header.php';?>

    <!-- Container -->
    <div id="cnt">

        <!-- Left Container -->
        <div id="lcnt">

            <!-- Post -->
            <div class="post">

                <!-- Post Details -->
                <div class="post_inf">

                    <span>October 13</span><br />
                    <span class="posn">Author</span><br />
                    <span class="posc">3 Comments</span>

                </div>

                <!-- Post Title - Permalink -->
                <h1>
                    <a href="#"><?=$news['name'];?></a>
                </h1>

                <!-- Post Content -->
                <img src="/template/images/art_pic1.jpg" alt="art_pic1" />

                <p><?=$news['description'];?></p>

            </div>

            <h2>
                <a href="#">3 comments</a>
            </h2>

            <!-- Comments -->
            <div class="comments">

                <!-- Comment -->
                <div class="comment">

                    <div class="comm_hdr">
                        <p>1. Persia Emily <span> | February 20, 2009 04:33</span></p>
                    </div>

                    <div class="avat">
                        <img src="/template/images/avatar.jpg" alt="avatar" />
                        <img src="/template/images/avatar_frame.png" alt="avatar_frame" class="avatar_frame" />
                    </div>

                    <p class="comm_txt">
                        How excited I am! Coquette Part4 comes out!<br />
                        I love Dryicons' products very much! <br />
                        <br />
                        They're all good!
                    </p>

                </div>

                <!-- Comment -->
                <div class="comment">

                    <div class="comm_hdr">
                        <p>2. spyece <span> | February 27, 2009 09:43</span></p>
                    </div>

                    <div class="avat">
                        <img src="/template/images/avatar.jpg" alt="avatar" />
                        <img src="/template/images/avatar_frame.png" alt="avatar_frame" class="avatar_frame" />
                    </div>

                    <p class="comm_txt">
                        Please realease more of such, these icon rocks, thanks a lot for these.
                    </p>

                </div>

                <!-- Comment -->
                <div class="comment">

                    <div class="comm_hdr">
                        <p>3. Keith D <span> | April 15, 2009 04:25</span></p>
                    </div>

                    <div class="avat">
                        <img src="/template/images/avatar.jpg" alt="avatar" />
                        <img src="/template/images/avatar_frame.png" alt="avatar_frame" class="avatar_frame" />
                    </div>

                    <p class="comm_txt">
                        Superb colours... some of the icons can be used for lots of things.<br />
                        I've used them to brighten up my website, and make it look as though I know what I'm doing. Can't praise you enough.
                    </p>

                </div>

            </div>

            <h2>Post your comments</h2>

            <!-- Comment Form -->
            <form id="cmnt_frm" method="post" action="">
                <p><input type="text" name="author" size="22" tabindex="1" id="author"/><label>Name <span>(required)</span></label></p>
                <p><input type="text" name="email" size="22" tabindex="2" id="email"/><label>Mail <span>(will not be published) (required)</span></label></p>
                <p><input type="text" name="url" size="22" tabindex="3" id="url"/><label>Website</label></p>
                <p>
                    <textarea name="comment" cols="65" rows="10" tabindex="4" id="comment"></textarea>
                </p>
                <p>
                    <input type="submit" name="submit" value="Post comment" tabindex="5" id="submit"/>
                </p>

            </form>

        </div>

        <!-- Right Container -->
        <div id="rcnt">
            <div class="rss_twitt">
                <!-- RSS Box -->
                <a href="http://feeds.feedburner.com/DryIconsFreeGraphics" class="rss"><img height="26" width="88" alt="" style="border: 0pt none ;" src="http://feeds.feedburner.com/~fc/DryIconsFreeGraphics?bg=DEDEDC&amp;fg=444444&amp;anim=0"/></a>
                <!-- Twitter Counter Box -->
                <script type="text/javascript" language="JavaScript" src="http://twittercounter.com/embed/dryicons/444444/DEDEDE"></script>
            </div>

            <h2>Category</h2>
            <?php foreach ($categories as $category ):?>
            <a class="pop_posts" href="/category/<?=$category['id'];?>"><?=$category['name'];?></a>
    <?php endforeach;?>



            <!-- Popular Wallpapers -->
            <h2>Popular Wallpapers</h2>

            <a class="wall" href="#"><img src="/template/images/pop_wall1.jpg" alt="pop_wall_1" /></a>
            <a class="wall" href="#"><img src="/template/images/pop_wall2.jpg" alt="pop_wall_2" /></a>

            <!-- Popular Posts -->


        <br style="clear: both;"/>

    </div>

</div>

<?php require_once ROOT. '/views/layouts/footer.php'; ?>