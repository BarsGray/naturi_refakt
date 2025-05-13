//Here we right custom js. It depend on all site
$(document).ready(function(){
    //form validation
    form_validation('.form_name', '.form_email', '.form_phone');
    function form_validation(formName, formEmail, formPhone){
        const name = document.querySelectorAll(formName);
        const email = document.querySelectorAll(formEmail);
        const phone = document.querySelectorAll(formPhone) ;
        const items = [...name, ...email, ...phone];
        const errorMsg = document.createElement('div');
        errorMsg.className = 'erorr-form-alert';
        items.forEach((item)=>{
            item.addEventListener('input', function (){
                if(item.classList.contains(formEmail.substring(1))){
                    let regEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
                    let submit = item.closest('form').querySelector('input[type$="submit"]');
                    regEmail.test(item.value) ?
                        setTimeout(() => {errorMsg.remove(); submit.removeAttribute('disabled')}, 1000) :
                        errorMsg.innerHTML = 'Введите пожалуйста корректный email';
                        item.after(errorMsg);
                        submit.setAttribute('disabled', '');
                } else
                if(item.classList.contains(formPhone.substring(1))){
                    let regPhone = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
                    let submit = item.closest('form').querySelector('input[type$="submit"]');
                    regPhone.test(item.value) ?
                        setTimeout(() => {errorMsg.remove(); submit.removeAttribute('disabled')}, 1000) :
                        errorMsg.innerHTML = 'Введите пожалуйста корректный номер телефона';
                    item.after(errorMsg);
                    submit.setAttribute('disabled', '');
                } else
                if(item.classList.contains(formName.substring(1))){
                    let regName =  /^[a-zA-Zа-яА-Я]+$/;
                    let submit = item.closest('form').querySelector('input[type$="submit"]');
                    regName.test(item.value) ?
                        setTimeout(() => {errorMsg.remove(); submit.removeAttribute('disabled')}, 1000) :
                        errorMsg.innerHTML = 'Имя не может содержать цифры';
                    item.after(errorMsg);
                    submit.setAttribute('disabled', '');
                } else {
                    return;
                }
            });
        });
    }
    //search result counter
    function postsCounter(){
        let counter = document.querySelector('#search__result_counter');
        counter.innerHTML = document.querySelectorAll('.search__result-title').length;
    }
    postsCounter();
    //pleer();
//making the apply buttom style  
// let filterOptions = $('li.option');
// let applyBtn = document.querySelector('.projects-filter__bottom').children[1];
// let val = applyBtn.classList;
//
//
// filterOptions.on('click',function(e){
//        $('div.projects-filter__apply.filter-link-three').addClass('new_filter_btn');
//        applyBtn.removeClass('.projects-filter__apply');
//   });
// let filterRadio = $('div.projects-filter__floor');
//   filterRadio.on('click',function(e){
//        $('div.projects-filter__apply.filter-link-three').addClass('new_filter_btn');
//   });


    
//редирект на 404
// function wrongUrl(currentLocation = window.location.pathname) {
//     console.log(window.location.pathname);
//     if(currentLocation in ['ABOUT']){
//         window.location.replace('naturi.su/404');
//     }
// }

//wrongUrl(window.location.pathname);
//прописываем автоплей с проверкой бездействия пользователя
// function pleer(){
//     let firstRole = $('body').on('click');
// 	let secondRole = $('body').on('mousewheel');
// 	if ((firstRole !== true) || (secondRole !== true)) {
// 		 setInterval (function(){
// 			 $('#my_addv_video').show(600);
// 		 },42);//90000);
// 		 $('#my_addv_pleer')[0].play();
// 	 }
// };
// $('#my_addv_video').on('click',function(event){
// 	$('#my_addv_video').hide();
// });
// $('#my_addv_video').on('mousewheel',function(event){
// 	$('#my_addv_video').hide();
// });
// $('#my_addv_video').mousemove(function(event){
// 	$('#my_addv_video').hide();
// });
// ('#btn_main_video_play').on('click', function(event){
//      $('#video')[0].play();
//  });
// $('#btn_main_video_play').on('click', function(event){
//      $('#video')[0].pause();
//  });
 
});