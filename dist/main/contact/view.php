<?php

class View
{

  public function __construct() {}

  public function client_message($message)
  {
    $text = "";
    $text .= <<<EOT
  ホームページからお問い合わせがありました。
  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

$message

  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOT;

    return $text;
  }

  public function user_message($message, $client_name, $name, $client_address)
  {
    $text = "";
    $text .= <<<EOT
$name 様

このたびは、 $client_name にお問い合わせいただき、ありがとうございます。
近日担当者よりご連絡を差し上げますので、しばらくお待ちくださいませ。


◆お客さま情報◆
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

$message

◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆

$client_name
$client_address

◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆
EOT;

    return $text;
  }



  public function confirm($name, $input)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    $html = "";
    switch ($name["type"]) {
      case "file":
        $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                  <td>
                    <p>{$input['name']}</p>
                  </td>
                </tr>
                ";
        break;
      case "text":
        if (isset($name['unit'])) {
          $html = "<tr>
          <th>{$name['label']}{$require}</th>
          <td>
            <div class='unit'>
            <p>{$input}</p>
            <p>{$name['unit']}</p>
            </div>
          </td>
        </tr>
        ";
        } else {
          $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                  <td>
                    <p>{$input}</p>
                  </td>
                </tr>
                ";
        }
        break;

      case "file":
        $html = "<tr>
          <th>{$name['label']}{$require}</th>
          <td>
            <p>{$input}</p>
          </td>
        </tr>
        ";
        break;

      case "textarea":
        $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                  <td>
                    <p>{$input}</p>
                  </td>
                </tr>
                ";
        break;

      case "radio":
        $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                  <td>
                    <p>{$input}</p>
                  </td>
                </tr>
                ";
        break;

      case "select":
        $html = "<tr>
                    <th>{$name['label']}{$require}</th>
                    <td>
                      <p>{$input}</p>
                    </td>
                  </tr>
                  ";
        break;

      case "checkbox":
        $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                ";
        if (isset($input) && is_array($input)) {

          foreach ($input as $text) {
            $html .= "<td>
                        <p>{$text}</p>
                      </td>
                      ";
          }
        } else {

          $html .= "<td>
                    <p>{$input}</p>
        </td>
        ";
        }
        $html .= "</tr>";
        break;

      case "tel":
        $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                  <td>
                    <div class='tel-wrap'>
                      <div><p>{$input[0]}</p></div>

                    </div>
                  </td>
                </tr>
                ";
        break;

      case "mail":
        $html = "<tr>
                  <th>{$name['label']}{$require}</th>
                  <td>
                    <p>{$input}</p>
                  </td>
                </tr>
                ";
        break;

      case "address":
        $html = "<tr>
                    <th>{$name['label']}{$require}</th>
                    <td>
                      <div class='post-wrap'>
                        <div><p>{$input['post'][0]}</p></div>
                        <div><p>{$input['post'][1]}</p></div>
                      </div>
                      <div><p>{$input['bunch']}</p></div>
                    </td>
                  </tr>
                  ";
        break;
    }

