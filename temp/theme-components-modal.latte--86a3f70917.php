<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\templates\theme\components\modal.latte */
final class Template86a3f70917 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\templates\\theme\\components\\modal.latte';

	public const Blocks = [
		['modal' => 'blockModal'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class=\'modal\' id="modalprofile">
    <div class="modal-box" id="modalboxprofile"></div>
    <div class="profile">
        <div class="top">
            <label>Ganti Photo</label>
            <button class="close" id="modalclose"><i class="las la-times"></i></button>
        </div>
        <div class="photo"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url . $photo)) /* line 8 */;
		echo '" id="pp2"></div>
        <div class="form">
            <form method="post" id="formPhoto" name="formPhoto">
                <div class="grup">
                    <div>Pilih Photo..</div>
                </div>
                <input type="hidden" id="__url" name="__url" value="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 14 */;
		echo '">
                <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 15 */;
		echo '">
                <input type="hidden" id="__method" name="__method" value="PATCH">
                <input type=\'file\' id="photo" name="photo" onChange="return gantiPhoto()">
            </form>
            <form method="post" id="formHapusPhoto" name="formHapusPhoto" onSubmit="return hapusPhoto()">
                <input type="hidden" id="__photo" name="__photo" value="';
		echo LR\Filters::escapeHtmlAttr($photo) /* line 20 */;
		echo '">
                <input type="hidden" id="__url" name="__url" value="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 21 */;
		echo '">
                <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 22 */;
		echo '">
                <input type="hidden" id="__method" name="__method" value="DELETE">
                <button>Hapus Photo</button>
            </form>
        </div>
    </div>
</div>
';
		$this->renderBlock('modal', get_defined_vars()) /* line 29 */;
	}


	/** {block modal} on line 29 */
	public function blockModal(array $ʟ_args): void
	{
	}
}
