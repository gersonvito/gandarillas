<?php

namespace App\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;
use Composer\Pcre\Regex;
use Livewire\Attributes\On;
use App\Livewire\Forms\Admin\Options\NewOptionForm;
use App\Models\Feature;

class ManageOptions extends Component
{

    public $options;

    public NewOptionForm $newOption;

    public function mount()
    {
        //$this->options = Option::all();
        $this->options = Option::with('features')->get();

    }

    #[On('featureAdded')]
    public function updateOptionList()
    {
        $this->options = Option::with('features')->get();
    }

    public function onFeatureAdded()
    {
        $this->newOption->addFeature();
    }

    public function addFeature(){

        $this->newOption->addFeature();
    }



    public function removeFeature($index)
    {
        $this->newOption->removeFeature($index);
    }


    public function deleteFeature(Feature $feature)
    {

        //dd( $feature );
        $feature->delete();
        $this->options = Option::with('features')->get();
    }

    public function addOption()
    {

        $this->newOption->save();

        $this->options = Option::with('features')->get();


        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Bien echo!!',
            'text' => 'La opcion se agrego correctamente',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
