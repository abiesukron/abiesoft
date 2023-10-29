<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/berita/edit.latte */
final class Templatecef26b9643 extends Latte\Runtime\Template
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
		$this->renderBlock('js', get_defined_vars()) /* line 94 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['k' => '39'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '<div class=\'single-8\'>
    <div class=\'transparent\'>
        <div class=\'card\'>

            <!-- Card Header -->
            <div class=\'card-header\'>
                <button onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 11 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 11 */;
		echo '/berita"><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 12 */;
		echo '</div>
                <button class=\'card-option-btn hide\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
            <div class=\'card-body\'>
                
                <form method="post" id="formEdit" name="formEdit" onSubmit="return submitAdd()">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input class="form-control" id="judul" name="judul" placeholder="Judul berita" value="';
		echo LR\Filters::escapeHtmlAttr($judul) /* line 22 */;
		echo '">
                        <span id="err_judul"></span>
                    </div>
                    <div class="form-group">
                        <label for="potongan">Potongan berita</label>
                        <textarea class="form-control" id="potongan" name="potongan" data-type="editor"> ';
		echo LR\Filters::escapeHtmlText($potongan) /* line 27 */;
		echo '</textarea>
                        <span id="err_potongan"></span>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi berita</label>
                        <textarea class="form-control" id="isi" name="isi" data-type="editor">';
		echo LR\Filters::escapeHtmlText($isi) /* line 32 */;
		echo '</textarea>
                        <span id="err_isi"></span>
                    </div>
                    <div class="form-group">
                        <label for="kategoriid">Kategori</label>
                        <select class="form-control" id="kategoriid" name="kategoriid">
                            <option value="';
		echo LR\Filters::escapeHtmlAttr($kategoriid) /* line 38 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($kategorilabel) /* line 38 */;
		echo '</option>
';
		foreach ($kategori as $k) /* line 39 */ {
			echo '                                <option value="';
			echo LR\Filters::escapeHtmlAttr($k->id) /* line 40 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($k->nama) /* line 40 */;
			echo '</option>
';

		}

		echo '                        </select>
                        <span id="err_kategoriid"></span>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <div class="form-control tag">
                            <div id="items">
';
		for ($i = 0;
		$i < count(explode(',', $tag));
		$i++) /* line 49 */ {
			echo '                                    <div class="item"><label>';
			echo LR\Filters::escapeHtmlText(explode(',', $tag)[$i]) /* line 50 */;
			echo '</label><button type=\'button\' class=\'removetagbtn\'><i class=\'las la-times\'></i></buttton></div>
';

		}
		echo '                            </div>
                            <input id="taginput" placeholder="kategori" data-type="tag">
                            <div class="clear"></div>
                        </div>
                        <input type="hidden" id="tag" name="tag" value="';
		echo LR\Filters::escapeHtmlAttr($tag) /* line 56 */;
		echo '">
                        <span id="err_tag"></span>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload gambar</label>
                        <input type="file" id="gambar" name="gambar">
                        <i class="las la-paperclip form-right"></i>
                        <div class="form-control">Pilih file</div>
                        <span id="err_gambar"></span>
                    </div>
                    <div class="form-group">
                        <label for="publikasi">Publikasi</label>
                        <select class="form-control" id="publikasi" name="publikasi">
                            <option value="';
		echo LR\Filters::escapeHtmlAttr($publikasi) /* line 69 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($publikasi) /* line 69 */;
		echo '</option>
                            <option value="Terbit">Terbit</option>
                            <option value="Draft">Draft</option>
                            <option value="Jadwalkan">Jadwalkan</option>
                        </select>
                        <span id="err_publikasi"></span>
                    </div>
                    <hr>
                    <div class="form-button">
                        <input type="hidden" id="editing" name="editing" value="';
		echo LR\Filters::escapeHtmlAttr(date('Y-m-d')) /* line 78 */;
		echo '">
                        <input type="hidden" id="editorid" name="editorid" value="">
                        <input type="hidden" id="id" name="id" value="';
		echo LR\Filters::escapeHtmlAttr($id) /* line 80 */;
		echo '">
                        <input type="hidden" id="__method" name="__method" value="PATCH">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 82 */;
		echo '">
                        <input type="hidden" id="uid" name="uid" value="';
		echo LR\Filters::escapeHtmlAttr($uid) /* line 83 */;
		echo '">
                        <button class="btn btn-biru"><span id="btnsubmit">Simpan</span></button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</div>
';
	}


	/** {block js} on line 94 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
document.querySelector(\'iframe#editor0\').contentWindow.document.body.innerHTML = ';
		echo LR\Filters::escapeJs($potongan) /* line 96 */;
		echo ';
document.querySelector(\'iframe#editor1\').contentWindow.document.body.innerHTML = ';
		echo LR\Filters::escapeJs($isi) /* line 97 */;
		echo ';
</script>
<script src="/assets/jsa/berita/edit.js"></script>
';
	}
}
