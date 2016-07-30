<?php require_once ROOT. '/views/layouts/header.php';?>

    <!-- Container -->
    <div id="cnt">

        <!-- Left Container -->
        <div id="lcnt">


            <!-- Post -->
            <div class="post">
                <?php foreach ($categoryNews as $news):?>
                    <!-- Post Details -->
                    <div class="post_inf">


                        <span>October 13</span><br />
                        <span class="posn">Author</span><br />
                        <span class="posc">6 Comments</span>

                    </div>

                    <!-- Post Title - Permalink -->
                    <h1>
                        <a href="/news/<?=$news['id'];?>"><?=$news['name'];?></a>
                    </h1>

                    <!-- Post Content -->
                    <img src="/template/images/post_pic2.jpg" alt="post_pic2" />
                    <p><?php echo $news['description'];?></p>

                <?php endforeach;?>
            </div>




            <!-- Pagination -->
            <div class="pagination">

                <span class="prev">&laquo;Previous</span>
                <span class="act">1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a class="next" href="#">Next&raquo;</a>

            </div>

        </div>

        <!-- Right Container -->
        <div id="rcnt">
            <div class="rss_twitt">
                <!-- RSS Box -->
                <a href="http://feeds.feedburner.com/DryIconsFreeGraphics" class="rss"><img height="26" width="88" alt="" style="border: 0pt none ;" src="http://feeds.feedburner.com/~fc/DryIconsFreeGraphics?bg=DEDEDC&amp;fg=444444&amp;anim=0"/></a>
                <!-- Twitter Counter Box -->
                <script type="text/javascript" language="JavaScript" src="http://twittercounter.com/embed/dryicons/444444/DEDEDE"></script>

            </div>

            <!-- Popular Posts -->
            <h2>Category</h2>
            <?php foreach ($categories as $category):?>
                <a class="pop_posts"
                   href="/category/<?php echo $category['id']; ?>
                   "class="<?php if ($categoryId == $category['id']) echo 'active';?>">
                    <?php echo $category['name'];?>
                </a>
            <?php endforeach;?>


            <!-- Sponsored Ads -->
            <h2>Sponsored Ads</h2>

            <div class="l_lnk">

                <a href="#"><img src="/template/images/sponsor_ads1.jpg" alt="spon_ad_1" /></a>
                <a href="#"><img src="/template/images/sponsor_ads2.jpg" alt="spon_ad_2" /></a>
                <a href="#"><img src="/template/images/sponsor_ads3.jpg" alt="spon_ad_3" /></a>
                <div>
                    <a target="_blank" href="http://dryicons.com/advertise/">Advertise Here</a>
                </div>

            </div>

            <!-- Popular Wallpapers -->
            <h2>Popular Wallpapers</h2>

            <a class="wall" href="#"><img src="/template/images/pop_wall1.jpg" alt="pop_wall_1" /></a>
            <a class="wall" href="#"><img src="/template/images/pop_wall2.jpg" alt="pop_wall_2" /></a>

            <!-- Popular Posts -->
            <h2>Popular Posts</h2>

            <a class="pop_posts" href="#">Logo Design Process Tutorial</a>
            <a class="pop_posts" href="#">Great use of pop music in great films</a>
            <a class="pop_posts" href="#">Icon design tutorial: How to make a Calendar icon</a>
            <a class="pop_posts" href="#">1st Anniversary and Graphics Giveaway Winners</a>
            <a class="pop_posts" href="#">Smashing Magazine and DryIcons collaboration</a>

        </div>

        <br style="clear: both;"/>

    </div>

    </div>

<?php require_once ROOT. '/views/layouts/footer.php'; ?>