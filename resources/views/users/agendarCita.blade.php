<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Mi Aplicación</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

         <!--navbar-->
         @include('layouts.navigation')
         <main class="max-w-full mx-auto ">
            <form class="bg-white shadow-md rounded-lg" action="{{ route('submitForm') }}" method="POST">
                @csrf
                <section class="bg-black text-white p-8 mx-auto flex flex-col md:flex-row items-center justify-between  mx-auto">
                    <div class="flex flex-col w-full md:w-1/2 max-w-[800px] text-center md:text-left mb-8 md:mb-0 md:mr-8 mx-auto">
                        <h1 class="text-5xl font-Freeman mb-0">Agendar Cita</h1>
                        <h2 class="text-2xl text-gray-400 my-10">Reserva con tiempo tu cita para estar listos y evitar mucha espera</h2>
                        <p class="text-0.5xl leading-relaxed max-w-full mx-auto text-justify">Tu bienestar es nuestra principal preocupación. Nos esforzamos por brindarte la mejor experiencia posible, y parte de eso implica evitar largas esperas innecesarias. Por eso te animamos a que reserves tu cita con antelación. Planificar con tiempo no solo nos ayuda a prepararnos para atenderte de manera eficiente, sino que también te asegura un espacio reservado especialmente para ti. Valoramos tu tiempo y queremos que tu visita sea lo más cómoda y conveniente posible. Así que adelántate y reserva tu cita hoy mismo para disfrutar de un servicio sin contratiempos.</p>
                    </div>
                    <div class="flex w-full md:w-1/2 items-center justify-center">
                        <img src="{{ asset('images/img-aC.jpg') }}" alt="Imagen representativa" class="w-full max-w-lg shadow-md">
                    </div>
                </section>

                <section class="flex flex-col md:flex-row w-full space-x-4 p-6 md:p-10 ">

                       <!--Logica de horas y Mes y Dia-->
                       @include('users.partials.hourDate')


                          <!--Logica de Selects para servicio y Trabajadora-->
                        @include('users.partials.dates-selects')

                </section>

                <section>
                    <div class="text-center p-20">
                        <button type="submit" class="bg-violet-600 text-white px-6 py-2 rounded hover:bg-violet-700 transition">Reservar Cita</button>
                    </div>
                </section>
            </form>
               <!-- Incluir el componente de modal -->
        <x-confirmation-modal />

        </main>

             <!--footer-->
     @include('layouts.users.footer')
    </body>

    <script>
        // Función para actualizar los días del mes
        function updateDaysOfMonth() {
            var selectedMonth = document.getElementById('mes').value;
            var daysSelect = document.getElementById('dia');
            daysSelect.innerHTML = ''; // Limpiar opciones existentes

            // Esto muestra el mensaje de seleccione el dia
            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = 'Selecciona el día';
            daysSelect.appendChild(defaultOption);

            // Si se selecciona un mes válido, agregar las opciones de día
            if (selectedMonth) {
                var today = new Date();
                var currentYear = today.getFullYear();
                var currentDay = today.getDate();
                var numDaysInMonth = new Date(currentYear, selectedMonth, 0).getDate();

                // Determinar el primer día a mostrar
                var startDay = (parseInt(selectedMonth) === today.getMonth() + 1) ? currentDay : 1;

                for (var day = startDay; day <= numDaysInMonth; day++) {
                    var option = document.createElement('option');
                    option.value = day;
                    option.text = day;
                    daysSelect.appendChild(option);
                }
            }
        }

        // Evento de cambio en el select de mes
        document.getElementById('mes').addEventListener('change', updateDaysOfMonth);

        // Llamar a la función una vez para inicializar los días del mes actual
        updateDaysOfMonth();

        function updateAvailableHours() {
            var selectedDay = document.getElementById('dia').value;
            var hours = document.querySelectorAll('.hora');
            var dia = parseInt(selectedDay);
            var mes = parseInt(document.getElementById("mes").value) - 1;

            var fecha = new Date(new Date().getFullYear(), mes, dia);

            // Obtener el día de la semana (0 para domingo, 1 para lunes, etc.)
            var diaSemana = fecha.getDay();

            // Verificar si el día de la semana es domingo (0)
            if (diaSemana === 0) {
                console.log("El día seleccionado es domingo.");
                // Ocultar las horas antes de las 10:00 am y después de las 6:00 pm
                for (var i = 0; i < 2; i++) {
                    hours[i].style.display = 'none';
                }
                for (var j = 18; j < hours.length; j++) {
                    hours[j].style.display = 'none';
                }
            } else {
                console.log("El día seleccionado no es domingo.");
                // Mostrar todas las horas si no es domingo
                for (var k = 0; k < hours.length; k++) {
                    hours[k].style.display = 'block';
                }
            }
        }

        // Agregar evento de cambio al select del día
        document.getElementById('dia').addEventListener('change', updateAvailableHours);
    </script>

</body>
</html>
