<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/home/index.latte */
final class Templatebf85674c05 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/home/index.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('css', get_defined_vars()) /* line 3 */;
		$this->renderBlock('content', get_defined_vars()) /* line 4 */;
		$this->renderBlock('js', get_defined_vars()) /* line 43 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../../main.latte';
		return get_defined_vars();
	}


	/** {block title} on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 2 */;
	}


	/** {block css} on line 3 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block content} on line 4 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class=\'page\'>
    <div class=\'transparent\'>
        <div class=\'card\'>

            <!-- Card Header -->
            <div class=\'card-header\'>
                <button id=\'back\'><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 12 */;
		echo '</div>
                <button class=\'card-option-btn\' data-model=\'buttonopsi\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>
            <div class=\'card-opsi\'>
                <button onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 16 */;
		echo '/\'><i class=\'las la-pen\'></i> <span>Edit</span></button>
                <form method=\'post\' id=\'formHapus\' name=\'formHapus\' onSubmit=\'return hapus()\'>
                    <input type=\'hidden\' id=\'__info\' name=\'__info\' value=\'\'>
                    <input type=\'hidden\' id=\'__token\' name=\'__token\' value=\'';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 19 */;
		echo '\'>
                    <input type=\'hidden\' id=\'__url\' name=\'__url\' value=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 20 */;
		echo '\'>
                    <input type=\'hidden\' id=\'id\' name=\'id\' value=\'';
		echo LR\Filters::escapeHtmlAttr($id) /* line 21 */;
		echo '\'>
                    <input type=\'hidden\' id=\'__tb\' name=\'__tb\' value=\'\'>
                    <input type=\'hidden\' id=\'__method\' name=\'__method\' value=\'DELETE\'>
                    <button><i class=\'las la-trash\'></i> <span>Hapus</span></button>
                </form>
            </div>

            <!-- Card Body -->
            <div class=\'card-body\'>
                <div class=\'empty\'>
                    <div>
                        <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 32 */;
		echo '/assets/img/banner.png\'>
                        <label>Page Home</label>
                        <div><small>Ini tampilan default dari page home</small></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
';
	}


	/** {block js} on line 43 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
