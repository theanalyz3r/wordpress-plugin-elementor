<p>
	<?php printf( __( 'Version, submitted for translation: <strong>%d</strong>', 'qordoba' ), $source_version ); ?>
</p>

<p><?php _e( 'Saved versions of translations: ', 'qordoba' ); ?></p>

<p>
	<?php foreach ( $languages as $l ): ?>

        <label>
			<?php printf( '%s: <strong>%d</strong>', $l['name'], $l['version'] ); ?>

			<?php
			if ( ! $l['configured'] ) {
				_e( '(Not configured)', 'qordoba' );
			} elseif ( $l['version'] < $source_version ) {
				_e( '(Outdated)', 'qordoba' );
			}
			?>
        </label><br>

	<?php endforeach; ?>
</p>

<?php if ( $updated ): ?>
    <p><i><?php _e( 'Content was updated since last time it was sent to Qordoba.', 'qordoba' ); ?></i></p>
<?php endif; ?>
