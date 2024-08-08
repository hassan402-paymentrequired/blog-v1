<?php unset($_SESSION['error'])  ?>
<!--src="--><?php //base_path('resources/js/script.js') ?><!--"-->
<script >

    const parent = document.querySelectorAll('.parent');

    parent.forEach(child => {
       const btn = child.querySelector('.commentBtn')
       const time = child.querySelector('.time')

        btn.addEventListener("click", () => {
            if(time.classList.contains('hidden'))
            {
                time.classList.remove('hidden')
            }else
            {
                time.classList.add('hidden')
            }
        })


      let d = child.querySelector('.myForm')
        console.log(d)





          d.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
              console.log(formData)

            // fetch('submit.php', {
            //     method: 'POST',
            //     body: formData
            // })
            //     .then(response => response.json())
            //     .then(data => {
            //         // Display the response
            //         document.getElementById('response').innerHTML = 'Response: ' + data.message;
            //     })
            //     .catch(error => {
            //         console.error('Error:', error);
            //     });
        });

    })






</script>
</body>
</html>