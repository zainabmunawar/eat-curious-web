let pink = document.querySelector('.navbtn');

let click = document.querySelector('.click');

var flag = 0;
const icon = document.querySelector('i');
const newIcon = document.createElement('i');
newIcon.className = 'fa-solid fa-grip-lines';

pink.addEventListener('click',() =>{
   click.classList.toggle('active')
   if(flag == 0){
   // logo.style.position = "fiixed" //block
   click.style.display = "block";
   // pic.style.display = 'none';
   // head.style.display = 'none';
   // hide.style.display = "none";
   // pink_pg.style.z_index = '0';
   // click.style.z_index = 30;
   // pink.style.backgroundColor = "#042F1A";
   icon.replaceWith(newIcon);
   newIcon.style.color = "white";
   // click.style.top = 0;
   flag = 1
   }
   else{
        click.style.display = "none";
        pink.style.backgroundColor = "#FF73B5";
        // pic.style.display = "block";
       // head.style.display = "block";
       // hide.style.display = 'block';
       // pink_pg.style.z_index = '10';
       // pink_pg.style.display = "block";
       flag = 0
       newIcon.replaceWith(icon);
       // click.style.top = '-100%';
   }
})
