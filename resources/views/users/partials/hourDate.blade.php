<div class="flex flex-col items-center w-full md:w-1/2 text-center mx-auto p-4 sm:p-5">
    <h1 class="text-2xl font-bold mb-4">Horarios Disponibles</h1>
    <p class="mb-4">Escoge la hora de la Cita</p>
    <div class="grid grid-cols-4 sm:grid-cols-4 md:grid-cols-3 gap-3 w-full ">
        @for ($i = 1; $i <= 22; $i++)
            @php
                $hour = 9 + intdiv($i - 1, 2);
                $minute = ($i % 2) == 0 ? '30' : '00';
                $suffix = $hour < 12 ? 'am' : 'pm';
                $displayHour = $hour % 12 == 0 ? 12 : $hour % 12;
            @endphp
            <div class=" max-w-50">
                <input class=" bg-blue-200 hidden peer" type="radio" id="hora{{ $i }}" name="hora" value="hora{{ $i }}" {{ old('hora') == "hora$i" ? 'checked' : '' }}>
                <label for="hora{{ $i }}" class="max-w-50ZZZZ p-4 cursor-pointer border-2 border-fuchsia-500 peer-checked:border-fuchsia-500 peer-checked:bg-fuchsia-800 peer-checked:text-white transition-colors duration-300 flex items-center justify-center">
                    <span>{{ $displayHour }}:{{ $minute }}</span>
                    <span class="ml-1">{{ $suffix }}</span>
                </label>
            </div>
        @endfor
    </div>
    @error('hora')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6 w-full md:w-1/2 md:pl-4 text-center">
    <div class="mb-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Seleccione la Fecha Deseada</h1>
        <p class="mb-4 text-center">
            Lunes-Sabados 10:00am - 8:00pm <br>
            Domingos 10:00 am - 6:00pm
        </p>
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 md:items-center mb-4">
            <select name="mes" id="mes" class="border rounded p-2 w-full md:w-1/2">
                <option value="">Selecciona el mes</option>
                @foreach($monthNames as $monthNumber => $monthName)
                    <option value="{{ $monthNumber }}">{{ $monthName }}</option>
                @endforeach
            </select>
            <select name="dia" id="dia" class="border rounded p-2 w-full md:w-1/2">
                <option value="">Selecciona el día</option>
            </select>
        </div>
        @error('dia')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
