<div>

    <form wire:submit="addFeature" class="flex space-x-4">

        <div class="flex-1">

            <x-label class="mb-1">
                Valor
            </x-label>

            @switch($option->type)
                @case(1)

                    <x-input
                        wire:model="newFeature.value"
                        class="w-full"
                        placeholder="Ingrese el valor de la opcion" />

                    @break

                @case(2)

                    <div class="border border-gray-300 rounded-md h-[42px] flex items-center justify-between px-3">

                        {{
                            $newFeature['value'] ?: 'Seleccione un color'
                        }}

                        <input type="color"
                            wire:model.live="newFeature.value" >
                    </div>
                    @break

                @default

            @endswitch

        </div>


        <div class="flex-1">
            <x-label class="mb-1">
                Descripcion
            </x-label>

            <x-input
                class="w-full"
                wire:model="newFeature.description"
                placeholder="Ingrese la descripcion del valor" />
        </div>

        <div class="pt-7 flex items-center">
            <x-button
                class="self-end"
                wire:click="addFeature">
                Agregar
            </x-button>
        </div>


    </form>
</div>
