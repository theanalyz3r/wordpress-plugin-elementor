<table class="form-table">
    <tr class="qordoba-bulk" data-action="qordoba_pll_download_strings"
        data-timestamp="<?php print current_time( 'timestamp' ); ?>">
        <th>
            <button class="qordoba_request button button-primary"<?php print $version ? '' : ' disabled '; ?>><?php _e( 'Translate Strings', 'qordoba' ); ?></button>
            <img class="qordoba-loading" style="display: none;" src="<?php print admin_url( 'images/loading.gif' ); ?>">
        </th>
        <td>
			<?php if ( $version ): ?>

                <div class="qordoba-status" data-items="0"
                     style="position:relative; max-width:400px; border:solid 0px #cddc39;">
                    <div class="qordoba-info">
						<?php printf( __( 'Download site strings version: %d', 'qordoba' ), $version ); ?>
                    </div>
                    <div class="qordoba-progress"
                         style="position:absolute;left:0;top:0;bottom:0;width:0%;background:#cddc39;z-index:-1;"></div>
                </div>

			<?php else: ?>

				<?php printf( __( 'Please send site strings to Qordoba first (just click "Save Changes" on the <a href="%s">Strings Translations page</a>)', 'qordoba' ), admin_url( 'admin.php?page=mlang_strings' ) ); ?>

			<?php endif; ?>
        </td>
    </tr>
</table>
