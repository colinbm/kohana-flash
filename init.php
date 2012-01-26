<?php

function smarty_function_flash($params, &$smarty) {
	return Flash::render();
}
