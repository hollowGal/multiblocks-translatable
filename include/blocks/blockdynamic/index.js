import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import './style.scss';

import Edit from './edit';
import save from './save';
import json from './block.json';

const { name, title, description, textdomain, ...settings } = json;
registerBlockType( name, {
	...settings,
	textdomain: "multiblocks-translatable",
	title: __( "Multiblocks Translatable dynamic block.", "multiblocks-translatable" ),
	description: __("Example of dynamic block scaffolded with Create Block tool, made multiblock and translatable.", "multiblocks-translatable" ),
	edit: Edit,
	save,
} );
