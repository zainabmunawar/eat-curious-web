const eat = document.querySelector('.eat2');
window.addEventListener('scroll', () =>
{
    const scrollPosition = window.scrollY;
    // const rotation = scrollPosition * 0.1;
    eat.classList.toggle('active')= 'rotateY(${rotation}deg)';

});

const wave = document.querySelector(".wave-top");

console.dir(wave);