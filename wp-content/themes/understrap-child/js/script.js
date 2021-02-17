const form_add_real = document.querySelector('.form_add_real');

if (form_add_real) {
   form_add_real.addEventListener('submit', e => {
      e.preventDefault();

      let data = new FormData(form_add_real);
      data.append('action', 'add_real');

      const result = document.querySelector('.form_add_real_result');
      result.innerHTML = 'Ожидание';

      ajax_add_real(data, result);
   });
}

async function ajax_add_real(data, result) {
   let request = await fetch('/wp-admin/admin-ajax.php', {
      method: 'POST',
      body: data
   });

   if (request.status == 200) {
      let response = await request.json();
      result.innerHTML = response.result;
   }
}