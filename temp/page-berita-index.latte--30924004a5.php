<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/berita/index.latte */
final class Template30924004a5 extends Latte\Runtime\Template
{
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
		$this->renderBlock('js', get_defined_vars()) /* line 100 */;
		echo "\n";
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
		echo LR\Filters::escapeHtmlText($title) /* line 14 */;
		echo '</div>
                <button class=\'card-option-btn hide\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
';
		if ($totalberita > 0) /* line 19 */ {
			echo '
                <div class="card-tabel">
                    <div class=\'header\'>
                        <div>
                            <h2>Semua Berita</h2>
                            <small><span id=\'jumlahdataview\'>0</span> berita</small>
                        </div>
                        <div>
                            <button class="btn btn-biru" onClick="window.location.href=this.dataset.url" data-url="';
			echo LR\Filters::escapeHtmlAttr($url) /* line 28 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 28 */;
			echo '/berita/add"><i class="las la-plus"></i><span>Buat Berita</span></button>
                        </div>
                    </div>
                    <div class="tabel">
                        <div class=\'search\'><i class="las la-search"></i><input placeholder=\'Ketikan sesuatu untuk mencari data ..\' id=\'search\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 32 */;
			echo '\' data-apikey=\'';
			echo LR\Filters::escapeHtmlAttr($apikey) /* line 32 */;
			echo '\' data-tb=\'berita\'></div>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="mobile-hide">Gambar</th>
                                    <th>Detail Info</th>
                                    <th class="mobile-hide">Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                    <td class="mobile-hide"><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                    <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                    <td class="mobile-hide"><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                    <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class=\'table-load-more\'><button class=\'btn btn-biru\' id=\'loadmore\' disabled>Mengambil data ..</button></div>
                    </div>
                </div>

';
		} else /* line 79 */ {
			echo '
                <div class=\'card-body\'>
                    <div class=\'empty\'>
                        <div>
                            <img src=\'';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 84 */;
			echo '/assets/img/banner.png\'>
                            <label>Belum ada berita</label>
                            <div><small>Untuk sementara belum ada berita yang bisa ditampilkan di halaman ini, untuk memulainya silahkan buat berita pertama anda</small></div>
                            <div class=\'center my-40\'><button class=\'btn btn-biru\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 87 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 87 */;
			echo '/berita/add\'>Buat Berita</button></div>
                        </div>
                    </div>
                </div>
                
';
		}
		echo '
        </div>
    </div>


</div>
';
	}


	/** {block js} on line 100 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script src="/assets/jsa/berita/index.js"></script>
';
		if ($totalberita > 0) /* line 102 */ {
			echo '    <script>
    loadTabel([';
			echo LR\Filters::escapeJs($url) /* line 104 */;
			echo ',';
			echo LR\Filters::escapeJs($apikey) /* line 104 */;
			echo ',\'berita\',';
			echo LR\Filters::escapeJs($csrf) /* line 104 */;
			echo ']);
    </script>
';
		}
	}
}
