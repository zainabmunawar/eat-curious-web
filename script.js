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
 var flag = 0;
 const icon = document.querySelector('i');
 const newIcon = document.createElement('i');
 newIcon.className = 'fa-solid fa-grip-lines';

 pink.addEventListener('click',() =>{
    // click.classList.toggle()
    if(flag == 0){
    logo.style.Color = "#042F1A"
    click.style.display = "block";
    pink.style.backgroundColor = "#042F1A";
    icon.replaceWith(newIcon);
    newIcon.style.color = "white";
    click.style.top = 0;
    flag = 1
    }
    else{
        click.style.display = "none";
        pink.style.backgroundColor = "#FF73B5";
        flag = 0
        newIcon.replaceWith(icon);
        click.style.top = '-100%';

      

    }
 })

