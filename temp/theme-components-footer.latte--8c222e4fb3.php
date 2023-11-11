<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\templates\theme\components\footer.latte */
final class Template8c222e4fb3 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\templates\\theme\\components\\footer.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="footer">
    &copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 2 */;
		echo ' | ';
		echo LR\Filters::escapeHtmlText($appname) /* line 2 */;
		echo '
</div>';
	}
}
