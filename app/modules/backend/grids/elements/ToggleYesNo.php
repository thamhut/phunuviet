<?php

namespace App\Modules\Backend\Grids\Elements;

class ToggleYesNo
{
	public static function render($name, $id, $action, $isChecked=false)
	{
		$html = '<div class="switch switch-sate-ajax '. $name .'">
            <input id="'. $id .'" data-action="'. $action .'" data-name="'. $name .'" class="cmn-toggle cmn-toggle-yes-no" type="checkbox" '. ($isChecked ? 'checked' : '') .'>
            <label for="'. $id .'" data-on="Yes" data-off="No"></label>
        </div>';
		
		return $html;
	}
	
}