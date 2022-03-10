import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';


import './editor.scss';
export default function Edit() {
	return (
		<div { ...useBlockProps() }>
			<p >
				
				{ __(
					'Multiblocks Translatable block 1– hello from the editor!',
					'multiblocks-translatable'
				) }
			</p>
		</div>
	);
}
