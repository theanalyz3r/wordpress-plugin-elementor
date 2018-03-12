<div class="qordoba-custom-fields">

	<?php foreach ( $custom_fields as $i => $field ): ?>
        <p>
            <label>
                <input type="checkbox" name="<?php print $name; ?>"
                       value="<?php print $field; ?>" <?php checked( in_array( $field, $checked ) ); ?>>
				<?php print $field; ?>
            </label>
        </p>
	<?php endforeach; ?>

</div>
