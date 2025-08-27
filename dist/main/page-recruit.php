<?= get_header(); ?>
<main>
  <section>
    <div class="sv recruit">
      <div>
        <h1>
          Recruit
        </h1>
        <p>採用情報</p>
      </div>
    </div>
  </section>
  <section class="recruit-page-contents graph">
    <div class="recruit-page-content graph fade-up">
      <div class="text-wrap">
        <h2>帝設備で働くことの強み</h2>
        <p>
          業績好調につき、経験や年齢を問わず幅広い人材を募集しています。<br>
          建築設備・水道・土木工事の技術者、配管作業員、事務スタッフ、営業スタッフ<br>
          など、さまざまな職種で活躍のチャンスがあります。<br>
          働きやすさと成長を支える環境が整っているのは、<br>
          帝設備ならではの魅力です。
        </p>
      </div>
      <div class="graph-wrap">
        <div class="circle">
          <div>
            <p class="title">当社の施工実績数</p><br>
            <p class="numbers"><span class="number-target">00,000</span><span class="unit">件</span></p>
          </div>
        </div>
        <div class="circle">
          <div>
            <p class="title">1級管工事施工管理技士<br>平均年収</p>
            <p class="numbers"><span class="number-target">000</span><span class="unit">万円以上</span></p>
          </div>
        </div>
        <div class="circle">
          <div>
            <p class="title">年間休日</p><br>
            <p class="numbers"><span class="number-target">000</span><span class="unit">日以上</span></p>
          </div>
        </div>
        <div class="circle">
          <div>
            <p class="title">公共工事の受注割合</p><br>
            <p class="numbers"><span class="number-target">00</span><span class="unit">％</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="recruit-page-contents jobs">
    <div class="recruit-page-content jobs fade-up">
      <div class="job-content-wrap">
        <div class="job-content">
          <div class="title">
            <h3>建築設備・水道・土木工事技術者</h3>
          </div>
          <div class="img">
            <img src="<?= get_template_directory_uri(); ?>/img/recruit/job01.png">
          </div>
          <div class="text">
            <p>
              公共施設や民間建物の給排水・空調・水道工事における施工管理を担当。現場で資材・人員の手配、作業指示、図面作成、検査対応などを行います。
            </p>
          </div>
        </div>
        <div class="job-content">
          <div class="title">
            <h3>配管作業員</h3>
          </div>
          <div class="img">
            <img src="<?= get_template_directory_uri(); ?>/img/recruit/job02.png">
          </div>
          <div class="text">
            <p>
              ビルや学校、保育園、介護施設などでの給排水・空調設備、水道工事の配管作業を行います。図面をもとに配管の取り付けや調整を行い、建物のインフラを支える重要な仕事です。
            </p>
          </div>
        </div>
        <div class="job-content">
          <div class="title">
            <h3>事務・営業職員</h3>
          </div>
          <div class="img">
            <img src="<?= get_template_directory_uri(); ?>/img/recruit/job03.png">
          </div>
          <div class="text">
            <p>
              給排水・空調換気設備工事に関する事務・営業サポートを担当します。書類作成やスケジュール管理、取引先との調整などを行い、現場とお客様をつなぐ役割です。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contact">
    <div class="contact-shade">
      <div class="contact-wrap">
        <div class="title-wrap">
          <div class="section-title contact separate-character-title">
            <h2><span>Contact</span></h2>
            <h2 class="small"><span>お問い合わせ</span></h2>
          </div>
          <div class="text">
            <p>
              これまで培った技術力と現場対応力を活かし、<br>
              行政・法人の皆様のニーズに的確かつ柔軟にお応えいたします。<br>
              どうぞお気軽にお問い合わせください。
            </p>
          </div>
          <div class="img-wrap tb">
            <img src="<?= get_template_directory_uri(); ?>/img/global/contact.png">
          </div>
          <div>
            <a class="link-btn" href="<?= get_home_url(); ?>/news"><span>お問い合わせはこちら</span></a>
          </div>
        </div>
        <div class="img-wrap pc-tb">
          <img src="<?= get_template_directory_uri(); ?>/img/global/contact.png">
        </div>
      </div>
    </div>
    </div>
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