    return $html;
  }

  public function text($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null, $placeholder = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    $html = "<tr>
                <th>{$name['label']}{$require}</th>
                <td>
                  <div class='unit'>
                    <input type='text' class='{$class}' name='{$name['name']}' value='{$input_value}' placeholder='{$placeholder}'><p>{$unit}</p>
                  </div>
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";
    return $html;
  }

  public function address($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null, $placeholder = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    if ($input_value) {
      $arr = $input_value;
    }
    $html = "<tr>
                <th>{$name['label']}{$require}</th>
                <td>
              ";
    foreach ($arr as $key => $value) {
      if ($key == "post") {
        $html .= "<div class='post-wrap'>
                    <div><input type='text' class='p-postal-code' size='3' maxlength='3' name='{$name['name']}[{$key}][0]' value='{$value[0]}' placeholder='000'></div>
                    <div><input type='text' class='p-postal-code' size='4' maxlength='4' name='{$name['name']}[{$key}][1]' value='{$value[1]}' placeholder='0000'></div>
                  </div>
                  ";
      } else {
        $html .= "<input type='text' class='address p-region p-locality p-street-address p-extended-address' name='{$name['name']}[bunch]' value='{$value}' placeholder='{$placeholder}'>";
      }
    }
    $html .= "<p class='err'>{$error}</p>
               </td>
              </tr>";

    return $html;
  }

  public function textarea($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null, $placeholder = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    $html = "<tr>
                <th>{$name['label']}{$require}</th>
                <td>
                  <textarea type='text' name='{$name['name']}' placeholder='{$placeholder}'>$input_value</textarea>
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";

    return $html;
  }

  public function file($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    if ($name['name'] == "ip") {
      $link = '<div class="link">ネットワーク確認画面のスクリーンショットを添付してください。<br>
                <a target="_blank" href="./conf-network.html">ネットワーク確認画面の表示方法はこちら</a>
              </div>';
    } else {
      $link = '<div class="link">システム確認画面のスクリーンショットを添付してください。<br>
                <a target="_blank" href="./conf-system.html">システム確認画面の表示方法はこちら</a>
              </div>';
    }

    $inputs = "";
    for ($i = 0; $i < count($arr["inputs"]); $i++) {
      $inputs .= "<div><input type='file' name='{$name['name']}[$i]' accept='{$arr['accept']}' size={$arr['size']} value='{$input_value}'></div>";
    }
    $html = "<tr>
                <th>{$name['label']}{$require}
                $link
                </th>
                <td>
                  {$inputs}
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";

    return $html;
  }

  public function mail($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null, $placeholder = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    $html = "<tr>
                <th>{$name['label']}{$require}</th>
                <td>
                  <input type='text' name='{$name['name']}' value='{$input_value}' placeholder='{$placeholder}'>
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";

    return $html;
  }

  public function tel($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null, $placeholder = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";
    if ($input_value) {
      $arr = $input_value;
    }
    $html = "<tr>
                <th>{$name['label']}{$require}</th>
                <td>
                <div class='tel-wrap'>
              ";
    foreach ($arr as $key => $value) {
      $html .= "<div><input type='text' class='tel' name='{$name['name']}[{$key}]' value='{$value}' placeholder='{$placeholder}'></div>";
    }
    $html .= "
              </div>
              <p class='err'>{$error}</p>
               </td>
              </tr>";

    return $html;
  }

  public function select($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";

    $html = "
              <tr>
                <th>{$name['label']}{$require}</th>
                <td>
                  <select name='{$name['name']}'>            
            ";
    foreach ($arr as $index => $value) {
      if (isset($input_value)) {
        $selected = ($value == $input_value) ? "selected" : "";
        if ($index == 0) {
          $html .= "
          <option value=''>{$value}</option>
          ";
        } else {
          $html .= "
          <option type='radio' value='{$value}' $selected>$value</option>
           ";
        }
      } else {
        if ($index == 0) {
          $html .= "
          <option value=''>{$value}</option>
        ";
        } else {
          $html .= "
              <option type='radio' value='{$value}'>$value</option>
        ";
        }
      }
    }
    $html .= "
                </select>
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";

    return $html;
  }

  public function radio($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";

    $html = "
              <tr>
                <th>{$name['label']}{$require}</th>
                <td>
                  <fieldset>            
            ";
    foreach ($arr as $value) {
      if (isset($input_value)) {

        if ($value['text']) {
          $checked = ($value['label'] == $input_value) ? "checked" : "";
          $input = "<input type='text' name='{$name['name']}_text'>";
          $html .= "
                    <div class='with-input'>
                      <label for='{$value['label']}_{$name['name']}'>
                        <input id='{$value['label']}_{$name['name']}' type='radio' name='{$name['name']}' value='' $checked>
                        {$value['label']}
                      </label>
                      {$input}
                    </div>
                    ";
        } else {
          $checked = ($value['label'] == $input_value) ? "checked" : "";

          $html .= "
          <div>
            <label for='{$value['label']}_{$name['name']}'>
              <input id='{$value['label']}_{$name['name']}' type='radio' name='{$name['name']}' value='{$value['label']}' $checked>
              {$value['label']}
            </label>
          </div>
        ";
        }
      } else {
        if ($value['text']) {
          $input = "<input type='text' name='{$name['name']}_text' value=''>";
          $html .= "
                    <div class='with-input'>
                      <label for='{$value['label']}_{$name['name']}'>
                        <input id='{$value['label']}_{$name['name']}' type='radio' name='{$name['name']}' value=''>
                        {$value['label']}
                      </label>
                      {$input}
                    </div>
                    ";
        } else {
          $html .= "
        <div>
        <label for='{$value['label']}_{$name['name']}'>
            <input id='{$value['label']}_{$name['name']}' type='radio' name='{$name['name']}' value='{$value['label']}'>
            {$value['label']}
          </label>
        </div>
        ";
        }
      }
    }
    $html .= "
                </fieldset>
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";

    return $html;
  }

  public function checkbox($name, $class = null, $arr = null, $unit = null, $error = null, $input_value = null)
  {
    $require = $name['required'] ? '<span>必須</span>' : "";

    $html = "
              <tr>
                <th>{$name['label']}{$require}</th>
                <td>
                  <fieldset class='select'>            
            ";
    foreach ($arr as $value) {
      if (isset($input_value)) {
        $checked = in_array($value['label'], $input_value) ? "checked" : "";
        if ($value['text']) {
          if (isset($input_value['text'])) {
            $input = "<input type='text' name='{$name['name']}_text' value='{$input_value['text']}'>";
          } else {
            $input = "<input type='text' name='{$name['name']}_text' value=''>";
          }

          $html .= "
          <div class='with-input'>
            <label for='{$value['label']}_{$name['name']}'>
              <input id='{$value['label']}_{$name['name']}' type='checkbox' name='{$name['name']}[]' value='{$value['label']}' $checked>
              {$value['label']}
            </label>
            {$input}
          </div>
        ";
        } else {
          $html .= "
          <div>
            <label for='{$value['label']}'>
              <input id='{$value['label']}' type='checkbox' name='{$name['name']}[]' value='{$value['label']}' $checked>
              {$value['label']}
            </label>
          </div>
        ";
        }
      } else {
        if ($value['text']) {
          $input = "<input type='text' name='{$name['name']}_text' value=''>";
          $html .= "
                    <div class='with-input'>
                      <label for='{$value['label']}_{$name['name']}'>
                        <input id='{$value['label']}_{$name['name']}' type='checkbox' name='{$name['name']}[]' value='{$value['label']}'>
                        {$value['label']}
                      </label>
                      {$input}
                    </div>
                    ";
        } else {
          $html .= "
          <div>
            <label for='{$value['label']}'>
              <input id='{$value['label']}' type='checkbox' name='{$name['name']}[]' value='{$value['label']}'>
              {$value['label']}
            </label>
          </div>
          ";
        }
      }
    }
    $html .= "
                </fieldset>
                  <p class='err'>{$error}</p>
                </td>
              </tr>
              ";

    return $html;
  }
}
