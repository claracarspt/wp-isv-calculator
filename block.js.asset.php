<?php
/**
 * Dependency + version manifest for block.js (referenced by block.json editorScript "file:./block.js").
 * WordPress reads this to enqueue the editor script's dependencies in the right order.
 */
return array(
	'dependencies' => array(
		'wp-blocks',
		'wp-element',
		'wp-block-editor',
		'wp-components',
		'wp-server-side-render',
	),
	'version' => '1.0.0',
);
