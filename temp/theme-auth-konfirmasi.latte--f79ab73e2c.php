<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/theme/auth/konfirmasi.latte */
final class Templatef79ab73e2c extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="';
		echo LR\Filters::escapeHtmlAttr($appdes) /* line 10 */;
		echo '">
    <meta name="author" content="">
    <title>';
		echo LR\Filters::escapeHtmlText($title) /* line 12 */;
		echo '</title>
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/card.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/form.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/media.css" rel="stylesheet" type="text/css">
    <link href="/assets/lib/icon8/css/line-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class=\'art\'><div class=\'gradient\'></div></div>
    <div class="center-full">
        <div class="single-4">
            <div class=\'transparent\'>
                <div class="card">
                    <div class="card-header">
                        <button id="back" class="hide"><i class="las la-angle-left"></i></button>
                        <div class="label">';
		echo LR\Filters::escapeHtmlText($title) /* line 28 */;
		echo '</div>
                        <button class="card-option-btn hide"><i class="las la-ellipsis-v"></i></button>
                    </div>
                    <div class="card-body">
                        <form id="formAuth" name="formAuth" method="post" onSubmit="return submitAuth()">
                            <div class="form-login">
                                <div class="form-group">
                                    <label for="psw">Password Baru</label>
                                    <i class="las la-lock form-left"></i>
                                    <input class="form-control left" id="psw" name="psw" placeholder="Password baru">
                                    <span id="err_psw" class="err err_psw"></span>
                                </div>
                                <div class="form-group">
                                    <label for="kpsw">Konfirmasi Password</label>
                                    <i class="las la-lock form-left"></i>
                                    <input class="form-control left" id="kpsw" name="kpsw" placeholder="Konfirmasi password">
                                    <span id="err_kpsw" class="err err_kpsw"></span>
                                </div>
                                <div class="form-group">
                                <hr>
                                </div>
                                <div class="form-group">
                                    <div class=\'text-center\' style=\'margin-bottom: 20px;\'>Masukan kode reset yang dikirim ke email <strong class="text-primary">';
		echo LR\Filters::escapeHtmlText($emailuser) /* line 50 */;
		echo '</strong></div>
                                    <label for="psw">Kode Reset</label>
                                    <i class="las la-key form-left"></i>
                                    <input maxlength="6" class="form-control left" id="kodereset" name="kodereset" placeholder="Masukan kode reset">
                                    <span id="err_kodereset" class="err err_kodereset"></span>
                                </div>
                                <div class="form-btn">
                                    <input type="hidden" id="email" name="email" value="';
		echo LR\Filters::escapeHtmlAttr($emailuser) /* line 57 */;
		echo '">
                                    <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 58 */;
		echo '">
                                    <button class="btn btn-abiesoft full">
                                        <span id="btnlogin">Simpan perubahan</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id=\'toasthere\'></div>

    <script src="/assets/js/jquery-3.7.0.js"></script>
    <script src="/assets/js/style.js"></script>
    <script src="/assets/js/alert.js"></script>
    <script src="/assets/js/validasi.js"></script>
    <script src="/assets/jsa/auth/konfirmasi.js"></script>
</body>

</html>';
	}
}
