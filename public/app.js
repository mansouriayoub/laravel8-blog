const h1 = document.querySelector('h1');
const btn = document.querySelector('button');

const body = document.getElementsByTagName("BODY")[0];

btn.addEventListener('click',(e)=>{
    e.preventDefault();
    if (h1.className == 'dark') {
        body.classList.toggle('light');
    }
})