import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import xmas from './assets/image.png'

export default function save() {
	return (
		<div { ...useBlockProps.save() }>
			<p>
				{ __(
					'Block 2 – hello from the saved content!',
					'multiblocks-translatable'
				) }
			</p>
			<img src={xmas} alt="xmas picture" />
		</div>
	);
}
