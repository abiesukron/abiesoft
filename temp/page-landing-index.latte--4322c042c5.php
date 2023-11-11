<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/landing/index.latte */
final class Template4322c042c5 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/landing/index.latte';

	public const Blocks = [
		['css' => 'blockCss', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!DOCTYPE html>
<html>

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
    <link href="/assets/css/shimmer.css" rel="stylesheet" type="text/css">
    <link href="/assets/lib/icon8/css/line-awesome.css" rel="stylesheet" type="text/css">
';
		$this->renderBlock('css', get_defined_vars()) /* line 16 */;
		echo '
</head>

<body>
    <div class=\'art\'><div class=\'gradient\'></div></div>
    <div class="center-full">
        <div class="single-4">
            <div class=\'brand\'>
                <div class=\'logo\'><img src=\'/assets/img/logo_with_label.png\'></div>
                <div class=\'label\'>Selamat Datang di <strong>';
		echo LR\Filters::escapeHtmlText($appname) /* line 26 */;
		echo '</strong></div>
                <div class=\'grup-button\'>
';
		if ($isLogin) /* line 28 */ {
			echo '                        <button class=\'btn\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($dashboard) /* line 29 */;
			echo '\'>Selamat datang, <strong>';
			echo LR\Filters::escapeHtmlText($nama) /* line 29 */;
			echo '</strong></button>
                        <button class=\'btn\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 30 */;
			echo '/logout\'>Logout</button>
';
		} else /* line 31 */ {
			echo '                        <button class=\'btn\' onClick=\'window.location.href=this.dataset.url\' data-url=\'';
			echo LR\Filters::escapeHtmlAttr($url) /* line 32 */;
			echo '/login\'>Login</button>
';
		}
		echo '                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery-3.7.0.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 39 */;
		echo '</body>

</html>';
	}


	/** {block css} on line 16 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block js} on line 39 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
