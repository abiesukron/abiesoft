<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/theme/auth/profile.latte */
final class Template8f43f33362 extends Latte\Runtime\Template
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
		$this->renderBlock('js', get_defined_vars()) /* line 71 */;
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

		echo '<div class="center">
    <div class="single-45">
        <div class=\'transparent\'>
            <div class="card">
                <div class="card-header">
                    <button id="back"><i class="las la-angle-left"></i></button>
                    <div class="label">';
		echo LR\Filters::escapeHtmlText($title) /* line 11 */;
		echo '</div>
                    <button class="card-option-btn" data-model="buttonopsi"><i class="las la-ellipsis-v" data-model="buttonopsi"></i></button>
                </div>
                <div class="card-opsi">
                    <button onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 15 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 15 */;
		echo '/seting"><i class="las la-cog"></i> <span>Seting</span></button>
                    <form method="post" id="formHapus" name="formHapus" onSubmit="return hapus()">
                        <input type="hidden" id="__info" name="__info" value="';
		echo LR\Filters::escapeHtmlAttr($nama) /* line 17 */;
		echo '">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 18 */;
		echo '">
                        <input type="hidden" id="__url" name="__url" value="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 19 */;
		echo '">
                        <input type="hidden" id="id" name="id" value="';
		echo LR\Filters::escapeHtmlAttr($id) /* line 20 */;
		echo '">
                        <input type="hidden" id="__tb" name="__tb" value="profile">
                        <input type="hidden" id="__method" name="__method" value="DELETE">
                        <button><i class="las la-trash"></i> <span>Hapus</span></button>
                    </form>
                </div>
                <div class="card-body">
                    <div class=\'photo-profile\'>
                        <div class="frame">
                            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url . $photo)) /* line 29 */;
		echo '" id="pp4">
                        </div>
                        <button class="edit" id="editphoto2"><i class="las la-pen"></i></button>
                    </div>
                    <div class="info-profile">
                        <h2 id="namaArea2">';
		echo LR\Filters::escapeHtmlText($nama) /* line 34 */;
		echo '</h2>
                        <small id="emailArea2">';
		echo LR\Filters::escapeHtmlText($email) /* line 35 */;
		echo '</small>
                    </div>
                    <hr>
                    <form method="post" id="formProfile" name="formProfile" enctype="multipart/form-data" onSubmit="return submitUpdateProfile()">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" name="nama" placeholder="Nama" value="';
		echo LR\Filters::escapeHtmlAttr($nama) /* line 41 */;
		echo '">
                            <span id="err_nama"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" placeholder="Email" value="';
		echo LR\Filters::escapeHtmlAttr($email) /* line 46 */;
		echo '">
                            <span id="err_email"></span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="psw">Password Baru</label>
                            <i class="las la-eye form-right"></i>
                            <input type="password" class="form-control" id="psw" name="psw" placeholder="******">
                            <span id="err_psw"></span>
                        </div>
                        <hr>
                        <div class="form-btn-center">
                            <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 58 */;
		echo '">
                            <input type="hidden" id="__url" name="__url" value="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 59 */;
		echo '">
                            <input type="hidden" id="__method" name="__method" value="PATCH">
                            <button class="btn btn-abiesoft" id="btnUpdateProfile">
                                <span>Perbarui</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
';
	}


	/** {block js} on line 71 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script src="/assets/jsa/auth/profile.js"></script>
';
	}
}
