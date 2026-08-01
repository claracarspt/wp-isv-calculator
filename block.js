/* global window */
( function ( wp ) {
	var el = wp.element.createElement;
	var useBlockProps = wp.blockEditor.useBlockProps;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var PanelBody = wp.components.PanelBody;
	var SelectControl = wp.components.SelectControl;
	var RangeControl = wp.components.RangeControl;
	var ServerSideRender = wp.serverSideRender;

	wp.blocks.registerBlockType( 'claracars/isv-calculator', {
		edit: function ( props ) {
			var a = props.attributes;
			return el(
				'div',
				useBlockProps(),
				el(
					InspectorControls,
					{},
					el(
						PanelBody,
						{ title: 'Calculator settings', initialOpen: true },
						el( SelectControl, {
							label: 'Language',
							value: a.lang,
							options: [
								{ label: 'Português', value: 'pt' },
								{ label: 'English', value: 'en' },
								{ label: 'Русский', value: 'ru' },
								{ label: 'Українська', value: 'ua' }
							],
							onChange: function ( v ) { props.setAttributes( { lang: v } ); }
						} ),
						el( RangeControl, {
							label: 'Height (px)',
							value: a.height,
							min: 300,
							max: 900,
							onChange: function ( v ) { props.setAttributes( { height: v } ); }
						} )
					)
				),
				el( ServerSideRender, {
					block: 'claracars/isv-calculator',
					attributes: a
				} )
			);
		},
		save: function () {
			return null; // Server-rendered (render_callback).
		}
	} );
}( window.wp ) );
