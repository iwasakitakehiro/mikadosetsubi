<?php
require_once(dirname(__FILE__) . "/contact/view.php");
require_once(dirname(__FILE__) . "/contact/controller.php");
require_once(dirname(__FILE__) . "/contact/model.php");

$blank = true;
$send = false;


if (empty($_POST)) {
  $model = new Model();
  $view = new View();
  $inputs = $model->contents();
  $items = isset($_SESSION["items"]) ? $_SESSION["items"] : array();
}

if (isset($_POST['check'])) {
  session_start();

  $model = new Model();
  $view = new View();
  $inputs = $model->contents();
  $items = isset($_SESSION["items"]) ? $_SESSION["items"] : array();
  $controller = new Controller();
  $err = $controller->validate($inputs);
  if (!isset($_POST['policy'])) {
    $policy = "プライバシーポリシーに同意してください";
  }
  $items = $_POST;
  if (empty($err) && isset($_POST['policy'])) {

    $blank = false;
    $_SESSION["items"] = $items;
  }
}

if (isset($_POST['back'])) {
  session_start();
  $model = new Model();
  $view = new View();
  $inputs = $model->contents();
  $items = isset($_SESSION["items"]) ? $_SESSION["items"] : array();
}

if (isset($_POST['send'])) {
  session_start();
  $model = new Model();
  $view = new View();
  $controller = new Controller();
  $inputs = $model->contents();
  $items = $_SESSION["items"];

  $message = <<<EOT

  ■ お問い合わせカテゴリ
    $items[category]

  ■ お名前
    $items[username]

  ■ ふりがな
    $items[ruby]

  ■ メールアドレス
    $items[mail01]

  ■ 電話番号
    {$items['tel'][0]}-{$items['tel'][1]}-{$items['tel'][2]}

  ■ ご住所
    〒{$items['address']['post'][0]}-{$items['address']['post'][1]}
    {$items['address']['bunch']}

  ■ お問い合わせ内容
    $items[comment]

EOT;

  $client_message = $view->client_message($message = $message);

  $user_message = $view->user_message(
    $message = $message,
    $client_name = Model::$client_name,
    $name = $items['username'],
    $client_address = Model::$client_bunch
  );

  $sent = $controller->send(
    $client_name = Model::$client_name,
    $client_address = Model::$client_address,
    $client_message = $client_message,
    $user_message = $user_message,
    $mail = $items['mail01'],
    $items = $items
  );

  if ($sent) {
    $send = true;
    $blank = false;
    session_destroy();
  } else {
    exit("申し訳ございませんエラーが発生しました");
  }
}


