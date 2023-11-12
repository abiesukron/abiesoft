<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/grup/add.latte */
final class Templatee3308b3f1c extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/grup/add.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 49 */;
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

		echo '<div class=\'single-5\'>

    <div class=\'transparent\'>
        <div class=\'card\'>

            <!-- Card Header -->
            <div class=\'card-header\'>
                <button onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 12 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 12 */;
		echo '/grup"><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 13 */;
		echo '</div>
                <button class=\'card-option-btn hide\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
            <div class=\'card-body\'>
                
                <form method="post" id="formAdd" name="formAdd" onSubmit="return submitAdd()">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" placeholder="Nama grup">
                        <span id="err_nama"></span>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan grup"></textarea>
                        <span id="err_keterangan"></span>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input class="form-control" id="role" name="role" placeholder="Role grup">
                        <span id="err_role"></span>
                    </div>
                    <hr>
                    <div class="form-button">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 38 */;
		echo '">
                        <button class="btn btn-abiesoft"><span id="btnsubmit">Simpan</span></button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</div>
';
	}


	/** {block js} on line 49 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script src="/assets/jsa/grup/add.js"></script>
';
	}
}
