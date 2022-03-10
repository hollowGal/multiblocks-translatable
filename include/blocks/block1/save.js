import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save() {
	return (
		<div { ...useBlockProps.save() }>
			<p>
				{ __(
					'Multiblocks Translatable block 1– hello from the saved content!',
					'multiblocks-translatable'
				) }
			</p>
		</div>
	);
}
