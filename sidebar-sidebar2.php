				<div id="sidebar1" class="col-md-3" role="complementary">
				
					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar2' ); ?>
					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="alert alert-message">
						
							<p><?php _e("Please activate some Widgets","wpbootstrap"); ?>.</p>
						
						</div>

					<?php endif; ?>

				</div>
