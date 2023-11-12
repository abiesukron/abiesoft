<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/users/add.latte */
final class Templateab7f9db8b9 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/users/add.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 67 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['g' => '40'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
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

		echo '<div class=\'single-6\'>

    <div class=\'transparent\'>
        <div class=\'card\'>

            <!-- Card Header -->
            <div class=\'card-header\'>
                <button class=\'left\' onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 12 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 12 */;
		echo '/users"><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 13 */;
		echo '</div>
                <button class=\'card-option-btn hide right\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
            <div class=\'card-body\'>
                
                <form method="post" id="formAdd" name="formAdd" onSubmit="return submitAdd()">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" placeholder="Nama users">
                        <span id="err_nama"></span>
                    </div>

                    <div class=\'row\'>
                        <div class=\'col-7\'>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" placeholder="Email users">
                                <span id="err_email"></span>
                            </div>
                        </div>
                        <div class=\'col-5\'>
                            <div class="form-group">
                                <label for="grupid">Grup <button type=\'button\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 37 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 37 */;
		echo '/grup/add\'>Tambah</button></label>
                                <select class="form-control" id="grupid" name="grupid">
                                    <option value="">Pilih grup</option>
';
		foreach ($grup as $g) /* line 40 */ {
			echo '                                        <option value="';
			echo LR\Filters::escapeHtmlAttr($g->id) /* line 41 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($g->nama) /* line 41 */;
			echo '</option>
';

		}

		echo '                                </select>
                                <span id="err_grupid"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="password">Password Default</label>
                        <input class="form-control" id="password" name="password" value=\'';
		echo LR\Filters::escapeHtmlAttr($udf) /* line 51 */;
		echo '\' disabled>
                        <span id="err_password"></span>
                    </div>
                    <hr>
                    <div class="form-button">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 56 */;
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


	/** {block js} on line 67 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script src="/assets/jsa/users/add.js"></script>
';
	}
}
