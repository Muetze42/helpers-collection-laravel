<?php

namespace NormanHuth\HelpersLaravel\Traits\Models;

trait HasBatchTrait
{
    /**
     * Initialize trait on the model.
     *
     * @return void
     */
    public function initializeHasBatchTrait(): void
    {
        $this->mergeCasts(['batch' => 'int']);
        $this->mergeFillable(['batch']);
    }
}
