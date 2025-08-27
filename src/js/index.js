import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

if (document.querySelector(".top-page")) {
  // メインビジュアルのスクロールアニメーション
  gsap
    .timeline({
      scrollTrigger: {
        trigger: ".mv",
        scrub: 3,
        start: "top+=10% top",
        end: "center center",
      },
    })
    .to(".mv-shade div", { autoAlpha: 0, duration: 0.8 })
    .to(".second-section", {
      autoAlpha: 1,
      duration: 0.8,
      ease: "power2.out",
      delay: 0.2,
      onStart: () => {
        textWaveAndUpMv("#second-section .separate-character h2");
      },
    })
    .to(".mv-shade", { backdropFilter: "blur(10px)", duration: 0.8 }, "<");

  // サービスセクションへの自動スクロール
  ScrollTrigger.create({
    trigger: "#service",
    start: "top-=50% bottom",
    onEnter: () => {
      gsap.to(window, {
        scrollTo: "#service",
        duration: 2,
        ease: "power4.inOut",

        onComplete: () => {
          gsap.to("#second-section", {
            opacity: 0,
            duration: 0.8,
          });
        },
      });
    },
    onLeaveBack: () => {
      gsap.to("#second-section", {
        opacity: 1,
        duration: 0.8,
      });
    },
  });

  function handleSlick() {
    const $slider = $(".service-image-warap");
    if (window.innerWidth <= 768) {
      if (!$slider.hasClass("slick-initialized")) {
        $slider.slick({
          fade: true,
          autoplay: true,
          autoplaySpeed: 3000,
          pauseOnHover: false,
          pauseOnFocus: false,
          arrows: false,
          speed: 800,
        });
      }
    } else {
      if ($slider.hasClass("slick-initialized")) {
        $slider.slick("unslick");
      }
    }
  }

  window.addEventListener("DOMContentLoaded", handleSlick);
  window.addEventListener("resize", handleSlick);

  // サービスリストのホバー連動
  const services = gsap.utils.toArray(".service-contents li");
  services.forEach((service) => {
    service.addEventListener("mouseover", () => {
      if (!service.classList.contains("active")) {
        document
          .querySelector(".service-wrap .img img.active")
          ?.classList.remove("active");
        document
          .querySelector(`.${service.className}-img`)
          ?.classList.add("active");
        services.forEach((content) => content.classList.remove("active"));
        service.classList.add("active");
      }
    });
  });

  $(".case-list").slick({
    autoplay: true,
    arrows: false,
    slidesToShow: 3,
    centerMode: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          centerMode: false,
        },
      },
    ],
  });

  function textWaveAndUp(target) {
    const separateTargets = document.querySelectorAll(target);

    separateTargets.forEach((characters) => {
      const span = characters.querySelector("span");
      if (!span) return;

      const texts = span.textContent;
      let newText = "";

      for (let i = 0; i < texts.length; i++) {
        newText += `<span>${texts[i]}</span>`;
      }

      span.innerHTML = newText;

      // 分割した文字要素を取得
      const characterSpans = span.querySelectorAll("span");

      // ScrollTriggerでアニメーション実行
      ScrollTrigger.create({
        trigger: characters,
        start: "top bottom",
        onEnter: () => {
          gsap.to(characterSpans, {
            top: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.03,
            ease: "power2.out",
          });
        },
      });
    });
  }

  function textWaveAndUpMv(target) {
    const separateTargets = document.querySelectorAll(target);

    separateTargets.forEach((characters) => {
      const span = characters.querySelector("span");
      if (!span) return;

      const texts = span.textContent;
      let newText = "";

      for (let i = 0; i < texts.length; i++) {
        newText += `<span>${texts[i]}</span>`;
      }

      span.innerHTML = newText;

      // 分割した文字要素を取得
      const characterSpans = span.querySelectorAll("span");

      // ScrollTriggerでアニメーション実行
      ScrollTrigger.create({
        trigger: characters,
        start: "top bottom",
        onEnter: () => {
          gsap.to(characterSpans, {
            top: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.03,
            ease: "power4.out",
          });
        },
      });
    });
  }

  const sectionArray = [
    ".service-wrap",
    ".case-wrap",
    ".recruit-wrap",
    ".news-wrap",
    ".contact-wrap",
    ".footer-wrap",
  ];

  sectionArray.forEach((section) => {
    const pageScroll = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top bottom-=200px",
      },
    });
    pageScroll.fromTo(
      section,
      { autoAlpha: 0 },
      {
        autoAlpha: 1,
        duration: 0.8,
        ease: "power2.out",
        delay: 0.2,
        onStart: () => {
          textWaveAndUp(`${section} .separate-character-title h2`);
        },
      }
    );
  });
}
const isUnderPage = document.querySelector(".under-page");

if (isUnderPage) {
  const contents = document.querySelectorAll(".fade-up");

  contents.forEach((content) => {
    const timeline = gsap.timeline({
      scrollTrigger: {
        trigger: content,
        start: "top bottom-=200px",
      },
    });
    timeline.to(content, {
      autoAlpha: 1,
      duration: 0.8,
      ease: "power2.out",
      delay: 0.2,
    });
  });

  const sectionArray = [".contact-wrap", ".footer-wrap"];

  sectionArray.forEach((section) => {
    const pageScroll = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top bottom-=200px",
      },
    });
    pageScroll.fromTo(
      section,
      { autoAlpha: 0 },
      {
        autoAlpha: 1,
        duration: 0.8,
        ease: "power2.out",
        delay: 0.2,
        onStart: () => {
          textWaveAndUp(`${section} .separate-character-title h2`);
        },
      }
    );
  });

  const charts = document.querySelectorAll(".chart-list svg");
  if (charts) {
    charts.forEach((chart) => {
      const rect = chart.querySelectorAll("rect");
      ScrollTrigger.create({
        trigger: chart,
        start: "top bottom-=200px",
        onEnter: () => {
          gsap.to(rect, {
            transform: "matrix(1, 0, 0, 1, 0, 0)",
            duration: 0.8,
            stagger: 0.03,
            ease: "power2.out",
          });
        },
      });
    });
  }

  const graphs = document.querySelectorAll(".circle");

  if (graphs) {
    graphs.forEach((graph) => {
      const spans = graph.querySelectorAll("span");
      if (!spans) return;

      spans.forEach((span) => {
        const texts = span.textContent;
        let newText = "";

        for (let i = 0; i < texts.length; i++) {
          newText += `<span>${texts[i]}</span>`;
        }

        span.innerHTML = newText;

        // 分割した文字要素を取得
        const characterSpans = span.querySelectorAll("span");

        // ScrollTriggerでアニメーション実行
        ScrollTrigger.create({
          trigger: span,
          start: "top bottom",
          onEnter: () => {
            gsap.to(characterSpans, {
              top: 0,
              opacity: 1,
              duration: 0.8,
              stagger: 0.03,
              ease: "power4.out",
            });
          },
        });
      });
    });
  }

  const jobs = document.querySelectorAll(".job-content");

  if (jobs) {
    jobs.forEach((job) => {
      ScrollTrigger.create({
        trigger: job,
        start: "top bottom-=200px",
        onEnter: () => {
          gsap.to(job, {
            clipPath: "inset(0% 0% 0% 0%)",
            duration: 0.8,
            ease: "power2.out",
          });
        },
      });
    });
  }
}
