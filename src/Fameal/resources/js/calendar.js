import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from 'axios';

document.addEventListener('DOMContentLoaded', function() {
  let calendarEl = document.getElementById("calendar");

  let calendar = new Calendar(calendarEl, {
      plugins: [interactionPlugin, dayGridPlugin],
      initialView: "dayGridMonth",
      headerToolbar: {
          start: "prev,next today",
          center: "title",
          end: "",
      },
      locale: 'ja',

      selectable: true,
      select: function (info) {
        const menuName = prompt("メニューを入力してください");

        if (menuName) {
          axios
            .post('/schedule-add', {
              start_date: info.start.valueOf(),
              end_date: info.end.valueOf(),
              menu_name: menuName,
            })
            .then(() => {
              calendar.addEvent({
                title: menuName,
                start: info.start,
                end: info.end,
                allDay: true,
              });
            })
            .catch(() => {
              alert("登録に失敗しました");
            });
        }
      },
  });
  calendar.render();
});
