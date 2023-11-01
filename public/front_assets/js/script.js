// toggle icon navbar
let menuitem = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
menuitem.onclick = () => {
  menuitem.classList.toggle('bx-x');
  navbar.classList.toggle('active');
}


// scroll section 
let section = document.querySelectorAll('section')
let navLinks = document.querySelector('header nav a');
window.onscroll = () => 
{
  section.forEach(sec => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 100;
    let height = sec.getAttribute('id');

    if(top >= offset && top < offset + height)
    {
      navLinks.forEach(links => {
        links.classList.remove('active');
        document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
      })
      // active section for animation on scrool
      sec.classList.add('show-animate');
    }
    // if want yo use animation that repaete on scrool use this
    else
    {
      sec.classList.remove('show-animate');
    }
  })
}
window.onscroll = () => {
  // stickey header 
   let header = document.querySelector('header');
   header.classList.toggle('stickey',window.scrollY > 100);

   // remove toggle icon and navbar when navbar links (scroll)
menuitem.classList.remove('bx-x');
navbar.classList.remove('active'); 
}
