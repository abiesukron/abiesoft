<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/theme/auth/ingat.latte */
final class Template6e2d984f7d extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/theme/auth/ingat.latte';


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
                    <div class="card-body">
                        <div class=\'center pd-30\'><img src=\'/assets/img/logo_abiesoft.png\' style=\'width: 70px;\'></div>
                        <form id="formAuth" name="formAuth" method="post" onSubmit="return submitAuth()">
                            <div class="form-login">
                                <div class="photo">
                                    <div><div class="frame"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url . $photouser)) /* line 31 */;
		echo '"></div></div>
                                </div>
                                <h3>';
		echo LR\Filters::escapeHtmlText($namauser) /* line 33 */;
		echo '</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="psw">Password</label>
                                    <i class="las la-lock form-left"></i>
                                    <input type="password" class="form-control left" id="psw" name="psw" placeholder="Password">
                                    <span id="err_psw" class="err err_psw"><span>Password jangan dikosongkan <i class="las la-exclamation-circle"></i></span></span>
                                </div>
                                <div class="form-group">
                                    <div class="between">
                                        <div class="form-control">
                                            <div><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 44 */;
		echo '/reset">Ganti user</a></div>                                        
                                        </div>
                                        <div id=\'lupaarea\'></div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <input type="hidden" id="ingat" name="ingat" value="on">
                                    <input type="hidden" id="email" name="email" value="';
		echo LR\Filters::escapeHtmlAttr($emailuser) /* line 51 */;
		echo '">
                                    <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 52 */;
		echo '">
                                    <button class="btn btn-abiesoft full">
                                        <span id="btnlogin">Login</span>
                                    </button>
                                </div>
';
		if ($registrasi == 1) /* line 57 */ {
			echo '                                    <hr>
                                    <div class="form-btn">
                                        <button type="button" class="btn btn-clean full" onClick="window.location.href=this.dataset.url" data-url="';
			echo LR\Filters::escapeHtmlAttr($url) /* line 60 */;
			echo '/registrasi">
                                            <span>Registrasi</span>
                                        </button>
                                    </div>
';
		}
		echo '                            </div>
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
    <script src="/assets/jsa/auth/login.js"></script>
</body>

</html>';
	}
}
