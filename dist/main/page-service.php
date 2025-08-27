<?= get_header(); ?>
<main class="under-page">
  <section>
    <div class="sv service">
      <div>
        <h1>
          Service
        </h1>
        <p>業務内容</p>
      </div>
    </div>
  </section>
  <section class="service-page-contents">
    <div class="service-page-content fade-up" id="01">
      <div class="service-page-content-wrap">
        <div class="title">
          <h2>
            <span class="number">01</span>
            <span>空調設備工事</span>
          </h2>
        </div>
        <div class="text">
          <p>
            ビル・住宅・公共施設などを対象に、空調・換気設備の設計・施工・保守を行っています。<br>
            快適な室内環境を実現するため、省エネ性や機能性にも配慮した高品質な空調システムを提供しています。
          </p>
        </div>
        <div class="img">
          <img src="<?= get_template_directory_uri(); ?>/img/service/service01.png">
        </div>
      </div>
    </div>
    <div class="service-page-content fade-up" id="02">
      <div class="service-page-content-wrap">
        <div class="title">
          <h2>
            <span class="number">02</span>
            <span>給排水設備工事</span>
          </h2>
        </div>
        <div class="text">
          <p>
            建物内外の給排水設備工事を手がけています。<br>
            新築や改修において、生活や業務に欠かせない水の供給と排水を安全かつ効率的に行うため、設計から施工・メンテナンスまで一貫して対応しています。
          </p>
        </div>
        <div class="img">
          <img src="<?= get_template_directory_uri(); ?>/img/service/service02.png">
        </div>
      </div>
    </div>
    <div class="service-page-content fade-up" id="03">
      <div class="service-page-content-wrap">
        <div class="title">
          <h2>
            <span class="number">03</span>
            <span>水道工事</span>
          </h2>
        </div>
        <div class="text">
          <p>
            公共施設や民間建物を対象に、水道本管の布設や引込工事、給水装置工事などを行っています。<br>
            安全で安定した水の供給を支えるため、地域インフラの整備・維持に貢献しています。
          </p>
        </div>
        <div class="img">
          <img src="<?= get_template_directory_uri(); ?>/img/service/service03.png">
        </div>
      </div>
    </div>
    <div class="service-page-content fade-up" id="04">
      <div class="service-page-content-wrap">
        <div class="title">
          <h2>
            <span class="number">04</span>
            <span>土木工事</span>
          </h2>
        </div>
        <div class="text">
          <p>
            道路・舗装・造成・上下水道などの土木工事を手がけています。<br>
            地域のインフラ整備や暮らしを支える基盤づくりを通じて、安全で快適なまちづくりに貢献しています。
          </p>
        </div>
        <div class="img">
          <img src="<?= get_template_directory_uri(); ?>/img/service/service04.png">
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