<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-lg-12 clearfix" role="main">
                    				
					<div class="page-header">
                    <h1>Podcasts</h1>
                    </div>
                    <section>
                    <p>
                        "The Rapcast" has been a staple of Raptors Republic for years.  Raptors Republic runs four podcasts.
                    </p>
                    <ul>
                        <li><strong>Raptors Weekly:</strong> Airs every Monday and hosted by Zarar Siddiqi, RW covers the week that was and what's ahead.</li>
                        <li><strong>Raptors Weekly Extra:</strong> Airs every Friday featuring Blake Murphy and William Lou, RWX takes a broader perspective of events including insights from Blake who covers the Raptors like none other.</li>
                        <li><strong>Talking Raptors:</strong> Airs mid-week during the season and hosted by Barry Taylor and Nick Reynoldson, TR is the best Raptors culture podcast on the planet.</li>
                        <li><strong>The Doctor Is In:</strong> Airs occasionally before the All-Star break and hosted by Steve Gennaro, episodes ramp up as the draft gets relevant.  Features the Worldwide Roundtable and focuses on college basketball.</li>
                    </ul>
                    You can listen by subscribing to the <a href="https://itunes.apple.com/ca/podcast/raptors-republic-rapcast/id736333342">iTunes feed</a>, checking out the <a href="https://soundcloud.com/raptorsrepublic">Soundcloud channel</a>, listening on <a href="http://www.stitcher.com/podcast/raptors-republic/the-raptors-republic-rapcast">Stitcher Radio on Android</a>, or any other of your favorite ways.  The podcast is searchable on all mobile apps.
                    </section>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3 class="heading">Raptors Weekly</h3>
                            <?php display_podcast_list('posts_per_page=10&cat=573&tag=raptors-weekly');?>                       
                        </div>
                         <div class="col-lg-3">
                            <h3 class="heading">Raptors Weekly Extra</h3>
                            <?php display_podcast_list('posts_per_page=10&cat=573&tag=raptors-weekly-extra');?>                       
                        </div>
                        <div class="col-lg-3">
                            <h3 class="heading">Talking Raptors</h3>
                            <?php display_podcast_list('posts_per_page=10&cat=573&tag=talking-raptors');?>                       
                        </div>
                       <div class="col-lg-3">
                            <h3 class="heading">The Doctor Is In</h3>
                            <?php display_podcast_list('posts_per_page=10&cat=573&tag=the-doctor-is-in');?>                       

                        </div>

                    </div>
				</div> <!-- end #main -->
			</div> <!-- end #content -->
            <script>
<?php get_footer(); ?>
