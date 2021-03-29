const slidePage = document.querySelector(".slidepage");
const NextBtn = document.querySelector(".nextBtn"); 
const prevBtnSec = document.querySelector(".prev-1"); 
const nextBtnSec = document.querySelector(".next-1"); 
const prevBtnThird = document.querySelector(".prev-2"); 
const nextBtnThird = document.querySelector(".next-2"); 
const prevBtnFourth = document.querySelector(".prev-3"); 
const nextBtnFourth = document.querySelector(".next-3"); 
const prevBtnFive = document.querySelector(".prev-4"); 
const submitBtn = document.querySelector(".submit"); 
const progressText = document.querySelectorAll(".step p"); 
const progressCheck = document.querySelectorAll(".step .check"); 
const bullet = document.querySelectorAll(".step .bullet");
let max = 4;
let current = 1; 

NextBtn.addEventListener("click",function(){
    slidePage.style.marginLeft = "-27.5%";
    bullet[current -1].classList.add("active");
    progressText[current -1].classList.add("active");
    progressCheck[current -1].classList.add("active");
    current += 1;
});
nextBtnSec.addEventListener("click",function(){
    slidePage.style.marginLeft = "-52.5%";
    bullet[current -1].classList.add("active");
    progressText[current -1].classList.add("active");
    progressCheck[current -1].classList.add("active");
    current += 1;
});
nextBtnThird.addEventListener("click",function(){
    slidePage.style.marginLeft = "-77.5%";
    bullet[current -1].classList.add("active");
    progressText[current -1].classList.add("active");
    progressCheck[current -1].classList.add("active");
    current += 1;
});
nextBtnFourth.addEventListener("click",function(){
    slidePage.style.marginLeft = "-102.5%";
    bullet[current -1].classList.add("active");
    progressText[current -1].classList.add("active");
    progressCheck[current -1].classList.add("active");
    current += 1;
});
submitBtn.addEventListener("click",function(){
    bullet[current -1].classList.add("active");
    progressText[current -1].classList.add("active");
    progressCheck[current -1].classList.add("active");
    current += 1;
    setTimeout(function(){
        alert("入力に誤りがあります！再度ご入力下さい。")
        location.reload();
    },800)
});

prevBtnSec.addEventListener("click",function(){
    slidePage.style.marginLeft = "0%";
    bullet[current -2].classList.remove("active");
    progressText[current -2].classList.remove("active");
    progressCheck[current -2].classList.remove("active");
    current -= 1;
});
prevBtnThird.addEventListener("click",function(){
    slidePage.style.marginLeft = "-27.5%";
    bullet[current -2].classList.remove("active");
    progressText[current -2].classList.remove("active");
    progressCheck[current -2].classList.remove("active");
    current -= 1;
});
prevBtnFourth.addEventListener("click",function(){
    slidePage.style.marginLeft = "-52.5%";
    bullet[current -2].classList.remove("active");
    progressText[current -2].classList.remove("active");
    progressCheck[current -2].classList.remove("active");
    current -= 1;
});
prevBtnFive.addEventListener("click",function(){
    slidePage.style.marginLeft = "-77.5%";
    bullet[current -2].classList.remove("active");
    progressText[current -2].classList.remove("active");
    progressCheck[current -2].classList.remove("active");
    current -= 1;
});



$(function() {
    //始めにjQueryで送信ボタンを無効化する
    $('.submit').prop("disabled", true);
    $('.submit').css("opacity", .5);
 
    //入力欄の操作時
    $('.last').keyup(function () {
        //必須項目が空かどうかフラグ
        let flag = true;
        //必須項目をひとつずつチェック
        $('.last').each(function(e) {
            //もし必須項目が空なら
            if ($('.last').eq(e).val() === "") {
                flag = false;
            }
        });
        //全て埋まっていたら
        if (flag) {
            //送信ボタンを復活
            $('.submit').prop("disabled", false);
            $('.submit').css("opacity", 1);

        }
        else {
            //送信ボタンを閉じる
            $('.submit').prop("disabled", true);
            $('.submit').css("opacity", .5);

        }
    });
});
