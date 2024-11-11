window.onload = function () {
  // slide content
  const topSlider = document.querySelector(".top_slider .slide_content");
  const slideWidth = topSlider.clientWidth;
  console.log(topSlider.clientWidth);
  topSlider.style.width = slideWidth;
  let keyframes = [
    // {transform: "translate(-1200px, 0)"}
    { transform: `translate(${-slideWidth}px, 0)` },
  ];
  let options = {
    // delay: 1000,
    duration: slideWidth * 5,
    easing: "ease-in",
    iterations: Infinity,
    // fill: "forwards"
  };
  topSlider.animate(keyframes, options);

  // gnb 메뉴
  function gnb() {
    let m = document.querySelectorAll(".gnb .main_list");
    let d = document.querySelectorAll(".gnb .dep02");
    m.forEach((e) => {
      e.addEventListener("mouseover", function () {
        d.forEach((el) => {
          el.classList.remove("on");
        });
        this.children[0].classList.add("line");
        this.children[1].classList.add("on");
      });
      e.addEventListener("mouseleave", function () {
        this.children[0].classList.remove("line");
        this.children[1].classList.remove("on");
      });
    });
  }
  gnb();

  // gnb_mo
  function gnbMo() {
    const menuBtn = document.querySelector(".menu_btn");
    const gnbMo = document.querySelector(".gnb_mo");
    menuBtn.addEventListener("click", function () {
      gnbMo.classList.toggle("on");
    });

    const menuCloseBtn = document.querySelector(".menu_close");
    menuCloseBtn.addEventListener("click", function () {
      gnbMo.classList.remove("on");
    });

    let m = document.querySelectorAll(".gnb_mo .main_list > a");
    let d = document.querySelectorAll(".gnb_mo .dep02_box > p");
    m.forEach((e) => {
      // console.log(e);
      e.addEventListener('click', function () {
        // console.log(this.nextElementSibling);
        this.nextElementSibling.classList.toggle('on');
      })
    })
    d.forEach((e) => {
      // console.log(e);
      e.addEventListener('click', function () {
        console.log(this);
        this.nextElementSibling.classList.toggle('on');
      })
    })
  }

  gnbMo();
  // const dep01

  // 메인슬라이더
  var swiper = new Swiper(".mySwiper", {
    effect: "cards",
    grabCursor: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    scrollbar: {
      el: ".swiper-scrollbar",
    },
  });
  var swiper2 = new Swiper(".mySwiper2", {
    effect: "cube",
    grabCursor: true,
    cubeEffect: {
      shadow: true,
      slideShadows: true,
      shadowOffset: 20,
      shadowScale: 0.94,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    // thumbs: {
    //   swiper: swiper,
    // },
  });
  swiper.controller.control = swiper2;
  swiper2.controller.control = swiper;

  // Intersection Observer 생성 시작
  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        entry.target.classList.toggle("fade-in", entry.isIntersecting);
        // if (entry.isIntersecting) {
        //   // 화면에 들어옴
        //   entry.target.classList.add("fade-in");
        // } else {
        //   // 화면에서 나감
        //   entry.target.classList.remove("fade-in");
        // }
      });
    },
    // 화면에서 해당 요소가 10% 이상 보일 경우 화면에 들어온 것으로 판단함
    { threshold: 0.1 }
  );
  // 관찰 대상 설정
  const targetElements = document.querySelectorAll(".fade-wrap");
  targetElements.forEach((element) => {
    observer.observe(element);
  });
  // Intersection Observer 생성 끝

  // top 버튼
  const scrollBtn = document.querySelector(".top_btn");
  const scrollWindow = function () {
    if (window.scrollY != 0) {
      setTimeout(function () {
        // window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
        window.scrollTo(0, window.scrollY - 50);
        scrollWindow();
      }, 10);
    }
  };
  scrollBtn.addEventListener("click", scrollWindow);

  // setting 설정 버튼
  const setBtn = document.querySelector(".setting_btn");
  const btnContent = document.querySelector(".btn_content");
  // 버튼 클릭시 보이기/숨기기
  setBtn.addEventListener("click", function (e) {
    // 버튼 클릭시 이벤트 전파 막기
    e.stopPropagation();
    btnContent.classList.toggle("on");
    setBtn.classList.toggle("on");
  });
  // 영역 클릭시 사라지지 않게
  btnContent.addEventListener("click", function (e) {
    e.stopPropagation();
  });
  // 다른 영역 클릭시 설정영역 닫기
  function handleClcikOutside(event) {
    // console.log(event.target);
    if (!setBtn.contains(event.target) && event.target !== setBtn) {
      btnContent.classList.remove("on");
      setBtn.classList.remove("on");
    }
  }
  document.addEventListener("click", handleClcikOutside);

  // dark 모드
  // function darkMode() {
  //   const darkBtn = document.querySelector(".dark_mode");
  //   const lightBtn = document.querySelector(".light_mode");
  //   darkBtn.addEventListener("click", function () {
  //     let data = document.querySelector("[data-dark]");
  //     data.dataset.dark = "true";
  //     localStorage.setItem("dataDark", 'true');
  //   });
  //   lightBtn.addEventListener("click", function () {
  //     let data = document.querySelector("[data-dark]");
  //     data.dataset.dark = "false";
  //     localStorage.setItem("dataDark", 'false');
  //   });
  // }

  // 화면모드;
  const darkBtn = document.querySelector(".dark_mode");
  const lightBtn = document.querySelector(".light_mode");
  const userTheme = localStorage.getItem("theme");

  darkBtn.addEventListener("click", function () {
    clickDarkMode();
    lightBtn.classList.remove("on");
    this.classList.add("on");
  });
  lightBtn.addEventListener("click", function () {
    clickLightMode();
    darkBtn.classList.remove("on");
    this.classList.add("on");
  });
  function clickDarkMode() {
    localStorage.setItem("theme", "dark");
    document.documentElement.setAttribute("data-dark", "true");
  }
  function clickLightMode() {
    localStorage.setItem("theme", "light");
    document.documentElement.setAttribute("data-dark", "false");
  }

  // 화면모드 유지
  if (userTheme === "dark") {
    clickDarkMode();
    lightBtn.classList.remove("on");
    darkBtn.classList.add("on");
  } else if (userTheme === "light") {
    clickLightMode();
    darkBtn.classList.remove("on");
    lightBtn.classList.add("on");
  }

  // close 버튼
  const closeBtn = document.querySelector(".close_btn");
  closeBtn.addEventListener("click", function () {
    btnContent.classList.remove("on");
    setBtn.classList.remove("on");
  });

  // 타이핑 효과
  // const content = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
  // const text = document.querySelector(".typing01 p");
  // let x = 0;

  // function typing01() {
  //   if (i < content.length) {
  //     let txt = content.charAt(x);
  //     text.innerHTML += txt;
  //     x++;
  //   }
  // }
  // setInterval(typing01, 100);

  // 타이핑 효과/지우는 효과 전체
  const text = document.querySelector(".typing .text");
  // 글자 모음
  const letters = ["HTML", "CSS", "JavaScript"];
  // 글자 입력 속도
  const speed = 100;
  let i = 0;
  // 타이핑 효과
  const typing = async () => {
    const letter = letters[i].split("");

    while (letter.length) {
      await wait(speed);
      text.innerHTML += letter.shift();
    }
    // 잠시 대기
    await wait(800);
    // 지우는 효과
    remove();
  };
  // 글자 지우는 효과
  const remove = async () => {
    const letter = letters[i].split("");

    while (letter.length) {
      await wait(speed);

      letter.pop();
      text.innerHTML = letter.join("");
    }
    // 다음 순서의 글자로 지정, 타이핑 함수 다시 실행
    i = !letters[i + 1] ? 0 : i + 1;
    typing();
  };
  // 딜레이 기능 ( 마이크로초 )
  function wait(ms) {
    return new Promise((res) => setTimeout(res, ms));
  }
  // 초기 실행
  setTimeout(typing, 1500);

  // 커서 효과
  const cursor = document.querySelector(".cursor");
  const cursor_area = document.querySelector(".cursor_area");
  // console.log(cursor);
  // cursor.each(function () {
  if (cursor.classList.contains("cursor_hover")) {
    cursor_area.addEventListener("mousemove", function (e) {
      // console.log(e);
      // console.log(this);
      // this.classList.add("show");
      var x = e.clientX; //x축값
      var y = e.clientY; //y축값
      cursor.style.cssText = "left:" + x + "px;" + "top:" + y + "px;"; //위치를 style로 적용한다.
    });
  }
  // });

  const clickEvent = (function() {
    if ('ontouchstart' in document.documentElement === true) {
      return 'touchstart';
    } else {
      return 'click';
    }
  })();
  // 팝업 close
  // const popupCloseBtn = document.querySelectorAll(".popup_close_btn");
  // const popupWrap = document.querySelector(".popup_wrap");
  // popupWrap.classList.add("popup_show");
  // popupCloseBtn.forEach(function (item) {
  //   item.addEventListener(clickEvent, function () {
  //     popupWrap.classList.toggle("popup_show");
  //   });
  // });

  // 오늘 하루 보지 않기
  // 로컬 스토리지에서 팝업창 닫힌 시간 정보를 가져옴
  // const popupCloseTime = localStorage.getItem("popupCloseTime");
  // 팝업창 닫힌 시간 정보가 없거나 현재 시간보다 이전이라면 팝업창을 열음
  // if (!popupCloseTime || new Date(popupCloseTime) < new Date()) {
  //   popupWrap.classList.add("popup_show");
  // } else {
  //   popupWrap.classList.remove("popup_show");
  // }
  // const dayCloseBtn = document.querySelector(".day_close");
  // dayCloseBtn.addEventListener(clickEvent, function () {
  //   var now = new Date();
  //   now.setDate(now.getDate() + 1); // 현재 날짜에서 하루를 더함
  //   // 다음 팝업이 열리는 시간을 로컬 스토리지에 저장
  //   localStorage.setItem("popupCloseTime", now);
  // });
};
