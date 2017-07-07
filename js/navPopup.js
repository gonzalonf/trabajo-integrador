;(function(window,document,undefined){
  window.addEventListener('load',function(){
      var menu = document.querySelector('.dropdown-menu');
      menu.style.display = 'none';

      var botonMenu = document.querySelector('.dropdown');
      botonMenu.onclick=function(){
          if (menu.style.display === 'none') {
              menu.style.display = 'block';
          } else {
              menu.style.display = 'none';
          }

      }
      window.addEventListener('click',function(e){
          if(e.target !== botonMenu){
              menu.style.display = 'none';
          }
      })
  });
}(window,document));