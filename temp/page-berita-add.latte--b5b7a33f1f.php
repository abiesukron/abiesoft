<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/berita/add.latte */
final class Templateb5b7a33f1f extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/berita/add.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 112 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['k' => '49'], $this->params) as $ʟ_v => $ʟ_l) {
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
                <button class=\'left\' onClick="window.location.href=this.dataset.url" data-url="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 12 */;
		echo '/';
		echo LR\Filters::escapeHtmlAttr($sessionkey) /* line 12 */;
		echo '/berita"><i class=\'las la-angle-left\'></i></button>
                <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 13 */;
		echo '</div>
                <button class=\'card-option-btn hide right\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
            </div>

            <!-- Card Body -->
            <div class=\'card-body\'>
                
                <form method="post" id="formAdd" name="formAdd" onSubmit="return submitAdd()">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input class="form-control" id="judul" name="judul" placeholder="Judul berita">
                        <span id="err_judul"></span>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control" id="prevslug" name="prevslug" placeholder="Slug berita" disabled>
                        <input type=\'hidden\' class="form-control" id="slug" name="slug">
                    </div>
                    <div class="form-group">
                        <label for="potongan">Potongan berita</label>
                        <textarea class="form-control" id="potongan" name="potongan" data-type="editor"></textarea>
                        <span id="err_potongan"></span>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi berita</label>
                        <textarea class="form-control" id="isi" name="isi" data-type="editor"></textarea>
                        <span id="err_isi"></span>
                    </div>

                    <div class=\'row\'>
                        <div class=\'col-6\'>

                            <div class="form-group">
                                <label for="kategoriid">Kategori</label>
                                <select class="form-control" id="kategoriid" name="kategoriid">
                                    <option value="">Pilih kategori</option>
';
		foreach ($kategori as $k) /* line 49 */ {
			echo '                                        <option value="';
			echo LR\Filters::escapeHtmlAttr($k->id) /* line 50 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($k->nama) /* line 50 */;
			echo '</option>
';

		}

		echo '                                </select>
                                <span id="err_kategoriid"></span>
                            </div>

                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <div class="form-control tag">
                                    <div id="items">
                                    </div>
                                    <input id="taginput" placeholder="Tag" data-type="tag">
                                    <div class="clear"></div>
                                </div>
                                <input type="hidden" id="tag" name="tag">
                                <span id="err_tag"></span>
                            </div>
                        </div>    
                        <div class=\'col-6\'>
                            <div id=\'imagecontainer\' class="form-img">
                                <div style=\'width: 100%; min-height: 93px; background: #f3f6fc; display: flex; justify-content: center; align-items: center;\'>Preview Gambar</div>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload gambar</label>
                                <input type="file" id="gambar" name="gambar">
                                <i class="las la-paperclip form-right"></i>
                                <div class="form-control">Pilih file</div>
                                <span id="err_gambar"></span>
                            </div>
                        </div>    
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="publikasi">Publikasi</label>
                        <select class="form-control" id="publikasi" name="publikasi">
                            <option value="">Pilih status publikasi</option>
                            <option value="Terbit">Terbit</option>
                            <option value="Draft">Draft</option>
                            <option value="Jadwalkan">Jadwalkan</option>
                        </select>
                        <span id="err_publikasi"></span>
                    </div>
                    <hr>
                    <div class="form-button">
                        <input type="hidden" id="editing" name="editing" value="';
		echo LR\Filters::escapeHtmlAttr(date('Y-m-d')) /* line 98 */;
		echo '">
                        <input type="hidden" id="editorid" name="editorid" value="">
                        <input type="hidden" id="uid" name="uid" value="';
		echo LR\Filters::escapeHtmlAttr($uid) /* line 100 */;
		echo '">
                        <input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 101 */;
		echo '">
                        <button class="btn btn-abiesoft"><span id="btnsubmit">Simpan</span></button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</div>
';
	}


	/** {block js} on line 112 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script src="/assets/jsa/berita/add.js"></script>
';
	}
}
