<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute doit être accepté.",
	"active_url"           => "The :attribute n'est pas un URL valide.",
	"after"                => "The :attribute doit être une date après :date.",
	"alpha"                => "The :attribute ne peut contenir que des lettres.",
	"alpha_dash"           => "The :attribute ne peuvent contenir des lettres, des chiffres et tirets.",
	"alpha_num"            => "The :attribute ne peut contenir que des lettres et des chiffres.",
	"array"                => "The :attribute doit être un tableau.",
	"before"               => "The :attribute doit être une date avant :date.",
	"between"              => [
		"numeric" => "Le :attribute doit être comprise entre :min and :max.",
		"file"    => "Le :attribute doit être comprise entre :min and :max kilobytes.",
		"string"  => "Le :attribute doit être comprise entre :min and :max caractères.",
		"array"   => "Le :attribute doit être comprise entre :min and :max articles.",
	],
	"boolean"              => "The :attribute champ doit être vrai ou faux.",
	"confirmed"            => "The :attribute confirmation ne correspond pas.",
	"date"                 => "The :attribute n'est pas une date valide.",
	"date_format"          => "The :attribute ne correspond pas au format, le format.",
	"different"            => "The :attribute et :other doivent être différents.",
	"digits"               => "The :attribute doit être :digits chiffres.",
	"digits_between"       => "The :attribute doit être comprise entre :min et :max chiffres.",
	"email"                => "The :attribute doit être une adresse e-mail valide.",
	"filled"               => "The :attribute Champ requis.",
	"exists"               => "The selected :attribute est invalide.",
	"image"                => "The :attribute doit être une image.",
	"in"                   => "The sélectionné :attribute est invalide.",
	"integer"              => "The :attribute doit être un entier.",
	"ip"                   => "The :attribute doit être une adresse IP valide.",
	"max"                  => [
		"numeric" => "The :attribute peut ne pas être supérieure à :max.",
		"file"    => "The :attribute peut ne pas être supérieure à :max kilobytes.",
		"string"  => "The :attribute peut ne pas être supérieure à :max characters.",
		"array"   => "The :attribute peuvent ne pas avoir plus de :max items.",
	],
	"mimes"                => "The :attribute doit être un fichier de type: :values.",
	"min"                  => [
		"numeric" => "Le :attribute doit être au moins :min.",
		"file"    => "Le :attribute doit être au moins :min kilobytes.",
		"string"  => "Le :attribute doit être au moins :min caractères.",
		"array"   => "Le :attribute doit être au moins :min articles",
	],
	"not_in"               => "Le sélectionnée :attribute est invalid.",
	"numeric"              => "The :attribute doit être un nombre.",
	"regex"                => "The :attribute format est invalide.",
	"required"             => "The :attribute Champ requis.",
	"required_if"          => "The :attribute champ est obligatoire quand :other est :value.",
	"required_with"        => "The :attribute champ est obligatoire quand :values est présente.",
	"required_with_all"    => "The :attribute champ est obligatoire quand :values est présente.",
	"required_without"     => "The :attribute champ est obligatoire quand :values n'est pas présente.",
	"required_without_all" => "The :attribute champ est obligatoire quand aucune des :values sont présentes.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => "The :attribute doit être :size.",
		"file"    => "The :attribute doit être :size kilobytes.",
		"string"  => "The :attribute doit être :size caractères.",
		"array"   => "The :attribute doit contenir :size articles.",
	],
	"unique"               => "The :attribute a déjà été pris.",
	"url"                  => "The :attribute format est invalide.",
	"timezone"             => "The :attribute doit être une zone valide.",

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

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

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

	'attributes' => [],

];
