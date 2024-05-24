<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/berita/detail.latte */
final class Template3eeced57b2 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/berita/detail.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 69 */;
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

		echo '<div class=\'single-7\'>
    <div class=\'transparent\'>
        <div class=\'card\'>

            <!-- Card Header -->
            <div class=\'card-header\'>
                <button class=\'left\' onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 11 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 11 */;
		echo '/berita"><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 12 */;
		echo '</div>
                <button class=\'card-option-btn right\' data-model=\'buttonopsi\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>
            <div class=\'card-opsi\'>
                <button onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 16 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 16 */;
		echo '/berita/';
		echo LR\Filters::escapeHtmlAttr($id) /* line 16 */;
		echo '/edit\'><i class=\'las la-pen\'></i> <span>Edit</span></button>
                <form method=\'post\' id=\'formHapus-';
		echo LR\Filters::escapeHtmlAttr($id) /* line 17 */;
		echo '\' name=\'formHapus-';
		echo LR\Filters::escapeHtmlAttr($id) /* line 17 */;
		echo '\' onSubmit=\'return hapus(';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($id)) /* line 17 */;
		echo ')\'>
                    <input type=\'hidden\' id=\'__info\' name=\'__info\' value=\'';
		echo LR\Filters::escapeHtmlAttr($judul) /* line 18 */;
		echo '\'>
                    <input type=\'hidden\' id=\'__token\' name=\'__token\' value=\'';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 19 */;
		echo '\'>
                    <input type=\'hidden\' id=\'__url\' name=\'__url\' value=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 20 */;
		echo '\'>
                    <input type=\'hidden\' id=\'id\' name=\'id\' value=\'';
		echo LR\Filters::escapeHtmlAttr($id) /* line 21 */;
		echo '\'>
                    <input type=\'hidden\' id=\'__tb\' name=\'__tb\' value=\'berita\'>
                    <input type=\'hidden\' id=\'__method\' name=\'__method\' value=\'DELETE\'>
                    <button><i class=\'las la-trash\'></i> <span>Hapus</span></button>
                </form>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class=\'label\'>
                    <h3>Info Berita</h3>
                    <hr>
                </div>
                <div class=\'cover\'><img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($gambar)) /* line 34 */;
		echo '\'></div>
                <div class=\'list\'>
                    <table class=\'tb-list\'>
                        <tr>
                            <td>Judul</td>
                            <td><span>';
		echo LR\Filters::escapeHtmlText($judul) /* line 39 */;
		echo '</span></td>
                        </tr>
                        <tr>
                            <td>Dilihat</td>
                            <td><span>0</span> <span>kali</span></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><span>';
		echo LR\Filters::escapeHtmlText($kategorilabel) /* line 47 */;
		echo '</span></td>
                        </tr>
                        <tr>
                            <td>Potongan</td>
                            <td><span>';
		echo LR\Filters::escapeHtmlText($potongan) /* line 51 */;
		echo '</span></td>
                        </tr>
                    </table>
                </div>

                <div class=\'label\'>
                    <h3>Komentar (0)</h3>
                    <hr>
                </div>
                <div id=\'komentarview\'>
                    <div class=\'text-center gray\'>Belum ada komentar</div>
                </div>
            </div>

        </div>
    </div>
</div>
';
	}


	/** {block js} on line 69 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
