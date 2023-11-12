<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/users/index.latte */
final class Template6018073f47 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/users/index.latte';

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
                <div class=\'right flex-between\'>
                    <button class=\'card-option-btn mr-5\' onClick=\'loadTabel([this.dataset.url,this.dataset.apikey,this.dataset.tb, this.dataset.csrf])\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 16 */;
		echo '\' data-apikey=\'';
		echo LR\Filters::escapeHtmlAttr($apikey) /* line 16 */;
		echo '\' data-tb=\'users\' data-csrf=\'';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 16 */;
		echo '\'><i class="las la-redo-alt"></i></button>
                </div>
            </div>

            <!-- Card Body -->
';
		if ($totalusers > 0) /* line 21 */ {
			echo '
                <div class="card-tabel">
                    <div class=\'header\'>
                        <div>
                            <h3>Semua Users</h3>
                            <small><span id=\'jumlahdataview\'>0</span> user</small>
                        </div>
                        <div>
                            <button class="btn btn-biru" onClick="window.location.href=this.dataset.url" data-url="';
			echo LR\Filters::escapeHtmlAttr($url) /* line 30 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 30 */;
			echo '/users/add"><i class="las la-plus"></i><span>Buat Users</span></button>
                        </div>
                    </div>
                    <div class="tabel">
                        <div class=\'search\'><i class="las la-search"></i><input placeholder=\'Cari user ..\' id=\'search\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 34 */;
			echo '\' data-apikey=\'';
			echo LR\Filters::escapeHtmlAttr($apikey) /* line 34 */;
			echo '\' data-tb=\'users\'></div>
                        <div class=\'tabel-overflow\'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Detail Users</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
                                        <td><div class="shimmer" style="width: 100%; height: 50px; background: #e9eef6;"></div></td>
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
                            <label>Belum ada users</label>
                            <div><small>Untuk sementara belum ada users yang bisa ditampilkan di halaman ini, untuk memulainya silahkan buat users pertama anda</small></div>
                            <div class=\'center my-40\'><button class=\'btn btn-biru\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 67 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 67 */;
			echo '/users/add\'>Buat Users</button></div>
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

		echo '<script src="/assets/jsa/users/index.js"></script>
';
		if ($totalusers > 0) /* line 82 */ {
			echo '    <script>
    loadTabel([';
			echo LR\Filters::escapeJs($url) /* line 84 */;
			echo ',';
			echo LR\Filters::escapeJs($apikey) /* line 84 */;
			echo ',\'users\',';
			echo LR\Filters::escapeJs($csrf) /* line 84 */;
			echo ']);
    </script>
';
		}
	}
}
