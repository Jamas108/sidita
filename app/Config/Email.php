<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'myemailtest80802@gmail.com';
    public string $fromName   = 'Kesatria Jamas';
    public string $recipients = '';

    public $default = [
        'protocol' => 'smtp',               // Gunakan SMTP
        'SMTPHost' => 'smtp.googlemail.com', // Host SMTP Mailtrap
        'SMTPUser' => 'myemailtest80802@gmail.com',     // Username Mailtrap Anda
        'SMTPPass' => 'Testing1234',     // Password Mailtrap Anda
        'SMTPPort' => 465,                  // Port SMTP yang disarankan (587)
        'mailType' => 'html',               // Tipe email (HTML atau teks)
        'charset' => 'utf-8',               // Set charset email
        'wordWrap' => true,                 // Menyertakan pembungkus kata
        'SMTPAuth' => true,                 // Aktifkan otentikasi SMTP
        'SMTPCrypto' => 'ssl',             // Gunakan enkripsi TLS
        'starttls' => true,                 // Aktifkan STARTTLS untuk enkripsi yang lebih aman
    ];



    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp';

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'smtp.googlemail.com';

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'myemailtest80802@gmail.com';

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'Testing1234';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 465;

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 60;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to ''.
     */
    public string $SMTPCrypto = 'ssl';

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
