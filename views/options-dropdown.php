<p>
    <label for="<?php print $name; ?>"><?php print $label; ?></label><br>

    <select id="<?php print $id; ?>" name="<?php print $name; ?>">

		<?php foreach ( $options as $option => $value ): ?>

            <option value="<?php print $value; ?>" <?php selected( $selected, $value ); ?>><?php print $option; ?></option>

		<?php endforeach; ?>

    </select>
</p>
