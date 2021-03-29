<?php
$kind = array();
$kind[1] = '北海道';
$kind[2] = '青森県';
$kind[3] = '岩手県';
$kind[4] = '宮城県';
$kind[5] = '秋田県';
$kind[6] = '山形県';
$kind[7] = '福島県';
$kind[8] = '茨城県';
$kind[9] = '栃木県';
$kind[10] = '群馬県';
$kind[11] = '埼玉県';
$kind[12] = '千葉県';
$kind[13] = '東京都';
$kind[14] = '神奈川県';
$kind[15] = '新潟県';
$kind[16] = '富山県';
$kind[17] = '石川県';
$kind[18] = '福井県';
$kind[19] = '山梨県';
$kind[20] = '長野県';
$kind[21] = '岐阜県';
$kind[22] = '静岡県';
$kind[23] = '愛知県';
$kind[24] = '三重県';
$kind[25] = '滋賀県';
$kind[26] = '京都府';
$kind[27] = '大阪府';
$kind[28] = '兵庫県';
$kind[29] = '奈良県';
$kind[30] = '和歌山県';
$kind[31] = '鳥取県';
$kind[32] = '島根県';
$kind[33] = '岡山県';
$kind[34] = '広島県';
$kind[35] = '山口県';
$kind[36] = '徳島県';
$kind[37] = '香川県';
$kind[38] = '愛媛県';
$kind[39] = '高知県';
$kind[40] = '福岡県';
$kind[41] = '佐賀県';
$kind[42] = '長崎県';
$kind[43] = '熊本県';
$kind[44] = '大分県';
$kind[45] = '宮崎県';
$kind[46] = '鹿児島県';
$kind[47] = '沖縄県';

    session_start();
$mode = 'input';
$errmessage = array();

