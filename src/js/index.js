import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

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
  .to(".second-section", { autoAlpha: 1, duration: 0.8 })
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

const separateTargets = document.querySelectorAll(".separate-character h2");

separateTargets.forEach((characters) => {
  const span = characters.querySelector("span");
  if (!span) return;

  const texts = span.textContent;
  let newText = "";

  for (let i = 0; i < texts.length; i++) {
    newText += `<span>${texts[i]}</span>`;
  }

  span.innerHTML = newText;
});
