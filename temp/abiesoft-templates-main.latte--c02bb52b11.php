<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\templates\main.latte */
final class Templatec02bb52b11 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\templates\\main.latte';

	public const Blocks = [
		['css' => 'blockCss', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


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
    <meta name="sessionkey" content="';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 12 */;
		echo '">
    <title>';
		echo LR\Filters::escapeHtmlText($title) /* line 13 */;
		echo '</title>
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/card.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/form.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/colom.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/media.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/shimmer.css" rel="stylesheet" type="text/css">
    <link href="/assets/lib/icon8/css/line-awesome.css" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/site.webmanifest">
';
		$this->renderBlock('css', get_defined_vars()) /* line 25 */;
		echo '
</head>

<body>
    <div class=\'art\'><div class=\'gradient\'></div></div>
';
		$this->createTemplate('./theme/components/sidebar.latte', $this->params, 'include')->renderToContentType('html') /* line 31 */;
		$this->createTemplate('./theme/components/navbar.latte', $this->params, 'include')->renderToContentType('html') /* line 32 */;
		echo '
    <div class="page">
';
		$this->renderBlock('content', get_defined_vars()) /* line 35 */;
		echo '    </div>
';
		$this->createTemplate('./theme/components/footer.latte', $this->params, 'include')->renderToContentType('html') /* line 37 */;
		echo '

    <div id=\'toasthere\'></div>

';
		$this->createTemplate('./theme/components/modal.latte', $this->params, 'include')->renderToContentType('html') /* line 42 */;
		echo '    <script src="/assets/js/jquery-3.7.0.js"></script>
    <script src="/assets/js/style.js"></script>
    <script src="/assets/js/alert.js"></script>
    <script src="/assets/js/validasi.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 47 */;
		echo '</body>

</html>';
	}


	/** {block css} on line 25 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block content} on line 35 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block js} on line 47 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
