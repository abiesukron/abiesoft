<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\templates\theme\components\navbar.latte */
final class Template953165f4a7 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\templates\\theme\\components\\navbar.latte';

	public const Blocks = [
		['navbar' => 'blockNavbar'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('navbar', get_defined_vars()) /* line 1 */;
	}


	/** {block navbar} on line 1 */
	public function blockNavbar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<navbar>
    <div class="brand">
        <button id=\'toggle-menu\' class="toggle-menu"><i class="las la-bars"></i></button>
        <button class="logo" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 5 */;
		echo '">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 6 */;
		echo '/assets/img/logo.png">
        </button>
    </div>
    <div class="user-info">
        <button class="photo">
            <div><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url . $photo)) /* line 11 */;
		echo '" id="pp1"></div>
        </button>
        <div id="pp1-menu" class="menu">
            <div class=\'email\' id="emailArea1">';
		echo LR\Filters::escapeHtmlText($email) /* line 14 */;
		echo '</div>
            <div class=\'photo\'>
                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url . $photo)) /* line 16 */;
		echo '" id="pp3">
            </div>
            <div class="edit" id="editphoto"><i class="las la-pen"></i></div>
            <div class=\'nama\' id="namaArea1">';
		echo LR\Filters::escapeHtmlText($nama) /* line 19 */;
		echo '</div>
            <button onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 20 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 20 */;
		echo '/profile/@';
		echo LR\Filters::escapeHtmlAttr($username) /* line 20 */;
		echo '\'>Perbarui akunmu</button>
            <div class=\'button-grup\'>
                <button onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 22 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 22 */;
		echo '/seting\'><i class="las la-cog"></i><span>Seting</span></button>
                <button onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 23 */;
		echo '/logout"><i class="las la-sign-out-alt"></i><span>Logout</span></button>
            </div>
        </div>
    </div>
</navbar>
';
	}
}
