const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

const path = require('path');
module.exports = {
	...defaultConfig,
	entry: {
		'block1/block1': '/include/blocks/block1',
		'block2/block2': '/include/blocks/block2',
		'blockdynamic/blockdynamic': '/include/blocks/blockdynamic'
	},
	output: {
		path: path.resolve(__dirname, 'build'),
		filename: '[name].js'
	}
};