(function(win,doc){
    'use strict';

  //Exibir o calendário
  function getCalendar(perfil, div){
      themeSystem: 'bootstrap'
      let calendarEl = doc.querySelector(div);
      let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            start: 'prev, next, today', 
            center: 'title',
            end: 'dayGridMonth, timeGridWeek, timeGridDay'
        },
        buttonText:{
                today:    'hoje',
                month:    'mês',
                week:     'semana',
                day:      'dia',
        },
        locale: 'pt-BR',
        events: '/agenda/controllers/ControllerEvents.php', 
        selectable: true,
        select: async (arg)=>{
          let title = prompt("Nome do evento: ");
          if(title){
            let response = await fetch('http://localhost/agenda/controllers/ControllerSelectable.php', {
              method: 'post',
              headers:{
                'Content-Type':'application/json',
                'Accept':'application/json'
              },
              body: JSON.stringify({
                title: title,
                start: arg.start,
                end: arg.end
              })
            });
            if(response.status == 200){
              window.location.href = "http://localhost/agenda/views/user/";
            }
          }
        }
    });
    calendar.render();
  }

  if(doc.querySelector('.calendarUser')){
      getCalendar('user','.calendarUser');
  } else if(doc.querySelector('.calendarManager')){
      getCalendar('manager','.calendarManager');
  }

  if(doc.querySelector('#delete')){
    let btn = doc.querySelector('#delete');
    btn.addEventListener('click',(event)=>{
      event.preventDefault();
      if(confirm("Deseja mesmo apagar este dado?")){
        win.location.href = event.target.parentNode.href;
      }
    }, false)
  }

})(window,document);
