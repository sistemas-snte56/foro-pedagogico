<div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">
            Registro de Participantes
        </h1>

        @if($registroExitoso)
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                ✅ Registro exitoso. Se te asignó la <strong>Mesa {{ $mesaAsignada }}</strong>.
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Apellido Paterno</label>
                    <input type="text" wire:model="apellido_paterno"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('apellido_paterno') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Apellido Materno</label>
                    <input type="text" wire:model="apellido_materno"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('apellido_materno') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Nombre(s)</label>
                <input type="text" wire:model="nombre"
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Genero</label>
                    <select wire:model="genero"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Selecciona --</option>
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                        <option value="O">Otro</option>
                    </select>
                    @error('genero') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Nivel Educativo</label>
                    <select wire:model="nivel"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Selecciona --</option>
                        <option value="preescolar">Preescolar</option>
                        <option value="primaria">Primaria</option>
                        <option value="secundaria">Secundaria</option>
                    </select>
                    @error('nivel') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Clave Centro de Trabajo</label>
                    <input type="text" wire:model="clave_centro_trabajo"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('clave_centro_trabajo') <span class="text-[#89194b] text-xs">{{ $message }}</span> @enderror
                    <p class="text-[#50d71e] ...">
                        Lorem ipsum dolor sit amet...
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- REGIÓN --}}
                <div>
                    <label class="block text-base font-medium mb-2 tracking-wide" style="color:#353a40;">Región</label>
                    <select wire:model.live="selectIdRegion"
                        class="w-full px-4 py-3 text-base rounded-lg border outline-none transition focus:ring-2"
                        style="border-color:#d1d5db;">
                        <option value="">Selecciona...</option>
                        @foreach($regiones as $region)
                            <option value="{{ $region->id }}">
                                {{ $region->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('selectIdRegion')
                        <p class="mt-1 text-sm" style="color:#89194b;">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- DELEGACIÓN --}}
                <div>

                    <label class="block text-base font-medium mb-2 tracking-wide" style="color:#353a40;">

                        Delegación

                    </label>

                    <select wire:model.live="selectIdDelegacion" @if(!$selectIdRegion) disabled @endif
                        class="w-full px-4 py-3 text-base rounded-lg border outline-none transition disabled:opacity-40 disabled:cursor-not-allowed"
                        style="border-color:#d1d5db;">

                        <option value="">Selecciona...</option>

                        @if($selectIdRegion)

                            @foreach($delegaciones as $delegacion)

                            <option value="{{ $delegacion->id }}">
                                {{ $delegacion->nombre_completo }}
                            </option>

                            @endforeach

                        @endif

                    </select>

                    @error('selectIdDelegacion')
                    <p class="mt-1 text-sm" style="color:#89194b;">

                        {{ $message }}

                    </p>
                    @enderror

                </div>



            </div>








            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">RFC</label>
                    <input type="text" wire:model="rfc" maxlength="13"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('rfc') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Número de Personal</label>
                    <input type="text" wire:model="numero_personal"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('numero_personal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" 
                wire:loading.attr="disabled" 
                wire:target="submit"
                class="w-full sm:w-auto px-8 py-3 text-base font-medium text-white rounded-lg transition flex items-center justify-center gap-2"
                style="background:#89194b;" 
                onmouseover="this.style.background='#6a143a'"
                onmouseout="this.style.background='#89194b'">
                
                <span wire:loading.remove wire:target="submit">Buscar</span>
                <span wire:loading wire:target="submit">Buscando...</span>
            </button>

        </form>
    </div>
</div>