<?php

global $Wcms;

function getEditableArea($block, $default) {
    global $Wcms;

	$value = null;
	if (empty($Wcms->get('blocks',$block))) {
		$Wcms->set('blocks',$block, 'content', $default);
	} else {
		$value = $Wcms->get('blocks',$block,'content');
	}
	if ($Wcms->loggedIn) {
        // Do a not so nice reload to make `$Wcms->block($block)` return any content.
        if($value === null) return "<script>history.go(0)</script>";

		return $Wcms->block($block);
	}

	// If not logged in, return block in non-editable mode
	return $value;
}

function alterMenu($args) {
    $args[0] = preg_replace('/class="(.*?)active(.*?)"/m', 'class="current"', $args[0]);
    $args[0] = preg_replace('/ ( |)class="(.*?)nav-(link|item)(.*?)"/m', '', $args[0]);

    return $args;
}

$Wcms->addListener("menu", "alterMenu");

function alterAdmin($args) {
	global $Wcms;

    if(!$Wcms->loggedIn) return $args;

    $doc = new DOMDocument();
    @$doc->loadHTML($args[0]);

    $label = $doc->createElement("p");
    $label->setAttribute("class", "subTitle");
    $label->nodeValue = "Main background image";

    $doc->getElementById("general")->insertBefore($label, $doc->getElementById("general")->childNodes->item(8));

	$form_group = $doc->createElement("div");
    $form_group->setAttribute("class", "form-group");

    $wrapper = $doc->createElement("div");
    $wrapper->setAttribute("class", "change");

    $input = $doc->createElement("select");
    $input->setAttribute("class", "form-control");
    $input->setAttribute("onchange", "fieldSave('background',this.value,'config');");
    $input->setAttribute("name", "backgroundSelect");

	$option = $doc->createElement("option");
	$option->setAttribute("value", "");
	$option->nodeValue = "Theme default";
	$input->appendChild($option);

	$files = glob($Wcms->filesPath . "/*");
	foreach($files as $file) {
		if(!in_array(getimagesize($file)[2], array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) continue;

		$file = basename($file);

		$option = $doc->createElement("option");
	    $option->setAttribute("value", $file);
		$option->nodeValue = $file;

		if(isset($Wcms->get("config")->background) && $Wcms->get("config")->background == $file)
			$option->setAttribute("selected", "selected");

		$input->appendChild($option);
	}

    $wrapper->appendChild($input);
    $form_group->appendChild($wrapper);

    $doc->getElementById("general")->insertBefore($form_group, $doc->getElementById("general")->childNodes->item(9));

    $args[0] = preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $doc->saveHTML());
    return $args;
}
$Wcms->addListener('settings', 'alterAdmin');


?>
