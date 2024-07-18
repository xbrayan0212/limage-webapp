<div class="mb-6 ">
    <h1 class="text-2xl font-bold mb-4">Servicios Disponibles</h1>
    <p class="mb-4">Seleccione el servicio y a la Trabajadora</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4  p-4 rounded-lg">
        <div class="md:col-span-1">
            @foreach ($services as $serviceKey => $serviceOptions)
            <div class="mb-4">
                <label for="{{ $serviceKey }}" class="block font-semibold">{{ ucfirst($serviceKey) }}:</label>
                <select name="{{ $serviceKey }}" id="{{ $serviceKey }}" class="border rounded p-2 w-full">
                    <option value="">Select</option>
                    @foreach ($serviceOptions as $option)
                    <option value="{{ $option['idServicio'] }}" {{ old($serviceKey) == $option['servicio_detalle'] ? 'selected' : '' }}>
                        {{ $option['servicio_detalle'] }}
                    </option>
                    @endforeach
                </select>
                @error($serviceKey)
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            @endforeach
        </div>
        <div class="md:col-span-1">
            @foreach ($specialties as $specialty)
                <div class="mb-4">
                    <label for="trabajadora_{{ strtolower($specialty) }}" class="block font-semibold">Trabajadoras de {{ $specialty }}:</label>
                    <select name="trabajadora_{{ strtolower($specialty) }}" id="trabajadora_{{ strtolower($specialty) }}" class="border rounded p-2 w-full">
                        <option value="">Select</option>
                        @foreach ($workers as $worker)
                            @if ($specialty === 'servicios_extras')
                                @if ($worker->especialidad === 'Peluquera')
                                    <option value="{{ $worker->idEmpleado }}" {{ old('trabajadora_' . strtolower($specialty)) == $worker->idEmpleado ? 'selected' : '' }}>
                                        {{ $worker->nombre }} {{ $worker->apellido }}
                                    </option>
                                @endif
                            @else
                                @if ($worker->especialidad === $specialty)
                                    <option value="{{ $worker->idEmpleado }}" {{ old('trabajadora_' . strtolower($specialty)) == $worker->idEmpleado ? 'selected' : '' }}>
                                        {{ $worker->nombre }} {{ $worker->apellido }}
                                    </option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                    @error('trabajadora_' . strtolower($specialty))
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>
    </div>
</div>
@if ($errors->has('general'))
    <div class="text-red-500 text-center mb-4">{{ $errors->first('general') }}</div>
@endif
</div>
