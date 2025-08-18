import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import gsap from "gsap";

const tl = gsap.timeline({ repeat: -1 });
const images = gsap.utils.toArray(".mv-slide");
const length = images.length;
images.reverse();
images.forEach((image, index) => {
  const count = index == length - 1 ? 0 : index + 1;
  tl.to(image, {
    maskImage: `linear-gradient(
      225deg,
      #000 0%,
      #000 0%,
      transparent 0%,
      transparent 0%`,
    duration: 0.8,
    delay: 5,
    onStart: () => {
      if (index == length - 1) {
        images[index].classList.remove("next-slide");
        images[0].classList.add("next-slide");
        images[index].classList.add("current-slide");
        images[index - 1].classList.remove("current-slide");
      } else if (index == 0) {
        images[index + 1].classList.add("next-slide");
        images[index].classList.remove("next-slide");
        images[index].classList.add("current-slide");
        images[length - 1].classList.remove("current-slide");
      } else {
        images[index].classList.remove("next-slide");
        images[index].classList.add("current-slide");
        images[index + 1].classList.add("next-slide");
        images[index - 1].classList.remove("current-slide");
      }
    },
    onComplete: () => {
      if (index == length - 1) {
        images[index].classList.remove("current-slide");
        images[0].classList.remove("next-slide");
      }
    },
  }).to(
    images[count],
    {
      scale: 1.1,
      duration: 0.8,
    },
    "<"
  );
});

// $(".mv-slider")
//   // 最初のスライドに"add-animation"のclassを付ける(data-slick-index="0"が最初のスライドを指す)
//   .on("init", function () {
//     $('.slick-slide[data-slick-index="0"]').addClass("add-animation");
//   })
//   // 通常のオプション
//   .slick({
//     autoplay: true, // 自動再生ON
//     fade: true, // フェードON
//     arrows: false, // 矢印OFF
//     speed: 2000, // スライド、フェードアニメーションの速度2000ミリ秒
//     autoplaySpeed: 4000, // 自動再生速度4000ミリ秒
//     pauseOnFocus: false, // フォーカスで一時停止OFF
//     pauseOnHover: false, // マウスホバーで一時停止OFF
//   })
//   .on({
//     // スライドが移動する前に発生するイベント
//     beforeChange: function (event, slick, currentSlide, nextSlide) {
//       // 表示されているスライドに"add-animation"のclassをつける
//       $(".slick-slide", this).eq(nextSlide).addClass("slick-next");
//       // あとで"add-animation"のclassを消すための"remove-animation"classを付ける
//       $(".slick-slide", this).eq(currentSlide).addClass("slick-next");
//     },
//     // スライドが移動した後に発生するイベント
//     afterChange: function () {
//       // 表示していないスライドはアニメーションのclassを外す
//       $(".slick-next", this).removeClass("slick-next");
//     },
//   });
