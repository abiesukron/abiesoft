<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/grup/index.latte */
final class Templatec9411c52be extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/grup/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 80 */;
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
                <button id=\'back\' class=\'left hide\'><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 14 */;
		echo '</div>
                <button class=\'card-option-btn hide right\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
';
		if ($totalgrup > 0) /* line 19 */ {
			echo '
                <div class="card-tabel">
                    <div class=\'header\'>
                        <div>
                            <h3>Semua Grup</h3>
                            <small><span id=\'jumlahdataview\'>0</span> grup</small>
                        </div>
                        <div>
                            <button class="btn btn-biru" onClick="window.location.href=this.dataset.url" data-url="';
			echo LR\Filters::escapeHtmlAttr($url) /* line 28 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 28 */;
			echo '/grup/add"><i class="las la-plus"></i><span>Buat Grup</span></button>
                        </div>
                    </div>
                    <div class="tabel">
                        <div class=\'search\'><i class="las la-search"></i><input placeholder=\'Cari grup ..\' id=\'search\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 32 */;
			echo '\' data-apikey=\'';
			echo LR\Filters::escapeHtmlAttr($apikey) /* line 32 */;
			echo '\' data-tb=\'grup\'></div>
                        <div class=\'tabel-overflow\'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th class=\'mobile-hide\'>Keterangan</th>
                                        <th>Role</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                        <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                        <td class=\'mobile-hide\'><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                        <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                        <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class=\'table-load-more\'><button class=\'btn btn-biru\' id=\'loadmore\' disabled>Mengambil data ..</button></div>
                    </div>
                </div>

';
		} else /* line 59 */ {
			echo '
                <div class=\'card-body\'>
                    <div class=\'empty\'>
                        <div>
                            <img src=\'';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 64 */;
			echo '/assets/img/banner.png\'>
                            <label>Belum ada grup</label>
                            <div><small>Untuk sementara belum ada grup yang bisa ditampilkan di halaman ini, untuk memulainya silahkan buat grup pertama anda</small></div>
                            <div class=\'center my-40\'><button class=\'btn btn-biru\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 67 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 67 */;
			echo '/grup/add\'>Buat Grup</button></div>
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


	/** {block js} on line 80 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script src="/assets/jsa/grup/index.js"></script>
';
		if ($totalgrup > 0) /* line 82 */ {
			echo '    <script>
    loadTabel([';
			echo LR\Filters::escapeJs($url) /* line 84 */;
			echo ',';
			echo LR\Filters::escapeJs($apikey) /* line 84 */;
			echo ',\'grup\',';
			echo LR\Filters::escapeJs($csrf) /* line 84 */;
			echo ']);
    </script>
';
		}
	}
}
