<?php

use Latte\Runtime as LR;

/** source: D:\Programming\Project\test\abiesoft\vendor\abiesoft\Http/../../../templates/page/form/index.latte */
final class Template9a2a102e1f extends Latte\Runtime\Template
{
	public const Source = 'D:\\Programming\\Project\\test\\abiesoft\\vendor\\abiesoft\\Http/../../../templates/page/form/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 160 */;
	}


	public function prepare(): array
	{
		extract($this->params);

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

		echo '<div class="page">
    <div class="card">

        <!-- Card Header -->
        <div class=\'card-header\'>
            <button id=\'back\' class=\'left\'><i class=\'las la-angle-left\'></i></button>
            <div class=\'label\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 11 */;
		echo '</div>
            <button class=\'card-option-btn right\' data-model=\'buttonopsi\'><i class=\'las la-ellipsis-v\' data-model=\'buttonopsi\'></i></button>
        </div>
        <div class=\'card-opsi\'>
            <button onClick=\'window.location.href=this.dataset.url\' data-url=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 15 */;
		echo '/\'><i class=\'las la-pen\'></i> <span>Edit</span></button>
            <form method=\'post\' id=\'formHapus\' name=\'formHapus\' onSubmit=\'return hapus()\'>
                <input type=\'hidden\' id=\'__info\' name=\'__info\' value=\'\'>
                <input type=\'hidden\' id=\'__token\' name=\'__token\' value=\'';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 18 */;
		echo '\'>
                <input type=\'hidden\' id=\'__url\' name=\'__url\' value=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 19 */;
		echo '\'>
                <input type=\'hidden\' id=\'id\' name=\'id\' value=\'';
		echo LR\Filters::escapeHtmlAttr($id) /* line 20 */;
		echo '\'>
                <input type=\'hidden\' id=\'__tb\' name=\'__tb\' value=\'\'>
                <input type=\'hidden\' id=\'__method\' name=\'__method\' value=\'DELETE\'>
                <button><i class=\'las la-trash\'></i> <span>Hapus</span></button>
            </form>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            
            
            <div class="label">Form Manual</div>
            <hr>
            <form>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control" id="nama" name="nama" placeholder="Nama">
                    <span id="err_nama"></span>
                </div>
                
                <div class=\'row\'>
                    <div class=\'col-4\'>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span id="err_jeniskelamin"></span>
                        </div>
                    </div>
                    <div class=\'col-4\'>
                        <div class="form-group">
                            <label for="password">Password Saat Ini</label>
                            <i class="las la-eye form-right"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="****">
                            <span id="err_password"></span>
                        </div>                    
                    </div>
                    <div class=\'col-4\'>
                        <div class="form-group">
                            <label for="password">Password Saat Ini</label>
                            <i class="las la-eye form-right"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="****">
                            <span id="err_password"></span>
                        </div>                    
                    </div>


                    <div class=\'col-3\'>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span id="err_jeniskelamin"></span>
                        </div>
                    </div>
                    <div class=\'col-3\'>
                        <div class="form-group">
                            <label for="password">Password Saat Ini</label>
                            <i class="las la-eye form-right"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="****">
                            <span id="err_password"></span>
                        </div>                    
                    </div>
                    <div class=\'col-3\'>
                        <div class="form-group">
                            <label for="password">Password Saat Ini</label>
                            <i class="las la-eye form-right"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="****">
                            <span id="err_password"></span>
                        </div>                    
                    </div>
                    <div class=\'col-3\'>
                        <div class="form-group">
                            <label for="password">Password Saat Ini</label>
                            <i class="las la-eye form-right"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="****">
                            <span id="err_password"></span>
                        </div>                    
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                    <span id="err_alamat"></span>
                </div>
                <div class="form-group">
                    <label for="photo">Upload File</label>
                    <input type="file" id="photo" name="photo">
                    <i class="las la-paperclip form-right"></i>
                    <div class="form-control">Pilih file</div>
                    <span id="err_photo"></span>
                </div>
                
                <div class="form-group">
                    <label for="nama">Tanggal</label>
                    <i class="las la-calendar form-right"></i>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="2023-01-01 00:00:00">
                    <span id="err_nama"></span>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" data-type="editor"></textarea>
                    <span id="err_editor"></span>
                </div>
                <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea class="form-control" id="isi" name="isi" data-type="editor"></textarea>
                    <span id="err_isi"></span>
                </div>
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <div class="form-control tag">
                        <div id="items">
                        </div>
                        <input id="taginput" placeholder="kategori" data-type="tag">
                        <div class="clear"></div>
                    </div>
                    <input type="hidden" id="kategori" name="kategori">
                    <span id="err_tag"></span>
                </div>
            </form>

            <div class="label">Form Otomatis</div>
            <hr>
        </div>
    </div>
</div>
';
	}


	/** {block js} on line 160 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
