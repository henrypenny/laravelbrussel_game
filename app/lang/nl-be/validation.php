<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => ":attribute moet aanvaard worden.",
	"active_url"       => ":attribute is geen geldige URL.",
	"after"            => ":attribute moet na :date komen.",
	"alpha"            => ":attribute mag alleen letters bevatten.",
	"alpha_dash"       => ":attribute mag alleen letters, nummers en strepen bevatten.",
	"alpha_num"        => ":attribute mag alleen letters en nummers bevatten.",
	"array"            => ":attribute moet een lijst zijn.",
	"before"           => ":attribute moet voor :date komen.",
	"between"          => array(
		"numeric" => ":attribute moet tussen :min - :max zijn.",
		"file"    => ":attribute moet tussen :min - :max kilobytes zijn.",
		"string"  => ":attribute moet tussen :min - :max tekens zijn.",
		"array"   => ":attribute moet tussen :min - :max onderdelen bevatten.",
	),
	"confirmed"        => "The :attribute confirmation does not match.",
	"date"             => "The :attribute is not a valid date.",
	"date_format"      => "The :attribute does not match the format :format.",
	"different"        => "The :attribute and :other must be different.",
	"digits"           => "The :attribute must be :digits digits.",
	"digits_between"   => "The :attribute must be between :min and :max digits.",
	"email"            => "Het :attribute formaat is ongeldig.",
	"exists"           => "The selected :attribute is invalid.",
	"image"            => ":attribute moet een afbeelding zijn.",
	"in"               => "The selected :attribute is invalid.",
	"integer"          => "The :attribute must be an integer.",
	"ip"               => ":attribute moet een geldig IP adres zijn.",
	"max"              => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"            => "The :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"          => ":attribute moet een nummer zijn.",
	"regex"            => "The :attribute format is invalid.",
	"required"         => "Het :attribute veld is verplicht.",
	"required_if"      => "The :attribute field is required when :other is :value.",
	"required_with"    => "The :attribute field is required when :values is present.",
	"required_without" => "The :attribute field is required when :values is not present.",
	"same"             => "The :attribute and :other must match.",
	"size"             => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"           => ":attribute bestaat al.",
	"url"              => ":attribute formaat is ongeldig.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
