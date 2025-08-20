import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/all";
gsap.registerPlugin(ScrollTrigger);
const tl = gsap.timeline({ repeat: -1 });
const images = gsap.utils.toArray(".mv-slide");
const length = images.length;

// 最初のスライドに初期クラスを設定
images[0].classList.add("current-slide");
images[1].classList.add("next-slide");
images[length - 1].classList.add("prev-slide");

images.forEach((image, index) => {
  const count = index === length - 1 ? 0 : index + 1;
  tl.to(image, {
    maskImage: `linear-gradient(
      225deg,
      #000 0%,
      #000 0%,
      transparent 0%,
      transparent 0%`,
    duration: 0.8,
    delay: 5, // 最初のスライドは遅延なし
    onStart: () => {
      // 現在のスライドをcurrent-slideに設定
      images.forEach((img, i) => {
        img.classList.remove("current-slide", "next-slide", "prev-slide");
      });

      image.classList.add("current-slide");

      // 次のスライドをnext-slideに設定
      const nextIndex = index === length - 1 ? 0 : index + 1;
      images[nextIndex].classList.add("next-slide");

      // 前のスライドをprev-slideに設定
      const prevIndex = index === 0 ? length - 1 : index - 1;
      images[prevIndex].classList.add("prev-slide");
    },
  });
  // .to(
  //   ".next-slide img",
  //   {
  //     scale: 1.05,
  //     duration: 0.8,
  //   },
  //   "<"
  // );
});

const mvTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: ".mv",
    scrub: 5,
    start: "top+=10% top",
    end: "center center",
    markers: true,
  },
});

mvTimeline
  .to(".mv-shade div", {
    autoAlpha: 0,
    duration: 0.8,
  })
  .to(".second-section", {
    autoAlpha: 1,
    duration: 0.8,
  })
  .to(
    ".mv-shade",
    {
      backdropFilter: "blur(10px)",
      duration: 0.8,
    },
    "<"
  );
