<?php

namespace Joy\NovaReplaceKeyword\Events;

use Illuminate\Queue\SerializesModels;

class BreadDataReplaceKeyworded
{
    use SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;

        // event(new BreadDataChanged($dataType, $data, 'ReplaceKeyworded'));
    }
}
