import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import xmas from './assets/image.png';

import './editor.scss';
export default function Edit() {
	return (
		<div { ...useBlockProps() }>
			<p >
				
				{ __(
					'Block 2 – hello from the editor!',
					'multiblocks-translatable'
				) }
			</p>
			<img src={xmas} alt="xmas picture" />
		</div>
	);
}
