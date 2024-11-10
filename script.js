const eat = document.querySelector('.eat2');
window.addEventListener('scroll', () =>
{
    const scrollPosition = window.scrollY;
    // const rotation = scrollPosition * 0.1;
    eat.classList.toggle('active')= 'rotateY(${rotation}180deg)';

});

// const wave = document.querySelector(".wave-top");

// console.dir(wave);

// let anim = document.querySelector('.box-strip');
// let box = document.querySelector('.box');
// box.addEventListener('mouseenter',function(){
//     box.style.display = "inline-block";
//     box.style.animation = "0s infinite";
//     // box.style.text-wrap ; "no-wrap"
// })
// box.addEventListener('mouseleave',function(){
//      box.style.display = "block";
//     box.style.animation = "0s none";
// })


// const anim = document.querySelector('.box-strip');
// //let box = document.querySelectorAll('.box');
//  boxImg = document.querySelectorAll('.box img')
// boxHead = document.querySelectorAll('.box h1')


//  anim.addEventListener('mouseenter', () => {
//     let box = document.querySelectorAll(".box");
//     box.forEach(function(e){
//     box.style.animation = "slide 4s linear infinite"
//     // boxImg.style.animation = "slide 4s linear infinite";
//     // box.style.position = "sticky" 
//      anim.style.textwrap = "nowrap"
//     anim.style.overflow = "hidden"
//  })
// })

// anim.addEventListener('mouseleave', () => {
   
//     box.style.animation = none
    // box.style.animation = "none"
    //  anim.style.textwrap = "wrap"
    // anim.style.overflow = "visible"
   
    // box.style.display = "inlinek"
    // boxImg.style.display = "block"
    // boxHead.style.display = "block"
    
// })

// function tilesAnimation(){
//     let fixed = document.querySelector('.fixed-img');
// console.log(fixed);
// let con = document.querySelector('.tile-container');
// con.addEventListener('mouseenter',function(){
//     fixed.style.display = "block"
// }) 
// con.addEventListener('mouseleave',function(){
//     fixed.style.display = "none"
// }) 
// let tiles = document.querySelectorAll(".tile");
// tiles.forEach(function(e){
//     e.addEventListener('mouseenter',function(){
//     let image = e.getAttribute("data-image");
//     fixed.style.backgroundImage = `url(${image})`
// })
// })
// }


    

// // }
// let con = document.querySelector('.tile-container');
// con.addEventListener('mouseenter',function(){
//     fixed.style.display = "block"
// }) 

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
     
        //box.style.alignitems = "center"
        //box.style.justifycontent = "center"
        // box.style.marginright = "2vw"
        box.style.animation = "none"
        // box.style.animationPlayState = 'paused';
    })
})

 })