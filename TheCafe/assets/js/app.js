
let modal1 = document.getElementById("myModal1");
let modal2 = document.getElementById("myModal2");
let modal3 = document.getElementById("myModal3");

let img1 = document.getElementById("myImg1");
let modalImg1 = document.getElementById("img01");
let captionText1 = document.getElementById("caption1");

let img2 = document.getElementById("myImg2");
let modalImg2 = document.getElementById("img02");
let captionText2 = document.getElementById("caption2");

let img3 = document.getElementById("myImg3");
let modalImg3 = document.getElementById("img03");
let captionText3 = document.getElementById("caption3");

img1.onclick = function(){
    modal1.style.display = "block";
    modalImg1.src = this.src;
    captionText1.innerHTML = this.alt;
}
img2.onclick = function(){
    modal2.style.display = "block";
    modalImg2.src = this.src;
    captionText2.innerHTML = this.alt;
}
img3.onclick = function(){
    modal3.style.display = "block";
    modalImg3.src = this.src;
    captionText3.innerHTML = this.alt;
}


let span1 = document.getElementById("close-1");
let span2 = document.getElementById("close-2");
let span3 = document.getElementById("close-3");
console.log(span1);


span1.onclick = function() {
    modal1.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
span3.onclick = function() {
    modal3.style.display = "none";
}


function ESCclose(evt) {
    if (evt.keyCode == 27)
        window.close();
}





// <div className="card__item card__item--active" id="cardItem1">
//     <div className="card__inner card__inner--active" id="cardInner1">
//         <div className="card__img card__img--active" id="cardImg1"><img src="./assets/images/about/1.jpg" alt=""></div>
//         <div className="card__icon card__icon--active" id="cardIcon1"><i className="fa-solid fa-umbrella"></i></div>
//         <div className="card__text card__text--active" id="cardText1"> Lorem ipsum dolor sit amet, consectetur
//             adipisicing elit. Quod, non!
//         </div>
//     </div>
// </div>


/* login */
let loginBtn = document.querySelector('#loginClick');
loginBtn.addEventListener('click', ()=>{
    console.log('111')
});



    /* intro */

    let intro = document.querySelector('.intro');
    let innerBtn1 = document.querySelector('#inner_btn1');
    let innerBtn2 = document.querySelector('#inner_btn2');
    let innerBtn3 = document.querySelector('#inner_btn3');
    let innerBtn4 = document.querySelector('#inner_btn4');


    const imageUrls = [
        '/TheCafe/TheCafe/assets/images/intro2.jpg',
        '/TheCafe/TheCafe/assets/images/intro3.jpg',
        '/TheCafe/TheCafe/assets/images/intro4.jpg'
        ]
        
        //Кешируем картинки, чтобы не было мерцаний при первом использовании.
        const images = imageUrls.map(url => {
          const img = new Image()
          img.src = url
          return img
        });
        console.log(images);
        
        // с какого индекса начинаем перебор, index 0 уже установлен в CSS
        let index = 1;

        // setInterval(()=>{
        //     document.body.style.backgroundImage = `url(${images[index].src})`
        //     index = index >= images.length-1 ? 0 : index + 1
        //   }, 5000);
        
        // document.getElementById('inner_btn4').click();
        
        // setInterval(()=>{
        //     intro.style.backgroundImage = `url(${images[index].src})`
        //     index = index >= images.length-1 ? 0 : index + 1
        //   }, 5000);

        
            //   intro.style.background = 'url(./assets/images/intro1.jpg) center no-repeat';









innerBtn1.addEventListener('click', ()=>{
    innerBtn1.classList.remove('active');
    innerBtn2.classList.remove('active');
    innerBtn3.classList.remove('active');
    innerBtn4.classList.remove('active');
    innerBtn1.classList.add('active');
    intro.style.background = 'url(./assets/images/intro1.jpg) center no-repeat';
});

innerBtn2.addEventListener('click', ()=>{
    innerBtn1.classList.remove('active');
    innerBtn2.classList.remove('active');
    innerBtn3.classList.remove('active');
    innerBtn4.classList.remove('active');
    innerBtn2.classList.add('active');
    intro.style.background = 'url(./assets/images/intro2.jpg) center no-repeat';
});

innerBtn3.addEventListener('click', ()=>{
    innerBtn1.classList.remove('active');
    innerBtn2.classList.remove('active');
    innerBtn3.classList.remove('active');
    innerBtn4.classList.remove('active');
    innerBtn3.classList.add('active');
    intro.style.background = 'url(./assets/images/intro3.jpg) center no-repeat';
});

innerBtn4.addEventListener('click', ()=>{
    innerBtn1.classList.remove('active');
    innerBtn2.classList.remove('active');
    innerBtn3.classList.remove('active');
    innerBtn4.classList.remove('active');
    innerBtn4.classList.add('active');
    intro.style.background = 'url(./assets/images/intro4.jpg) center no-repeat';
});

// let coffeeCup = document.querySelector('.stat__count-coffee');
// function coffeeClicker(event) {
//     event.preventDefault();
//     let countClickBtn = coffeeCup.textContent;
//     coffeeCup.textContent = parseInt(countClickBtn) + 1;
// }

// coffeeCup.addEventListener ('click', coffeeClicker);





// проверка имени на ошибки ввода:
let fNameRes = ''; //результат ввода
let fName = document.querySelector('#fname'); // получаем поле для ввода имени
let fNameError = document.querySelector('#fname-p'); // получаем спан для вывода ошибки
let enableBtn = 0;

// let btnClick = document.querySelector('#btnClick');
// btnClick.setAttribute('disabled', true);

fName.addEventListener('focus', function() {
    fName.style.background = '#f0f0f0'; // выделяем поле ввода серым
    fName.style.fontWeight = '300'; // меняем стиль текста в поле ввода
});

fName.addEventListener('blur', function(){
    let value = fName.value; // значение поля ввода
    let res = /[^a-zа-яA-ZА-ЯёЁ0-9]+/g; // регулярные выражения для проверки поля ввода на валидность
    
    if(value.length === 0){ // если поле ввода пустое
        fNameError.textContent = '* Please, enter your first name.'; // выводим в спан текст
        fName.style.backgroundColor = 'transparent'; // снимаем выделение с поля
    }else if (value.match(/[0-9]/)){ // если пользователь вместе с буквами ввел число             
        fNameError.textContent = '* Your first name must not contain numbers'; // выводим в спан текст ошибки
        fName.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else if(value.length < 2){// если пользователь ввел менее 2 символов
        fNameError.textContent = '* Your first name must contain more than one character'; // выводим в спан текст ошибки
        fName.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else if(res.test(value)){ // выполняет поиск сопоставления регулярного выражения в указанной строке
        fNameError.textContent = '* Your first name must contain only letters'; // выводим в спан текст ошибки
        fName.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else{ // все проверки пройдены и данные введены верно
        fNameError.textContent = 'Correct first name.'; // подтверждаем правильность ввода имени
        fNameError.style.color = '#ccc'; // изменяем текст спана на нейтральный
        fName.style.backgroundColor = 'transparent'; // красим поле ввода в нейтральный 
        fName.style.fontWeight = '700'; // меняем стиль текста в поле ввода
        fNameRes = value; // присваиваем полученое значение
        enableBtn++;
        enableButton();
        console.log(fNameRes) // передаём полученое значение
    }
});

// проверка фамилии на ошибки ввода:
let lNameRes = ''; //результат ввода
let lName = document.querySelector('#lname'); // получаем поле для ввода
let lNameError = document.querySelector('#lname-p'); // получаем спан для вывода ошибки

lName.addEventListener('focus', function() {
    lName.style.background = '#f0f0f0'; // выделяем поле ввода серым
    lName.style.fontWeight = '300'; // меняем стиль текста в поле ввода
});

lName.addEventListener('blur', function(){
    let value = lName.value; // значение поля ввода
    let res = /[^a-zа-яA-ZА-ЯёЁ0-9]+/g; // регулярные выражения для проверки поля ввода на валидность
    
    if(value.length === 0){ // если поле ввода пустое
        lNameError.textContent = '* Please, enter your last name.'; // выводим в спан текст
        lName.style.backgroundColor = 'transparent'; // снимаем выделение с поля
    }else if (value.match(/[0-9]/)){ // если пользователь вместе с буквами ввел число (match)             
        lNameError.textContent = '* Your last name must not contain numbers'; // выводим в спан текст ошибки
        lName.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else if(value.length < 2){// если пользователь ввел менее 2 символов
        lNameError.textContent = '* Your last name must contain more than one character'; // выводим в спан текст ошибки
        lName.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else if(res.test(value)){ // выполняет поиск сопоставления регулярного выражения в указанной строке
        lNameError.textContent = '* Your last name must contain only letters'; // выводим в спан текст ошибки
        lName.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else{ // все проверки пройдены и данные введены верно
        lNameError.textContent = 'Correct last name.'; // подтверждаем правильность ввода фамилии
        lNameError.style.color = '#ccc'; // изменяем текст спана на нейтральный
        lName.style.backgroundColor = 'transparent'; // красим поле ввода в нейтральный 
        lName.style.fontWeight = '700'; // меняем стиль текста в поле ввода
        lNameRes = value; // присваиваем полученое значение
        enableBtn++;
        enableButton();
        console.log(lNameRes) // передаём полученое значение
    }
});

// Два варианта проверки электронной почты на правильность ввода данных:

// /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i
// или
// /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/

// проверка электронной почты на ошибки ввода:
let eMailRes = ''; //результат ввода
let eMail = document.querySelector('#email'); // получаем поле для ввода
let eMailError = document.querySelector('#email-p'); // получаем спан для вывода ошибки

eMail.addEventListener('focus', function() {
    eMail.style.background = '#f0f0f0'; // выделяем поле ввода серым
    eMail.style.fontWeight = '300'; // меняем стиль текста в поле ввода
});

eMail.addEventListener('blur', function(){
    let value = eMail.value; // значение поля ввода
    let res = /^[0-9a-z^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i; // рег.выражения для проверки поля ввода на валидность
    
    if(value.length === 0){ // если поле ввода пустое
        eMailError.textContent = '* Please, enter your e-mail address.'; // выводим в спан текст
        eMail.style.backgroundColor = 'transparent'; // снимаем выделение с поля
    }else if(value.length < 2){// если пользователь ввел менее 2 символов
        eMailError.textContent = '* Your e-mail must contain more than one character'; // выводим в спан текст ошибки
        eMail.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }else if(res.test(value)){ // выполняет поиск сопоставления регулярного выражения в указанной строке
        eMailError.textContent = 'Correct e-mail name.'; // подтверждаем правильность ввода фамилии
        eMailError.style.color = '#ccc'; // изменяем текст спана на нейтральный
        eMail.style.backgroundColor = 'transparent'; // красим поле ввода в нейтральный 
        eMail.style.fontWeight = '700'; // меняем стиль текста в поле ввода
        eMailRes = value; // присваиваем полученое значение
        enableBtn++;
        enableButton();
        console.log(eMailRes) // передаём полученое значение
    }else{ // все проверки пройдены и данные введены верно
        eMailError.textContent = '* Your email address must contain "@" and "."'; // выводим в спан текст ошибки
        eMail.style.backgroundColor = '#ffdede'; // красим поле ввода в красный
    }
});

// ПРОВЕРКА ПАРОЛЯ НА ПРАВИЛЬНОСТЬ ВВОДА (ВЗЯЛ ГОТОВОЕ РЕШЕНИЕ - РАЗОБРАТЬСЯ!!!)
let pWordRes = ''; //результат ввода
let pWord = document.querySelector('#pword'); // поле для ввода пароля
let pWordError = document.querySelector('#pword-p'); // спан для вывода ошибки

pWord.addEventListener('focus', function() {
    pWord.style.background = '#f0f0f0'; // выделяем поле ввода серым
    pWord.style.fontWeight = '300'; // меняем стиль текста в поле ввода
});

pWord.addEventListener('blur', function(){
    let value = pWord.value;
    let s_letters = "qwertyuiopasdfghjklzxcvbnm";               // Буквы в нижнем регистре
    let b_letters = "QWERTYUIOPLKJHGFDSAZXCVBNM";               // Буквы в верхнем регистре
    let digits = "0123456789";                                  // Цифры
    let specials = "!@#$%^&*()_-+=\|/.,:;[]{}";                 // Спецсимволы
    let is_s = false;                                           // Есть ли в пароле буквы в нижнем регистре
    let is_b = false;                                           // Есть ли в пароле буквы в верхнем регистре
    let is_d = false;                                           // Есть ли в пароле цифры
    let is_sp = false;                                          // Есть ли в пароле спецсимволы


    for (let i = 0; i < value.length; i++) {                                                    
        if (!is_s && s_letters.indexOf(value[i]) != -1) is_s = true; //Проверка символов пароля на принадлежность к типу
        else if (!is_b && b_letters.indexOf(value[i]) != -1) is_b = true;
        else if (!is_d && digits.indexOf(value[i]) != -1) is_d = true;
        else if (!is_sp && specials.indexOf(value[i]) != -1) is_sp = true;
        }


        let rating = 0;
            if (is_s) rating++;                                  // Если в пароле есть символы в нижнем регистре, то увеличиваем рейтинг сложности
            if (is_b) rating++;                                  // Если в пароле есть символы в верхнем регистре, то увеличиваем рейтинг сложности
            if (is_d) rating++;                                  // Если в пароле есть цифры, то увеличиваем рейтинг сложности
            if (is_sp) rating++;                                 // Если в пароле есть спецсимволы, то увеличиваем рейтинг сложности
            
            
            if(value.length === 0){ // если поле ввода пустое
                pWordError.textContent = '* Please, enter your password.'; // выводим в спан текст
                pWord.style.backgroundColor = 'transparent'; // снимаем выделение с поля
            }else if (value.length < 6 && rating < 3 || value.length >= 6 && rating == 1) {// Далее идёт анализ длины пароля и полученного рейтинга, и на основании этого готовится текстовое описание сложности пароля
                pWordError.textContent = ' * Use upper and lowercase letters, numbers and special characters.';   // выводим в спан текст ошибки
                pWord.style.backgroundColor = '#ffdede';      // красим поле ввода в красный
            }else if (value.length < 6 && rating >= 3 || value.length >= 8 && rating < 3 || value.length >= 6 && rating > 1 && rating < 4) { 
                pWordError.textContent = ' * Use upper and lowercase letters, numbers and special characters.';              // выводим в спан текст ошибки
                pWord.style.backgroundColor = '#ffdede';      // красим поле ввода в красный
            }else if (value.length >= 8 && rating >= 3 || value.length >= 6 && rating == 4) {
                pWord.style.backgroundColor = 'transparent'; // красим поле ввода в нейтральный 
                pWordError.textContent = 'Correct password.'; 
                pWordError.style.color = '#ccc'; // изменяем текст спана на нейтральный
                pWord.style.fontWeight = '700'; // меняем стиль текста в поле ввода
                pWordRes = value;
                enableBtn++;
                enableButton();
                console.log(pWordRes);
            }
    });


let btnClick = document.querySelector('#btnClick');
    btnClick.setAttribute('disabled', true);
    function enableButton() {
        if (enableBtn > 4){
            console.log ('1');
            btnClick.removeAttribute('disabled')
            btnClick.style.backgroundColor = '#333';
        } else {console.log ('2');
        btnClick.setAttribute('disabled', true)}
    };