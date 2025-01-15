const eat = document.querySelector('.eat2');
window.addEventListener('scroll', () =>
{
    const scrollPosition = window.scrollY;
    // const rotation = scrollPosition * 0.1;
    eat.classList.toggle('active')= 'rotateY(${rotation}45deg)';

});


const anim = document.querySelectorAll('.box-strip')
const boxes = document.querySelectorAll('.box')
anim.forEach(ani=>{
    ani.addEventListener('mouseenter', ()=>{
    boxes.forEach(box=>{
        box.style.animation = "slide 2s linear infinite"
        box.style.animationPlayState = 'running';
    })
})
 })
 anim.forEach(ani=>{
ani.addEventListener('mouseleave', ()=>{
    boxes.forEach(box=>{
        box.style.animation = "none"
        // box.style.animationPlayState = 'paused';
    })
})

 })

 let pink = document.querySelector('.navbtn');
 let logo = document.querySelector('.logoeat');
 let click = document.querySelector('.click');
 let pic = document.querySelector('.eat1');
 let head = document.querySelector('.hmind');
 let hide = document.querySelectorAll('#hide');
 let pink_pg = document.querySelector('.pink-pg');
 var flag = 0;
 const icon = document.querySelector('i');
 const newIcon = document.createElement('i');
 newIcon.className = 'fa-solid fa-grip-lines';

 pink.addEventListener('click',() =>{
    click.classList.toggle('active')   
    if(flag == 0){
    // logo.style.position = "fiixed" //block
    // click.style.display = "block";
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
        // click.style.display = "none";
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

