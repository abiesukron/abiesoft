<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/users/edit.latte */
final class Template0c76049f31 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/users/edit.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 90 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['g' => '63'], $this->params) as $ʟ_v => $ʟ_l) {
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
                <button onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 12 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 12 */;
		echo '/users"><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 13 */;
		echo '</div>
                <button class=\'card-option-btn hide\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
            <div class=\'card-body\'>
                
                <form method="post" id="formEdit" name="formEdit" onSubmit="return submitEdit()">
                    <div class="form-img">
                        <div class=\'center\'>
                            <div class=\'cover\'>
                                <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($photo)) /* line 24 */;
		echo '\'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Ganti photo</label>
                        <input type="file" id="photo" name="photo">
                        <i class="las la-paperclip form-right"></i>
                        <div class="form-control">Pilih file</div>
                        <span id="err_photo"></span>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" placeholder="Nama" value=\'';
		echo LR\Filters::escapeHtmlAttr($nama) /* line 38 */;
		echo '\'>
                        <span id="err_nama"></span>
                    </div>

                    <div class=\'row\'>
                        <div class=\'col-7\'>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" placeholder="Email" value=\'';
		echo LR\Filters::escapeHtmlAttr($email) /* line 46 */;
		echo '\'>
                                <span id="err_email"></span>
                            </div>
                        </div>
                        <div class=\'col-5\'>
                            <div class="form-group">
                                <label for="nohp">Nomor HP</label>
                                <input class="form-control" id="nohp" name="nohp" placeholder="Nomor hp" value=\'';
		echo LR\Filters::escapeHtmlAttr($nohp) /* line 53 */;
		echo '\'>
                                <span id="err_nohp"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="grupid">Grup <button type=\'button\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 60 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 60 */;
		echo '/grup/add\'>Tambah</button></label>
                        <select class="form-control" id="grupid" name="grupid">
                            <option value="';
		echo LR\Filters::escapeHtmlAttr($grupvalue) /* line 62 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($gruplabel) /* line 62 */;
		echo '</option>
';
		foreach ($grup as $g) /* line 63 */ {
			echo '                                <option value="';
			echo LR\Filters::escapeHtmlAttr($g->id) /* line 64 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($g->nama) /* line 64 */;
			echo '</option>
';

		}

		echo '                        </select>
                        <span id="err_grupid"></span>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="psw">Password</label>
                        <input class="form-control" id="psw" name="psw" placeholder="Password">
                        <span id="err_psw"></span>
                    </div>
                    <hr>
                    <div class="form-button">
                        <input type="hidden" id="__method" name="__method" value="PATCH">
                        <input type="hidden" id="id" name="id" value="';
		echo LR\Filters::escapeHtmlAttr($id) /* line 78 */;
		echo '">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 79 */;
		echo '">
                        <button class="btn btn-abiesoft"><span id="btnsubmit">Simpan Perubahan</span></button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</div>
';
	}


	/** {block js} on line 90 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script src="/assets/jsa/users/edit.js"></script>
';
	}
}
