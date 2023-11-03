<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/theme/auth/registrasi.latte */
final class Templatef47aa18cab extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/theme/auth/registrasi.latte';


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
                                    <label for="nama">Nama</label>
                                    <i class="las la-font form-left"></i>
                                    <input class="form-control left" id="nama" name="nama" placeholder="Nama">
                                    <span id="err_nama" class="err err_nama"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <i class="las la-at form-left"></i>
                                    <input class="form-control left" id="email" name="email" placeholder="Email">
                                    <span id="err_email" class="err err_email"></span>
                                </div>
                                <div class="form-group">
                                    <label for="psw">Password</label>
                                    <i class="las la-lock form-left"></i>
                                    <input type="password" class="form-control left" id="psw" name="psw" placeholder="Password">
                                    <span id="err_psw" class="err err_psw"></span>
                                </div>
                                <div class="form-btn">
                                    <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 53 */;
		echo '">
                                    <button class="btn btn-abiesoft full">
                                        <span id="btnregistrasi">Registrasi</span>
                                    </button>
';
		if ($google == 1) /* line 57 */ {
			echo '                                    <button type="button" class="btn btn-google-merah full" onClick="window.location.href=this.dataset.url" data-url="';
			echo LR\Filters::escapeHtmlAttr($google_url_login) /* line 58 */;
			echo '">
                                        <i class="lab la-google"></i>
                                        <span>Registrasi dengan google</span>
                                    </button>
';
		}
		echo '                                </div>
                                <hr>
                                <div class="form-btn">
                                    <button type="button" class="btn btn-clean full" onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 66 */;
		echo '/login">
                                        <span>Kembali ke login</span>
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
    <script src="/assets/jsa/auth/registrasi.js"></script>
</body>

</html>';
	}
}