?>
<?= get_header(); ?>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<main class="under-page">
  <section>
    <div class="sv case">
      <div>
        <h1>
          Contact
        </h1>
        <p>お問い合わせ</p>
      </div>
    </div>
  </section>
  <section>
    <div class="contact-message">
      <?php if ($blank) : ?>
        <div>
          <p>
            お問い合わせは下記フォームよりご連絡ください。<br>
            内容を確認し、担当者よりメールまたはお電話にてご連絡させていただきます。
          </p>
        </div>
      <?php elseif (!$blank && !$send) : ?>
        <div>
          <p>ご入力内容をご確認いただき、よろしければ【送信する】ボタンを押してください。</p>
        </div>
      <?php elseif (!$blank && $send) : ?>
        <div class="thankyou-wrap">
          <div class="compleate">
            <p>お問い合わせありがとうございます</p>
          </div>
          <div class="send-mail">
            <p>
              ご入力いただいた内容は正常に送信されました。<br>
              担当者より追ってご連絡いたしますので、今しばらくお待ちください。

            </p>
          </div>
          <div class="caution">
            <p>
              ※完了メールが届かない場合は、迷惑メールフォルダーをご確認いただくか、入力されたメールアドレスに誤りがないかご確認ください。
            </p>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <section <?php if (!$blank && $send) echo "style='display:none;'"; ?>>
    <form action="" method="post" class="h-adr">
      <div class="page-contact-contents">
        <div class="contact-wrap">
          <?php if ($blank) : ?>
            <span class="p-country-name" style="display:none;">Japan</span>
            <table>
              <tbody>
                <?php foreach ($inputs as $key => $value) : ?>
                  <?php
                  echo $view->{$value['type']}(
                    $name = $inputs[$key],
                    $class = isset($value['class']) ? $value['class'] : null,
                    $arr = $value['selects'] ? $value['selects'] : null,
                    $unit = !empty($value['unit']) ? $value['unit'] : null,
                    $error = !empty($err[$value['name']]) ? $err[$value['name']] : null,
                    $input_value = isset($items[$value['name']]) ? $items[$value['name']] : null,
                    $placeholder = isset($value['placeholder']) ? $value['placeholder'] : null,
                  );
                  ?>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>
      </div>
      <div class="form-foot">
        <div>
          <div class="policy">
            <input name="policy" id="policy" type="checkbox" <?php if (isset($_POST['policy'])) echo 'checked'; ?>>
            <label for="policy"><a href="<?= get_home_url(); ?>/plivacy-policy">プライバシーポリシー</a>に同意のうえ、送信してください。</label>
            <?php if (isset($policy)) : ?>
              <p class="err"><?= $policy ?></p>
            <?php endif; ?>
          </div>
          <div class="button-wrap">
            <button type="submit" class="check" name="check"><span>送信内容を確認する</span></button>
          </div>
        </div>
      </div>
    <?php elseif (!$blank && !$send) : ?>
      <table>
        <tbody>
          <?php foreach ($inputs as $key => $value) : ?>
            <?php
              switch ($inputs[$key]["type"]) {
                case 'radio':
                  if ($items[$value['name'] . '_text']) {
                    echo $view->confirm(
                      $name = $inputs[$key],
                      $input = $items[$value['name'] . '_text']
                    );
                  } else {
                    echo $view->confirm(
                      $name = $inputs[$key],
                      $input = $items[$value['name']]
                    );
                  }
                  break;
                case 'checkbox':
                  if ($items[$value['name'] . '_text']) {
                    $_SESSION['items'][$value['name']]['text'] = $items[$value['name'] . '_text'];
                    $items[$value['name']]['text'] = $items[$value['name'] . '_text'];
                    echo $view->confirm(
                      $name = $inputs[$key],
                      $input = $items[$value['name']]
                    );
                  } else {
                    echo $view->confirm(
                      $name = $inputs[$key],
                      $input = $items[$value['name']]
                    );
                  }
                  break;
                default:
                  echo $view->confirm(
                    $name = $inputs[$key],
                    $input = $items[$value['name']]
                  );
              }
            ?>
          <?php endforeach; ?>
          <tr>
            <td>
              <div class="button-wrap">
                <button type="submit" class="back" name="back"><span>内容を修正する</span></button>
                <button type="submit" class="send" name="send"><span>送信する</span></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
    <?php elseif (!$blank && $send) : ?>

    <?php endif; ?>
    </form>
  </section>
  <footer class="under-page">
    <div class="footer-wrap">
      <div>
        <div class="footer-nav">
          <div class="logo">
            <a href="<?= get_home_url(); ?>/">
              <img src="<?= get_template_directory_uri(); ?>/img/global/footer-logo.png" alt="logo">
            </a>
          </div>
          <nav>
            <ul>
              <li>
                <a href="<?= get_home_url(); ?>/service">
                  <p class="en">Service</p>
                  <p class="jp">業務内容</p>
                </a>
              </li>
              <li>
                <a href="<?= get_home_url(); ?>/case">
                  <p class="en">Case</p>
                  <p class="jp">施工実績</p>
                </a>
              </li>
              <li>
                <a href="<?= get_home_url(); ?>/company">
                  <p class="en">Company</p>
                  <p class="jp">会社案内</p>
                </a>
              </li>
              <li>
                <a href="<?= get_home_url(); ?>/recruit">
                  <p class="en">Recruit</p>
                  <p class="jp">採用情報</p>
                </a>
              </li>
              <li>
                <a href="<?= get_home_url(); ?>/news">
                  <p class="en">News</p>
                  <p class="jp">新着情報</p>
                </a>
              </li>
              <li class="contact">
                <a href="<?= get_home_url(); ?>/contact">
                  <span> お問い合わせ</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="map-wrap">
        <div>
          <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4593.492408983703!2d140.12334408530782!3d35.50206185213661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60229918c2b64ad5%3A0xf0c66b69c4b8366e!2z77yI5qCq77yJ5bid6Kit5YKZ!5e0!3m2!1sja!2sjp!4v1756097439019!5m2!1sja!2sjp" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div>
            <p class="name">
              市原本社
            </p>
            <p class="address">〒290-0021　千葉県市原市山田橋2-3-18</p>
            <p class="address">TEL: 0436-43-1252／<br class="sp">FAX: 0436-41-7292</p>
          </div>
        </div>
        <div>
          <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.5794437901185!2d139.77647893264609!3d35.670326144591435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188960e9c1cae3%3A0xc29e17cb29a02968!2z44CSMTA0LTAwNDIg5p2x5Lqs6YO95Lit5aSu5Yy65YWl6Ii577yT5LiB55uu77yU4oiS77yXIOODhOOCq-ODgOODk-ODqyAz6ZqO!5e0!3m2!1sja!2sjp!4v1756097823754!5m2!1sja!2sjp" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div>
            <p class="name">
              東京営業所
            </p>
            <p class="address">〒104-0042　東京都中央区入船3-4-7　ツカダビル3階</p>
            <p class="address">TEL: 03-6262-80662／<br class="sp">FAX: 03-6262-8067</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</main>
<?= get_footer(); ?>