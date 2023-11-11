<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/theme/auth/seting.latte */
final class Templateb36d0aad7e extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/theme/auth/seting.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 183 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['s' => '27'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '<div class="center">
    <div class="single-6">
        <div class=\'transparent\'>
            <div class="card">
                <div class="card-header">
                    <button id="back"><i class="las la-angle-left"></i></button>
                    <div class="label">';
		echo LR\Filters::escapeHtmlText($title) /* line 11 */;
		echo '</div>
                    <button class="hide"><i class="las la-ellipsis-v"></i></button>
                </div>
                <div class="card-body-list">

';
		if ($grupid == 'dpYCGB9FFeht') /* line 16 */ {
			echo '
                        <div class="list-button" id="tabButton">
                            <button data-tab="umum" class="active">Umum</button>
                            <button data-tab="file">File</button>
                            <button data-tab="email">Email</button>
                        </div>

                        <div class="grup-seting" id="setingumum">
                            <div class="label">Setingan Umum</div>
                            <ul>
';
			foreach ($seting as $s) /* line 27 */ {
				echo '                                <li>
                                    <div>
                                        <i class="';
				echo LR\Filters::escapeHtmlAttr($s->icon) /* line 30 */;
				echo '"></i>
                                        <div>
                                            <div>';
				echo LR\Filters::escapeHtmlText($s->nama) /* line 32 */;
				echo '</div>
                                            <small>';
				echo LR\Filters::escapeHtmlText($s->keterangan) /* line 33 */;
				echo '</small>
                                        </div>
                                    </div>
                                    <button class="switch" onClick="setSeting([this.id,this.dataset.status,this.dataset.url,this.dataset.apikey,this.dataset.nama])" data-status="';
				echo LR\Filters::escapeHtmlAttr($s->tampilkan) /* line 36 */;
				echo '" data-url="';
				echo LR\Filters::escapeHtmlAttr($url) /* line 36 */;
				echo '" data-apikey="';
				echo LR\Filters::escapeHtmlAttr($apikey) /* line 36 */;
				echo '" id="';
				echo LR\Filters::escapeHtmlAttr($s->id) /* line 36 */;
				echo '" data-nama="';
				echo LR\Filters::escapeHtmlAttr($s->nama) /* line 36 */;
				echo '">
                                        <span class="seting-opsi ';
				if ($s->tampilkan == 1) /* line 37 */ {
					echo 'active';
				}
				echo '" id="___';
				echo LR\Filters::escapeHtmlAttr($s->id) /* line 37 */;
				echo '">Ya</span>
                                        <span class="seting-opsi ';
				if ($s->tampilkan == 0) /* line 38 */ {
					echo 'active';
				}
				echo '" id="__';
				echo LR\Filters::escapeHtmlAttr($s->id) /* line 38 */;
				echo '">Tidak</span>
                                    </button>
                                </li>
';

			}

			echo '                            </ul>
                        </div>



                        <div class="grup-seting hide" id="setingfile">
                            <div class="label">Setingan File</div>
                            <form method="post" id="formFileSeting" name="formFileSeting" onSubmit="return setingFileApp()">
                                <div class="form-group">
                                    <label for="tipeimage">Tipe Image</label>
                                    <div class="form-control tag">
                                        <div id="items">
';
			for ($i = 0;
			$i < count(explode(',', $tipeimage));
			$i++) /* line 54 */ {
				echo '                                                <div class="item"><label>';
				echo LR\Filters::escapeHtmlText(explode(',', $tipeimage)[$i]) /* line 55 */;
				echo '</label><button type=\'button\' class=\'removetagbtn\'><i class=\'las la-times\'></i></buttton></div>
';

			}
			echo '                                        </div>
                                        <input id="taginput" placeholder="Image"  data-type="tag">
                                        <div class="clear"></div>
                                    </div>
                                    <input type="hidden" id="tipeimage" name="tipeimage" value="';
			echo LR\Filters::escapeHtmlAttr($tipeimage) /* line 61 */;
			echo '">
                                    <span id="err_tipeimage"></span>
                                </div>
                                <div class="form-group">
                                    <label for="tipemedia">Tipe Media</label>
                                    <div class="form-control tag">
                                        <div id="items">
';
			for ($i = 0;
			$i < count(explode(',', $tipemedia));
			$i++) /* line 68 */ {
				echo '                                                <div class="item"><label>';
				echo LR\Filters::escapeHtmlText(explode(',', $tipemedia)[$i]) /* line 69 */;
				echo '</label><button type=\'button\' class=\'removetagbtn\'><i class=\'las la-times\'></i></buttton></div>
';

			}
			echo '                                        </div>
                                        <input id="taginput" placeholder="Media" data-type="tag">
                                        <div class="clear"></div>
                                    </div>
                                    <input type="hidden" id="tipemedia" name="tipemedia" value="';
			echo LR\Filters::escapeHtmlAttr($tipemedia) /* line 75 */;
			echo '">
                                    <span id="err_tipemedia"></span>
                                </div>
                                <div class="form-group">
                                    <label for="tipedokumen">Tipe Dokumen</label>
                                    <div class="form-control tag">
                                        <div id="items">
';
			for ($i = 0;
			$i < count(explode(',', $tipedokumen));
			$i++) /* line 82 */ {
				echo '                                                <div class="item"><label>';
				echo LR\Filters::escapeHtmlText(explode(',', $tipedokumen)[$i]) /* line 83 */;
				echo '</label><button type=\'button\' class=\'removetagbtn\'><i class=\'las la-times\'></i></buttton></div>
';

			}
			echo '                                        </div>
                                        <input id="taginput" placeholder="Dokumen" data-type="tag">
                                        <div class="clear"></div>
                                    </div>
                                    <input type="hidden" id="tipedokumen" name="tipedokumen" value="';
			echo LR\Filters::escapeHtmlAttr($tipedokumen) /* line 89 */;
			echo '">
                                    <span id="err_tipedokumen"></span>
                                </div>
                                <div class="form-group">
                                    <label for="ukuranimage">Ukuran Image</label>
                                    <input class="form-control" id="ukuranimage" name="ukuranimage" placeholder="Dalam kilo byte" value="';
			echo LR\Filters::escapeHtmlAttr($ukuranimage) /* line 94 */;
			echo '">
                                    <span id="err_ukuranimage"></span>
                                </div>
                                <div class="form-group">
                                    <label for="ukuranmedia">Ukuran Media</label>
                                    <input class="form-control" id="ukuranmedia" name="ukuranmedia" placeholder="Dalam kilo byte" value="';
			echo LR\Filters::escapeHtmlAttr($ukuranmedia) /* line 99 */;
			echo '">
                                    <span id="err_ukuranmedia"></span>
                                </div>
                                <div class="form-group">
                                    <label for="ukurandokumen">Ukuran Dokumen</label>
                                    <input class="form-control" id="ukurandokumen" name="ukurandokumen" placeholder="Dalam kilo byte" value="';
			echo LR\Filters::escapeHtmlAttr($ukurandokumen) /* line 104 */;
			echo '">
                                    <span id="err_ukurandokumen"></span>
                                </div>
                                <div class="form-btn-center">
                                    <input type="hidden" id="__model" name="__model" value="file">
                                    <input type="hidden" id="__token" name="__token" value="';
			echo LR\Filters::escapeHtmlAttr($csrf) /* line 109 */;
			echo '">
                                    <button class="btn btn-abiesoft">
                                        <span id="btnFileSeting">Simpan perubahan</span>
                                    </button>
                                </div>
                            </form>
                        </div>



                        <div class="grup-seting hide" id="setingemail">
                            <div class="label">Setingan Email</div>
                            <form method="post" id="formEmailSeting" name="formEmailSeting" onSubmit="return setingEmailApp()">
                                <div class="form-group">
                                    <label for="smtp">SMTP</label>
                                    <input class="form-control" id="smtp" name="smtp" placeholder="SMTP" value="';
			echo LR\Filters::escapeHtmlAttr($smtp) /* line 124 */;
			echo '">
                                    <span id="err_smtp"></span>
                                </div>
                                <div class="form-group">
                                    <label for="akun">Akun email</label>
                                    <input class="form-control" id="akun" name="akun" placeholder="Akun email" value="';
			echo LR\Filters::escapeHtmlAttr($akun) /* line 129 */;
			echo '">
                                    <span id="err_akun"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <i class="las la-eye form-right"></i>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="****" value="';
			echo LR\Filters::escapeHtmlAttr($password) /* line 135 */;
			echo '">
                                    <span id="err_password"></span>
                                </div>
                                <div class="form-group">
                                    <label for="port">Port</label>
                                    <input class="form-control" id="port" name="port" placeholder="465" value="';
			echo LR\Filters::escapeHtmlAttr($port) /* line 140 */;
			echo '">
                                    <span id="err_port"></span>
                                </div>
                                <div class="form-group">
                                    <label for="tampilanemail">Email pengirim</label>
                                    <input class="form-control" id="tampilanemail" name="tampilanemail" placeholder="Alamat email yang tampil di client" value="';
			echo LR\Filters::escapeHtmlAttr($tampilanemail) /* line 145 */;
			echo '">
                                    <span id="err_tampilanemail"></span>
                                </div>
                                <div class="form-group">
                                    <label for="pengirim">Nama pengirim</label>
                                    <input class="form-control" id="pengirim" name="pengirim" placeholder="Nama pengirim" value="';
			echo LR\Filters::escapeHtmlAttr($pengirim) /* line 150 */;
			echo '">
                                    <span id="err_pengirim"></span>
                                </div>
                                <div class="form-btn-center">
                                    <input type="hidden" id="__model" name="__model" value="email">
                                    <input type="hidden" id="__token" name="__token" value="';
			echo LR\Filters::escapeHtmlAttr($csrf) /* line 155 */;
			echo '">
                                    <button class="btn btn-abiesoft">
                                        <span id="btnEmailSeting">Simpan perubahan</span>
                                    </button>
                                </div>
                            </form>
                        </div>

';
		} else /* line 163 */ {
			echo '

                        <div class="empty">
                            <div>
                                <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 168 */;
			echo '/assets/img/empty_setting.png">
                                <label>Tidak Ada Setingan</label>
                                <div><small>Tidak ada setingan yang tersedia untuk akun anda</small></div>
                            </div>
                        </div>


';
		}
		echo '
                </div>
            </div>
        </div>
    </div>
</div>
';
	}


	/** {block js} on line 183 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script src="/assets/jsa/seting/index.js"></script>
';
	}
}
