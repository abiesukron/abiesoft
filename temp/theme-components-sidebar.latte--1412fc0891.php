<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\templates\theme\components\sidebar.latte */
final class Template1412fc0891 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\templates\\theme\\components\\sidebar.latte';

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
		if ($current == 'dashboard') /* line 11 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 11 */;
		echo '/dashboard\'><i class="las la-chart-pie"></i><span>Dashboard</span></a></li>
            <label>Untuk kamu</label>
            <li class="';
		if ($current == 'tugas') /* line 13 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 13 */;
		echo '/tugas\'><i class="las la-tasks"></i><span>Tugas</span></a></li>
            <label>Menu</label>
            <li class="sub ';
		if ($current == 'editor' || $current == 'berita' || $current == 'kategori') /* line 15 */ {
			echo 'active';
		}
		echo '">
                <a href=\'javascript:void(0)\' class="ic">
                    <span><i class="las la-file-alt"></i><span>Media Online</span></span>
                    <i class="las la-angle-right"></i>
                </a>
                <ul>
                    <li class="';
		if ($current == 'editor') /* line 21 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 21 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 21 */;
		echo '/editor\'><i class="las la-minus"></i><span>Editor</span></a></li>
                    <li class="';
		if ($current == 'berita') /* line 22 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 22 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 22 */;
		echo '/berita\'><i class="las la-minus"></i><span>Berita</span></a></li>
                    <li class="';
		if ($current == 'kategori') /* line 23 */ {
			echo 'active';
		}
		echo '"><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 23 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 23 */;
		echo '/kategori\'><i class="las la-minus"></i><span>Kategori</span></a></li>
                </ul>
            </li>
            <li><a href=\'javascript:void(0)\'><i class="las la-list"></i><span>Kategori</span></a></li>
            <li><a href=\'javascript:void(0)\'><i class="las la-image"></i><span>Galeri</span></a></li>
            <li><a href=\'javascript:void(0)\'><i class="las la-qrcode"></i><span>QRCode</span></a></li>
            <li><a href=\'javascript:void(0)\'><i class="las la-envelope"></i><span>Email</span></a></li>
            <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 30 */;
		echo '/form\'><i class="lab la-wpforms"></i><span>Form</span></a></li>

';
		if ($sessionkey == 'administrator') /* line 32 */ {
			echo '            <label>Seting</label>
            <li  class="sub ';
			if ($current == 'users' || $current == 'grup') /* line 34 */ {
				echo 'active';
			}
			echo '">
                <a href=\'javascript:void(0)\' class="ic">
                    <span><i class="las la-database"></i><span>Data</span></span>
                    <i class="las la-angle-right"></i>
                </a>
                <ul>
                    <li class="';
			if ($current == 'users') /* line 40 */ {
				echo 'active';
			}
			echo '"><a href=\'';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 40 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 40 */;
			echo '/users\'><i class="las la-minus"></i><span>Kelola User</span></a></li>
                    <li class="';
			if ($current == 'grup') /* line 41 */ {
				echo 'active';
			}
			echo '"><a href=\'';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 41 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 41 */;
			echo '/grup\'><i class="las la-minus"></i><span>Kelola Grup</span></a></li>
                </ul>
            </li>
';
		}
		echo '

        </ul>
        <div class="line"><hr class="no-margin"></div>
        <div class=\'bottom\'>
            <button class="seting" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 51 */;
		echo '/seting"><i class="las la-cog"></i></button>
            <div class="date">';
		echo LR\Filters::escapeHtmlText($hariini) /* line 52 */;
		echo '</div>
            <button class="logout" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 53 */;
		echo '/logout"><i class="las la-sign-out-alt"></i></button>
        </div>
    </div>
</div>
';
	}
}
