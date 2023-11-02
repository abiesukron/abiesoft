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
		$this->renderBlock('js', get_defined_vars()) /* line 104 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['k' => '44'], $this->params) as $ʟ_v => $ʟ_l) {
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
                        <label for="slug">Slug</label>
                        <input class="form-control" id="prevslug" name="prevslug" placeholder="Slug berita" value=\'';
		echo LR\Filters::escapeHtmlAttr($slug) /* line 27 */;
		echo '\' disabled>
                        <input type=\'hidden\' class="form-control" id="slug" name="slug" value=\'';
		echo LR\Filters::escapeHtmlAttr($slug) /* line 28 */;
		echo '\'>
                    </div>
                    <div class="form-group">
                        <label for="potongan">Potongan berita</label>
                        <textarea class="form-control" id="potongan" name="potongan" data-type="editor"> ';
		echo LR\Filters::escapeHtmlText($potongan) /* line 32 */;
		echo '</textarea>
                        <span id="err_potongan"></span>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi berita</label>
                        <textarea class="form-control" id="isi" name="isi" data-type="editor">';
		echo LR\Filters::escapeHtmlText($isi) /* line 37 */;
		echo '</textarea>
                        <span id="err_isi"></span>
                    </div>
                    <div class="form-group">
                        <label for="kategoriid">Kategori</label>
                        <select class="form-control" id="kategoriid" name="kategoriid">
                            <option value="';
		echo LR\Filters::escapeHtmlAttr($kategoriid) /* line 43 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($kategorilabel) /* line 43 */;
		echo '</option>
';
		foreach ($kategori as $k) /* line 44 */ {
			echo '                                <option value="';
			echo LR\Filters::escapeHtmlAttr($k->id) /* line 45 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($k->nama) /* line 45 */;
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
		$i++) /* line 54 */ {
			echo '                                    <div class="item"><label>';
			echo LR\Filters::escapeHtmlText(explode(',', $tag)[$i]) /* line 55 */;
			echo '</label><button type=\'button\' class=\'removetagbtn\'><i class=\'las la-times\'></i></buttton></div>
';

		}
		echo '                            </div>
                            <input id="taginput" placeholder="kategori" data-type="tag">
                            <div class="clear"></div>
                        </div>
                        <input type="hidden" id="tag" name="tag" value="';
		echo LR\Filters::escapeHtmlAttr($tag) /* line 61 */;
		echo '">
                        <span id="err_tag"></span>
                    </div>
                    <div class="form-img">
                        <div class=\'cover\'>
                            <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($gambar)) /* line 66 */;
		echo '\'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Ganti gambar</label>
                        <input type="file" id="gambar" name="gambar">
                        <i class="las la-paperclip form-right"></i>
                        <div class="form-control">Pilih file untuk mengganti gambar</div>
                        <span id="err_gambar"></span>
                    </div>
                    <div class="form-group">
                        <label for="publikasi">Publikasi</label>
                        <select class="form-control" id="publikasi" name="publikasi">
                            <option value="';
		echo LR\Filters::escapeHtmlAttr($publikasi) /* line 79 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($publikasi) /* line 79 */;
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
		echo LR\Filters::escapeHtmlAttr(date('Y-m-d')) /* line 88 */;
		echo '">
                        <input type="hidden" id="editorid" name="editorid" value="">
                        <input type="hidden" id="id" name="id" value="';
		echo LR\Filters::escapeHtmlAttr($id) /* line 90 */;
		echo '">
                        <input type="hidden" id="__method" name="__method" value="PATCH">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 92 */;
		echo '">
                        <input type="hidden" id="uid" name="uid" value="';
		echo LR\Filters::escapeHtmlAttr($uid) /* line 93 */;
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


	/** {block js} on line 104 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
document.querySelector(\'iframe#editor0\').contentWindow.document.body.innerHTML = ';
		echo LR\Filters::escapeJs($potongan) /* line 106 */;
		echo ';
document.querySelector(\'iframe#editor1\').contentWindow.document.body.innerHTML = ';
		echo LR\Filters::escapeJs($isi) /* line 107 */;
		echo ';
removeBtn(\'tag\');
</script>
<script src="/assets/jsa/berita/edit.js"></script>
';
	}
}
