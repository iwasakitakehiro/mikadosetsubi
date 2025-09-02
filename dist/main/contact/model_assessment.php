<?php
class Model
{
  private $contents;
  static $client_address = "info@denen-h.com";
  static $client_name = "市原田園ホーム有限会社";
  static $client_bunch = <<<EOT
〒290-0081
千葉県市原市五井中央西2丁目24番地13
EOT;
  public function __construct()
  {
    $this->contents = [
      "お名前" => [
        "label" => "お名前",
        "name" => "username",
        "type" => "text",
        "selects" => "",
        "required" => true,
        "error_message" => "お名前を入力してください"
      ],
      "ふりがな" => [
        "label" => "ふりがな",
        "name" => "ruby",
        "type" => "text",
        "selects" => "",
        "required" => true,
        "error_message" => "ふりがなを入力してください"
      ],
      "メールアドレス（半角）" => [
        "label" => "メールアドレス（半角）",
        "name" => "mail01",
        "type" => "mail",
        "selects" => "",
        "required" => true,
        "error_message" => "メールアドレス（半角）を入力してください"
      ],
      "確認用メールアドレス（半角）" => [
        "label" => "確認用メールアドレス（半角）",
        "name" => "mail02",
        "type" => "mail",
        "selects" => "",
        "required" => true,
        "error_message" => "確認用メールアドレス（半角）を入力してください"
      ],
      "電話番号（半角）" => [
        "label" => "電話番号（半角）",
        "name" => "tel",
        "type" => "tel",
        "selects" => array("", "", ""),
        "required" => true,
        "error_message" => "電話番号（半角）を入力してください"
      ],
      "物件の住所" => [
        "label" => "物件の住所",
        "name" => "address",
        "type" => "text",
        "selects" => "",
        "required" => true,
        "error_message" => "物件の住所を入力してください"
      ],
      "物件の種別" => [
        "label" => "物件の種別",
        "name" => "category",
        "type" => "select",
        "selects" => array("物件種別を選択してください", "マンション", "戸建て", "土地", "一棟マンション･アパート"),
        "required" => true,
        "error_message" => "物件の種別を選択してください"
      ],
      "土地面積" => [
        "label" => "土地面積",
        "name" => "land",
        "unit" => "㎡",
        "type" => "text",
        "selects" => "",
        "required" => true,
        "error_message" => "土地面積を入力してください"
      ],
      "専有面積" => [
        "label" => "専有面積",
        "name" => "landproprietary",
        "unit" => "㎡",
        "type" => "text",
        "selects" => "",
        "required" => false,
        "error_message" => ""
      ],
      "建物面積" => [
        "label" => "建物面積",
        "name" => "building",
        "unit" => "㎡",
        "type" => "text",
        "selects" => "",
        "required" => false,
        "error_message" => ""
      ],
      "総戸数" => [
        "label" => "総戸数",
        "name" => "buildnum",
        "unit" => "戸",
        "type" => "text",
        "selects" => "",
        "required" => false,
        "error_message" => ""
      ],
      "間取り" => [
        "label" => "間取り",
        "name" => "floor",
        "type" => "radio",
        "selects" => array("1K/DK/LDK", "2K/DK/LDK", "3K/DK/LDK", "4K/DK/LDK", "その他"),
        "required" => true,
        "error_message" => "間取りを選択してください"
      ],
      "建築年" => [
        "label" => "建築年",
        "name" => "buildyear",
        "unit" => "年（西暦）",
        "type" => "text",
        "selects" => "",
        "required" => true,
        "error_message" => "建築年を入力してください"
      ],
      "物件の現状" => [
        "label" => "物件の現状",
        "name" => "situation",
        "type" => "select",
        "selects" => array("物件の現状を選択してください", "居住中", "賃貸中", "空室", "古家付き土地", "更地"),
        "required" => true,
        "error_message" => "物件の現状を選択してください"
      ],
      "売却理由（複数回答可）" => [
        "label" => "売却理由（複数回答可）",
        "name" => "reasons",
        "type" => "checkbox",
        "selects" => array("住み替えの為", "相続", "転勤", "離婚", "金銭的理由", "他社で売れないため", "所有者が高齢のため", "人に頼まれた", "知人・親族に売るため", "任意売却", "資産整理", "その他"),
        "required" => true,
        "error_message" => "売却理由を選択してください"
      ],
      "査定方法（複数回答可）" => [
        "label" => "査定方法（複数回答可）",
        "name" => "method",
        "type" => "checkbox",
        "selects" => array("机上査定（簡易的な査定）", "訪問査定（机上査定より精度の高い査定）", "即金買取査定"),
        "required" => true,
        "error_message" => "査定方法を選択してください"
      ],
      "備考" => [
        "label" => "備考",
        "name" => "comment",
        "type" => "textarea",
        "selects" => "",
        "required" => false,
        "error_message" => ""
      ],
    ];
  }

  public function contents()
  {
    return $this->contents;
  }
}
