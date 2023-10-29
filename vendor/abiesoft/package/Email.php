<?php

namespace AbieSoft\Application\Package;

use AbieSoft\Application\Utilities\Config;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public static function kirim(string $tujuan, string $judul, string $isi) : bool
    {
        $mail = new PHPMailer(true);
        try {
            /*
                Konfigurasi Email lihat di file .env
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            */
            $mail->isSMTP();
            $mail->Host       = Config::envReader('EMAIL_SMTP');
            $mail->SMTPAuth   = true;
            $mail->Username   = Config::envReader('EMAIL_AKUN');
            $mail->Password   = Config::envReader('EMAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = Config::envReader('EMAIL_PORT');

            /*
                Email seting
            */
            $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
            $mail->addAddress($tujuan);     // Penerima Email
            //---$mail->addAddress('ellen@example.com');               //Penerima lain
            //$mail->addReplyTo('info@example.com', 'Information');
            //---$mail->addCC('cc@example.com');
            //---$mail->addBCC('bcc@example.com');

            //Attachments
            //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Tambah Lampiran Email
            //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            /*
                Konten
            */
            $mail->isHTML(true);                                  //Email format html
            $mail->Subject = $judul;
            $mail->Body    = $isi;
            //$mail->AltBody = 'digunakan untuk text non HTML';

            $mail->send();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }




    public static function verifikasi(string $tujuan, string $judul, string $isi) : bool
    {
        $mail = new PHPMailer(true);
        try {
            /*
                Konfigurasi Email lihat di file .env
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            */
            $mail->isSMTP();
            $mail->Host       = Config::envReader('EMAIL_SMTP');
            $mail->SMTPAuth   = true;
            $mail->Username   = Config::envReader('EMAIL_AKUN');
            $mail->Password   = Config::envReader('EMAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = Config::envReader('EMAIL_PORT');

            /*
                Email seting
            */
            $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
            $mail->addAddress($tujuan);     // Penerima Email
            //---$mail->addAddress('ellen@example.com');               //Penerima lain
            //$mail->addReplyTo('info@example.com', 'Information');
            //---$mail->addCC('cc@example.com');
            //---$mail->addBCC('bcc@example.com');

            //Attachments
            //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Tambah Lampiran Email
            //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            /*
                Konten
            */
            $mail->isHTML(true);                                  //Email format html
            $mail->Subject = $judul;
            $mail->Body    = "
                <div style='display: flex; justify-centent: center; align-items: center; background-color: #eee; padding: 40px'>
                    <div style='max-width: 350px; position: relative; margin-left: auto; margin-right: auto; padding: 30px; border-radius: 8px; background-color: #fff;'>
                        <div style='font-size: 10pt; text-align: center;'>Kode Reset Anda :</div>
                        <div style='font-weight: bold; font-size: 28pt; text-align:center; padding: 10px 0;'>$isi</div>
                        <div style='font-size: 10pt; text-align:center;'>Rahasiakan kode ini dari orang lain. Pastikan anda yang menggunakan kode ini.</div>
                        <div style='margin-top: 8px; font-size: 10pt; text-align:center;'>dari <strong>".Config::envReader('WEB_TITLE')."'s Team.</strong></div>
                    </div>
                </div>    
            ";
            //$mail->AltBody = 'digunakan untuk text non HTML';

            $mail->send();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}
