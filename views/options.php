<div class="wrap">
    <h1><?php _e( 'Qordoba Settings', 'qordoba' ); ?></h1>
	<?php settings_errors(); ?>

    <form method="post" action="options.php">
		<?php settings_fields( 'qordoba_options_group' ); ?>
		<?php wp_nonce_field( 'qordoba_send_bulk', 'qor_nonce' ); ?>

		<?php do_settings_sections( 'qordoba' ); ?>
		<?php submit_button(); ?>
    </form><!--action#options.php -->

    <h2><?php _e( 'Send/download multiple translations', 'qordoba' ); ?></h2>

    <table class="form-table">
        <tr class="qordoba-bulk" data-action="qordoba_send_bulk"
            data-timestamp="<?php print current_time( 'timestamp' ); ?>">
            <th>
                <button class="qordoba_request button button-primary"<?php print $has_updated_content ? '' : ' disabled '; ?>><?php _e( 'Send Content', 'qordoba' ); ?></button>
                <img class="qordoba-loading" style="display: none;"
                     src="<?php print admin_url( 'images/loading.gif' ); ?>">
            </th>
            <td>
				<?php if ( $has_updated_content ): ?>

                    <div class="qordoba-status" data-items="<?php print $updated_posts + $updated_terms; ?>"
                         style="position:relative; max-width:400px; border:solid 0px #cddc39;">
                        <div class="qordoba-info">
							<?php printf( __( 'Pending content: %1$d (%2$d posts, %3$d terms)', 'qordoba' ), $updated_posts + $updated_terms, $updated_posts, $updated_terms ); ?>
                        </div>
                        <div class="qordoba-progress"
                             style="position:absolute;left:0;top:0;bottom:0;width:0%;background:#cddc39;z-index:-1;"></div>
                    </div>

				<?php else: ?>

					<?php _e( 'There is no content ready to be uploaded', 'qordoba' ); ?>

				<?php endif; ?>
            </td>
        </tr>
        <tr class="qordoba-bulk" data-action="qordoba_download_bulk"
            data-timestamp="<?php print current_time( 'timestamp' ); ?>">
            <th>
                <button class="qordoba_request button button-primary"<?php print $has_queued_content ? '' : ' disabled '; ?>><?php _e( 'Receive Content', 'qordoba' ); ?></button>
                <img class="qordoba-loading" style="display: none;"
                     src="<?php print admin_url( 'images/loading.gif' ); ?>">
            </th>
            <td>

				<?php if ( $has_queued_content ): ?>

                    <div class="qordoba-status" data-items="<?php print $queued_posts + $queued_terms; ?>"
                         style="position:relative; max-width:400px; border:solid 0px #cddc39;">
                        <div class="qordoba-info">
							<?php printf( __( 'Pending content: %1$d (%2$d posts, %3$d terms)', 'qordoba' ), $queued_posts + $queued_terms, $queued_posts, $queued_terms ); ?>
                        </div>
                        <div class="qordoba-progress"
                             style="position:absolute;left:0;top:0;bottom:0;width:0%;background:#cddc39;z-index:-1;"></div>
                    </div>

				<?php else: ?>

					<?php _e( 'There is no content with pending translations', 'qordoba' ); ?>

				<?php endif; ?>
            </td>
        </tr>
    </table>

	<?php do_action( 'qordoba_after_options_extra' ); ?>
</div><!--div.wrap-->
