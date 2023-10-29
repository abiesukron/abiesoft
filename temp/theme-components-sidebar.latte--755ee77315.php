<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\templates\theme\components\sidebar.latte */
final class Template755ee77315 extends Latte\Runtime\Template
{
	public const Blocks = [
		['sidebar' => 'blockSidebar'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('sidebar', get_defined_vars()) /* line 1 */;
	}


	/** {block sidebar} on line 1 */
	public function blockSidebar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="sidebar">
    <div class="block"></div>
    <div class="menu">
        <div class="top">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 6 */;
		echo '/assets/img/logo.png" style="cursor:pointer;" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 6 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 6 */;
		echo '/dashboard">
            <button class="close"><i class="las la-times"></i></button>
        </div>
        <hr class="no-margin">
        <ul>
            <li class="';
		if ($current == '') /* line 11 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 11 */;
		echo '/dashboard\'><i class="las la-chart-pie"></i><span>Dashboard</span></a></li>
            <label>Menu</label>
            <li class="sub ';
		if ($current == 'editor' || $current == 'berita' || $current == 'kategori') /* line 13 */ {
			echo 'active';
		}
		echo '">
                <a href=\'javascript:void(0)\' class="ic">
                    <span><i class="las la-file-alt"></i><span>Media Online</span></span>
                    <i class="las la-angle-right"></i>
                </a>
                <ul>
                    <li class="';
		if ($current == 'editor') /* line 19 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 19 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 19 */;
		echo '/editor\'><i class="las la-minus"></i><span>Editor</span></a></li>
                    <li class="';
		if ($current == 'berita') /* line 20 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 20 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 20 */;
		echo '/berita\'><i class="las la-minus"></i><span>Berita</span></a></li>
                    <li class="';
		if ($current == 'kategori') /* line 21 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 21 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 21 */;
		echo '/kategori\'><i class="las la-minus"></i><span>Kategori</span></a></li>
                </ul>
            </li>
            <li><a href=\'javascript:void(0)\'><i class="las la-list"></i><span>Kategori</span></a></li>
            <li><a href=\'javascript:void(0)\'><i class="las la-image"></i><span>Galeri</span></a></li>
            <li><a href=\'javascript:void(0)\'><i class="las la-qrcode"></i><span>QRCode</span></a></li>
            <li><a href=\'javascript:void(0)\'><i class="las la-envelope"></i><span>Email</span></a></li>
            <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 28 */;
		echo '/form\'><i class="lab la-wpforms"></i><span>Form</span></a></li>
            <label>Seting</label>
            <li class="sub">
                <a href=\'javascript:void(0)\' class="ic">
                    <span><i class="las la-tasks"></i><span>Data Pendukung</span></span>
                    <i class="las la-angle-right"></i>
                </a>
                <ul>
                    <li><a href=\'javascript:void(0)\'><i class="las la-minus"></i><span>Manajemen User</span></a></li>
                    <li><a href=\'javascript:void(0)\'><i class="las la-minus"></i><span>Manajemen Grup</span></a></li>
                </ul>
            </li>
        </ul>
        <div class="line"><hr class="no-margin"></div>
        <div class=\'bottom\'>
            <button class="seting" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 44 */;
		echo '/seting"><i class="las la-cog"></i></button>
            <div class="date">';
		echo LR\Filters::escapeHtmlText($hariini) /* line 45 */;
		echo '</div>
            <button class="logout" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 46 */;
		echo '/logout"><i class="las la-sign-out-alt"></i></button>
        </div>
    </div>
</div>
';
	}
}
