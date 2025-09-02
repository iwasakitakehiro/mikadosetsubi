<?php
class Controller
{

  public function __construct() {}

  public function send($client_name, $client_address, $client_message, $user_message, $mail, $items)
  {
    $to = $client_address;
    $client_subject = 'お問い合わせがありました';
    $client_subject = mb_encode_mimeheader($client_subject, 'UTF-8');

    $user_subject = 'お問い合わせありがとうございました';
    $user_subject = mb_encode_mimeheader($user_subject, 'UTF-8');
    $client_message_send = $client_message;
    $cl_message = mb_convert_encoding($client_message_send, 'ISO-2022-JP', 'UTF-8');
    $headers = 'From:' . $client_address . "\r\n";


    $separator = md5(time());
    $eol = PHP_EOL;

    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;


    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"" . $eol;
    $body .= "Content-Transfer-Encoding: 7bit" . $eol . $eol;
    $body .= $cl_message . $eol;

    // attachment for upfile1
    if (isset($items['ip']['image'])) {
      $fileName1 = $items['ip']['name'];
      $encodedFileName1 = mb_encode_mimeheader($fileName1, 'UTF-8');
      $body .= "--" . $separator . $eol;
      $body .= "Content-Type: application/octet-stream; name=\"" . $encodedFileName1 . "\"" . $eol;
      $body .= "Content-Transfer-Encoding: base64" . $eol;
      $body .= "Content-Disposition: attachment; filename=\"" . $encodedFileName1 . "\"" . $eol . $eol;
      $body .= $items['ip']['image'] . $eol;
    }

    // attachment for upfile2
    if (isset($items['pc']['image'])) {
      $fileName2 = $items['pc']['name'];
      $encodedFileName2 = mb_encode_mimeheader($fileName2, 'UTF-8');
      $body .= "--" . $separator . $eol;
      $body .= "Content-Type: application/octet-stream; name=\"" . $encodedFileName2 . "\"" . $eol;
      $body .= "Content-Transfer-Encoding: base64" . $eol;
      $body .= "Content-Disposition: attachment; filename=\"" . $encodedFileName2 . "\"" . $eol . $eol;
      $body .= $items['pc']['image'] . $eol;
    }

    $mailSuccess = true; // メール送信の成功フラグを初期化します。

    // メール送信1
    if (!mail($to, $client_subject, $body, $headers)) {
      $mailSuccess = false; // メール送信に失敗した場合はフラグをfalseに設定します。
    }

    // メール送信2
    if (!mail($mail, $user_subject, $user_message, "From:" . mb_encode_mimeheader($client_name) . "<" . $client_address . ">")) {
      $mailSuccess = false; // メール送信に失敗した場合はフラグをfalseに設定します。
    }

    // 両方のメール送信が成功した場合にのみ、セッションを破棄します。
    if ($mailSuccess) {
      setcookie(session_name(), '', time() - 42000, '/');
      session_destroy();
      return true;
    } else {
      // 必要に応じて、ここでメール送信失敗時のエラーハンドリングを行います。
      // 例えば、エラーメッセージを表示したり、エラーログを出力したりすることができます。
      return false;
    }
  }

  public function validate($inputs)
  {
    $err = array();
    foreach ($inputs as $value) {
      if ($value['required']) {
        switch ($value["type"]) {
          case "text":
            if (empty($_POST[$value['name']])) {
              $err[$value['name']] = $value['error_message'];
            }
            break;

          case "textarea":
            if (empty($_POST[$value['name']])) {
              $err[$value['name']] = $value['error_message'];
            }
            break;

          case "radio":
            if (empty($_POST[$value['name']])) {
              if (empty($_POST[$value['name'] . '_text'])) {
                $err[$value['name']] = $value['error_message'];
              }
            }
            break;
          case "select":
            if (empty($_POST[$value['name']])) {
              $err[$value['name']] = $value['error_message'];
            }
            break;

          case "checkbox":
            if (empty($_POST[$value['name']])) {
              if (empty($_POST[$value['name'] . '_text'])) {
                $err[$value['name']] = $value['error_message'];
              }
            }
            break;

          case "tel":
            foreach ($_POST[$value['name']] as $tel_num) {
              if (empty($tel_num)) {
                $err[$value['name']] = $value['error_message'];
              }
            }
            break;

          case "mail":
            if (empty($_POST[$value['name']]) || !preg_match("/^[^@]+@[^@]+$/", $_POST[$value['name']])) {
              $err[$value['name']] = $value['error_message'];
            }
            if (!empty($_POST['mail01']) && !empty($_POST['mail02']) && $_POST['mail01'] !== $_POST['mail02']) {
              $err[$value['name']] = "メールアドレスが一致していません";
            }
            break;
        }
      }
    }
    return $err;
  }
}