date_default_timezone_set('Asia/Tokyo');
$today = date("Y年m月d日");

  if (isset($_POST['back']) && $_POST['back']) {
      // 何もしない
  } elseif (isset($_POST['confirm']) && $_POST['confirm']) {
      if (!$_POST['todouhuken']) {
          $errmessage[] = '都道府県を入力して下さい';
      } elseif ($_POST['todouhuken'] <= 0 || $_POST['todouhuken'] >= 48) {
          $errmessage[] = '不正な入力です';
      }
      $_SESSION['todouhuken'] =htmlspecialchars($_POST['todouhuken'], ENT_QUOTES);
      $_SESSION['madori']  =htmlspecialchars($_POST['madori'], ENT_QUOTES);
      $_SESSION['kiboubi']  =htmlspecialchars($_POST['kiboubi'], ENT_QUOTES);
      $_SESSION['mitumori']    =htmlspecialchars($_POST['mitumori'], ENT_QUOTES);
      $_SESSION['namae']  =htmlspecialchars($_POST['namae'], ENT_QUOTES);
      $_SESSION['email'] =htmlspecialchars($_POST['email'], ENT_QUOTES);
      $_SESSION['tel']   =htmlspecialchars($_POST['tel'], ENT_QUOTES);

      
      if ($errmessage) {
          $mode = 'input';
      } else {
          $mode = 'confirm';
      }
  } elseif (isset($_POST['send']) && $_POST['send']) {
      //送信ボタンを押した時
      $massage =
      "※このメールはシステムからの自動返信です。"."\r\n"."\r\n"

      .$_SESSION['namae']." 様" ."\r\n"."\r\n"
      ."以下の内容でお問い合わせをお受けいたしました。"."\r\n"."\r\n"
      
      ."▼お問い合わせ内容▼"."\r\n"
      ."-------------------------------------------"."\r\n"
      ."お問い合わせ日時  ". $today ."\r\n"
      ."都道府県：" .$kind[$_SESSION['todouhuken']]. "\r\n"
      ."間取り：" .$_SESSION['madori']. "\r\n"
      ."希望日：" .$_SESSION['kiboubi']. "\r\n"
      ."買い取り見積もり：" .$_SESSION['mitumori']. "\r\n"
      ."お名前：" .$_SESSION['namae']. "\r\n"
      ."メールアドレス：" .$_SESSION['email']. "\r\n"
      ."電話番号：" .$_SESSION['tel']. "\r\n"
      ."-------------------------------------------"."\r\n"
      . preg_replace("/\r\n|\r|\n/", "\r\n", $_SESSION['message']);
      mail($_SESSION['email'], '【遺品整理見積もり】お問い合わせいただきありがとうございます。', $massage);
      mail('ytkionsunair@gmail.com', '【遺品整理見積もり】お問い合わせメールのお知らせ', $massage);
      $_SESSION = array();
      $mode = 'send';
  } else {
      $_SESSION['todouhuken'] ="";
      $_SESSION['madori']  ="";
      $_SESSION['kiboubi']  ="";
      $_SESSION['mitumori']    ="";
      $_SESSION['namae']  ="";
      $_SESSION['email'] ="";
      $_SESSION['tel']   ="";
  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="js/script.js" defer></script>
</head>
<body>
  <?php if ($mode == 'input') { ?>    
    <div class="container">
        <header>●●見積もり</header>
        <div class="progress-bar">
            <div class="step">
                <p>都道府県</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>間取り</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>希望日</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>買取見積</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>基本情報</p>
                <div class="bullet">
                    <span>５</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>

        </div>
        <div class="form-outer">
        <form action="#" method="post" >
                <div class="page slidepage">
                    <div class="title" style="line-height: 1.4;">都道府県を<br>
                    選択して下さい</div>
                    <div class="field">
                    <select name="todouhuken">
                        <?php foreach ($kind as $i => $v) { ?>
                            <?php if ($_SESSION['todouhuken'] == $i) { ?>
                                <option value="<?php echo $i ?>"><?php echo $v ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $i ?>"><?php echo $v ?></option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="field nextBtn">
                        <button type="button" class="firstButton">次へ</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">間取り</div>
                    <div class="field">
                        <select name="madori">
                            <option value="1K">１K</option>
                            <option value="1LDK">１LDK</option>
                            <option value="2LDK">２LDK</option>
                            <option value="3LDK">３DLK</option>
                            <option value="それ以外">それ以外</option>
                            <option value="分からない">分からない</option>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev" type="button">戻る</button>
                        <button class="next-1 next" type="button">次へ</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title">希望日</div>
                    <div class="field">
                        <select name="kiboubi">
                            <option value="最速">最速</option>
                            <option value="１ヶ月以内">１ヶ月以内</option>
                            <option value="３ヶ月以内">３ヶ月以内</option>
                            <option value="半年以内">半年以内</option>
                            <option value="分からない">分からない</option>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev"type="button">戻る</button>
                        <button class="next-2 next" type="button">あと2つ</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">買い取り見積もり</div>
                    <div class="field">
                        <select name="mitumori">
                            <option value="希望">希望</option>
                            <option value="希望しない">希望しない</option>
                            <option value="分からない">分からない</option>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev"type="button">戻る</button>
                        <button class="next-3 next" type="button">最後です</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">基本情報</div>
                    <div class="field">
                        <div class="label">お名前</div>
                        <input type="text"class="last-main last" name="namae" value="">
                    </div>
                    <div class="field">
                        <div class="label">メールアドレス</div>
                        <input type="email" placeholder="example@example" class="last-main last"  name="email" value="" >
                    </div>
                    <div class="field">
                        <div class="label">電話番号</div>
                        <input type="tel"  placeholder="000-0000-0000" pattern="\d{1,5}-\d{1,4}-\d{4,5}" class="last" name="tel" value=""> 
                    </div>
                    <div class="field btns" style="display: flex;">
                        <button class="prev-4 prev" type="button">戻る</button>
                        <input type="submit" class="submit smtBtn"  name="confirm" value="確認へ" style="   
                    margin-top: -20px; 
                    height:50px; 
                    width: 35%;
                    border-color: #d43f8d;
                    background-color: rgb(212, 63, 141); 
                    color: #fff;
                    transform: translateX(-48px);">

                    </div>
                </div>
            </form>



<?php } elseif ($mode == 'confirm') { ?>
    <!-- 確認画面 -->
    <form action="#" method="post" class="container" style="text-align: left;">

    <h1 style="text-align: center; margin-bottom:30px; font-weight: bolder; font-size: 19px; ">＜入力内容をご確認下さい＞</h1>
                <p style="padding: 0 5px 5px; font-size: 17px;">都道府県</p>
                <p class="checklist"><?php echo $kind[$_SESSION['todouhuken']] ?></p><br><br>
                <p style="padding: 0 5px 5px; font-size: 17px;">間取り</p>
                <p class="checklist"><?php echo $_SESSION['madori']?></p> <br><br>
                <p style="padding: 0 5px 5px; font-size: 17px;">希望日</p>
                <p class="checklist"><?php echo $_SESSION['kiboubi']?></p> <br><br>
                <p style="padding: 0 5px 5px; font-size: 17px;">買い取り見積もり</p>
                <p class="checklist"><?php echo $_SESSION['mitumori']?></p> <br><br>
                <p style="padding: 0 5px 15px; font-size: 20px; font-weight: 700;">基本情報</p> 
                <p style="padding: 0 5px 5px; font-size: 17px;">お名前</p> 
                <p class="checklist"><?php echo $_SESSION['namae']?></p> <br><br>
                <p style="padding: 0 5px 5px; font-size: 17px;">メールアドレス</p> 
                <p class="checklist"><?php echo $_SESSION['email']?></p> <br><br>
                <p style="padding: 0 5px 5px; font-size: 17px;">電話番号</p> 
                <p class="checklist"><?php echo $_SESSION['tel']?></p> <br><br>
 
                <input type="submit" name="back" value="戻る" class="checklistBtn">
                <input type="submit" name="send" value="送信" class="checklistBtn">
            </form>
  <?php } else { ?>
    <!-- 完了画面 -->
    <p style="font-weight: bolder; font-size: 20px;  line-height: 1.5;">
    送信しました。<br>
    お問い合わせありがとうございます。
    </p>
  <?php } ?>
</body>
</html>


